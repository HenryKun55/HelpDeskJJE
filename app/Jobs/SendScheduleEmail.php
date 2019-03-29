<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Mail;

class SendScheduleEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $recipients;
    protected $crmaction;
    protected $crm;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($recipients, $crmaction, $crm)
    {
      $this->recipients = $recipients;
      $this->crmaction = $crmaction;
      $this->crm = $crm;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
      $crm = $this->crm;
      $crmaction = $this->crmaction;
      
      Mail::send('emails.scheduling', [ 'crm' => $crm, 'crmaction' => $crmaction], function($message) use ($crm, $crmaction) {

            $message->to($this->recipients);
            $message->name('Agendamento');
            $message->subject('Agendamento: '.$crm->client);
          });
    }
}