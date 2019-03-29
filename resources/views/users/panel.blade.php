@extends('layouts.app')

@section('content')
<div class="container">
  <div class="pull-left">
      <h2>Status dos Técnicos</h2>
  </div>
  <table class="table">
      <thead>
      <tr>
          <th scope="col">Ramal</th>
          <th scope="col">Técnico</th>
          <th scope="col">Status</th>
          <th></th>
      </tr>
      </thead>
      <tbody>
        @if(Auth::user()->department_id != 3)
          @foreach ($data as $key => $user)
          <tr>
              <td>{{ $user->branchLine['number'] }}</td>
              <td>{{ $user->name }}</td>
              <td>
                      <label class="switch">
                          <input type="checkbox"
                          <?php
                            if($user->status == 1)
                            {
                              echo "checked"." disabled ";
                            }
                          ?> class="status" name="status" value="1" onclick="send()"><span class="slider round"></span>
                          <?php
                          if($user->status == 1)
                          {
                            echo "<p class='available' id=$user->id>Indisponível</p>";
                          }else {
                            echo "<p class='available' id=$user->id>Disponível</p>";
                          }
                          ?>

                          <input type="hidden" name="_token" class="token" value="{{ csrf_token() }}">

                          <input type="hidden" class="user" name="userid" value="{{ $user->id }}">

                          <input type="hidden" class="adm" name="adm" value="1">

                      </label>
              </td>
          </tr>
          @endforeach
        @elseif (Auth::user()->department_id == 3)
        <tr>
            <td>{{ Auth::user()->branchLine['number'] }}</td>
            <td>{{ Auth::user()->name }}</td>
            <td>
              <label class="switch">

                  <input type="checkbox" <?php if(Auth::user()->status == 1) echo "checked"; ?> class="status" name="status" value="1" onclick="send()">

                  <span class="slider round"></span>
                  <?php
                  $idUser = Auth::user()->id;
                  if(Auth::user()->status == 1)
                  {
                    echo "<p class='available' id=$idUser>Indisponível</p>";
                  }else {
                    echo "<p class='available' id=$idUser>Disponível</p>";
                  }
                  ?>

                  <input type="hidden" name="_token" class="token" value="{{ csrf_token() }}">

                  <input type="hidden" class="user" name="userid" value="{{ Auth::user()->id }}">

                  <input type="hidden" class="adm" name="adm" value="0">

              </label>
            </td>
        </tr>
        @endif
      </tbody>
  </table>
</div>
@endsection
