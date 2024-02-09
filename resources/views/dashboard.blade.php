@extends('layouts.navbar')

@section('content')
    <div class="row">
        <div class="col-md-12 dash-left">


            <div class="row panel-quick-page">
                <div class="col-xs-4 col-sm-5 col-md-4 page-user">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">Espace élèves</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-person-stalker"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-4 col-sm-5 col-md-4 page-events">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">Espace cours</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-ios-calendar-outline"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-5 col-md-4 page-messages">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">Espace exercices</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-email"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-5 col-md-4 page-reports">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">Groupe</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-arrow-graph-up-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-5 col-md-4 page-statistics">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">Programmes</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-ios-pulse-strong"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-5 col-md-4 page-support">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">Ajouter un secretaire</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-help-buoy"></i></div>
                        </div>
                    </div>
                </div>

            </div><!-- row -->

            {{-- <style>
                * { margin: 0; padding: 0; box-sizing: border-box; }
                body { font: 13px Helvetica, Arial; }
                .zone_saisie { background: #000; padding: 3px; position: fixed; bottom: 0; width: 100%; }
                .zone_saisie input { border: 0; padding: 10px; width: 60%; margin-right: .5%; }
                .zone_saisie button { width: 9%; background: rgb(130, 224, 255); border: none; padding: 10px; }
                #messages { list-style-type: none; margin: 0; padding: 0; }
                #messages li { padding: 5px 10px; }
                #messages li:nth-child(odd) { background: #eee; }
              </style>
              <script src="/socket.io/socket.io.js"></script>

             <script src="{{ asset('asset/js/server.js')}}"></script>

        
            <script>
              var socket = io();
        
              var send = function () {
                var text = document.getElementById('m').value;
                socket.emit('chat message',text);
              }
        
              var receive = function(msg) {
                var li = document.createElement('li');
                li.innerText = msg;
                document.getElementById('messages').appendChild(li);
              }
              socket.on('chat message', receive);
            </script>
            <div>
              <ul id="messages"></ul>
              <div class="zone_saisie">
                  <input id="m" /> <button onclick="send()">Send</button>
              </div>
             
            </div> --}}

        </div>
    </div>
    @endsection
