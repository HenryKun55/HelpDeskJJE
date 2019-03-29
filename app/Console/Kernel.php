<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
      $path = base_path();
      $schedule->call(function() use($path) {
          if (file_exists($path . '/queue.pid')) {
              $pid = file_get_contents($path . '/queue.pid');
              $result = exec("ps -p $pid --no-heading | awk '{print $1}'");
              $run = $result == '' ? true : false;
          } else {
              $run = true;
          }
          if($run) {
              $command = '/usr/bin/php -c ' . $path .'/home/c48bdwgpklyz/public_html/php.ini ' . $path . '/artisan queue:listen database 
--tries=3 > /dev/null & echo $!';
              $number = exec($command);
              file_put_contents($path . '/queue.pid', $number);
          }
      })->name('monitor_queue_listener')->everyFiveMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
