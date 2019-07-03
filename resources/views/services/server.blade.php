@extends('layouts.client')

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{$server->name}}</h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <a class="btn btn-app pull-right" style="margin-top:-5px;">
                    <i class="fa fa-repeat"></i> Restart
                </a>
            @if($server->status == "online")
                <a class="btn btn-app pull-right" style="margin-top:-5px;">
                    <i class="fa fa-stop"></i> Stop
                </a>
            @else
                <a class="btn btn-app pull-right" style="margin-top:-5px;">
                    <i class="fa fa-play"></i> Play
                </a>
            @endif
                @if($server->status == "online")
                <span class="label label-success" style="font-size: 22px;">Online</span>
                @else
                <span class="label label-danger" style="font-size: 22px;">Offline</span>
                @endif
                <div class="clearfix"></div>
                <table class="countries_list" style="width: 60%; margin-left:20%;">
                    <tbody>
                        <tr>
                        <td><h4>Game</td>
                        <td class="fs15 fw700 text-right"><h4>{{$server->type->name}}</td>
                        </tr>
                        <tr>
                        <td><h4>Ip Address</td>
                        <td class="fs15 fw700 text-right"><h4>{{$server->ip}}</td>
                        </tr>
                        <tr>
                        <td><h4>Port</td>
                        <td class="fs15 fw700 text-right"><h4>{{$server->port}}</td>
                        </tr>
                        <tr>
                        <td><h4>Max Players</td>
                        <td class="fs15 fw700 text-right"><h4>{{$server->max_players}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Statistics</h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="sidebar-widget">
                            <h4 class="text-center" >Players</h4>
                            <canvas width="150" height="80" id="servers" class="" style="width: 100%; height: 100%;"></canvas>
                            <div class="goal-wrapper">
                                <span class="gauge-value pull-left"></span>
                                <span id="servers-text" class="gauge-value pull-left">3</span>
                                <span id="goal-text" class="goal-value pull-right">32</span>
                            </div>
                            <span class="sparkline_bar_player" style="height: 160px;width:94px;">
                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 100%; height: 30px;"></canvas>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1"></div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="sidebar-widget">
                            <h4 class="text-center" >Processor</h4>
                            <canvas width="150" height="80" id="players" class="" style="width: 100%; height: 100%;"></canvas>
                            <div class="goal-wrapper">
                                <span class="gauge-value pull-left"></span>
                                <span id="players-text" class="gauge-value pull-left">64</span>%
                                <span id="goal-text" class="goal-value pull-right">100%</span>
                            </div>
                            <span class="sparkline_bar" style="height: 160px;width:94px;">
                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 100%; height: 30px;"></canvas>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1"></div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="sidebar-widget">
                            <h4 class="text-center" >Memory</h4>
                            <canvas width="150" height="80" id="stuff" class="" style="width: 100%; height: 100%;"></canvas>
                            <div class="goal-wrapper">
                                <span class="gauge-value pull-left"></span>
                                <span id="stuff-text" class="gauge-value pull-left">0</span>
                                <span id="goal-text" class="goal-value pull-right">1024</span>
                            </div>
                            <span class="sparkline_bar_mem" style="height: 160px;width:94px;" class="center-can">
                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 100%; height: 100%;"></canvas>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Console</h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class = "">
                        <div id="console-scroll"class="well profile_view" style="height:280px;overflow:auto;">
                        <p id="console-text"></p>
                        </div> 
                        <div class="input-group right" style="top:-15px;width:100.5%;">
                            <input id="console-input" class="form-control" type="text">
                            <span class="input-group-btn">
                                <button id="console-button" type="button" class="btn btn-primary">Send</button>
                            </span>
                          </div> 
                    </div>
                </div>                  
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <!-- jQuery Sparklines -->
    <script src="{{asset('vendors/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>

    <!-- gauge.js -->
    <script>
      var server = {!! json_encode($server->toArray()) !!};

      var opts = {
          lines: 12,
          angle: 0,
          lineWidth: 0.4,
          pointer: {
              length: 0.75,
              strokeWidth: 0.042,
              color: '#1D212A'
          },
          limitMax: 'false',
          colorStart: '#1ABC9C',
          colorStop: '#1ABC9C',
          strokeColor: '#F0F3F3',
          generateGradient: true
      };

      var target = document.getElementById('servers');
      servers_guage = new Gauge(target).setOptions(opts);

      servers_guage.maxValue = 32;
      servers_guage.animationSpeed = 50;
      servers_guage.set(4);
      servers_guage.setTextField(document.getElementById("servers-text"));

      var target = document.getElementById('players');
      players_guage = new Gauge(target).setOptions(opts);

      players_guage.maxValue = 100;
      players_guage.animationSpeed = 50;
      players_guage.set(132);
      players_guage.setTextField(document.getElementById("players-text"));

      var target = document.getElementById('stuff');
      stuff_guage = new Gauge(target).setOptions(opts);

      stuff_guage.maxValue = 1024;
      stuff_guage.animationSpeed = 50;
      stuff_guage.set(198);
      stuff_guage.setTextField(document.getElementById("stuff-text"));

      $(document).ready(function() {

        var ws = new WebSocket("ws://localhost:2220");

        var procData = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
        var playerData = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
        var memData = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
				
               ws.onopen = function()
               {
                  // Web Socket is connected, send data using send()
                  ws.send("cmdʡ" + server.id.toString() + "ʡdevʡ");
                  document.getElementById("console-button").addEventListener("click", function(){
                      var str = "cmdʡ" + server.id.toString() + "ʡdevʡ" + document.getElementById("console-input").value;
                      ws.send(str);
                      console.log(str);
                        //ws.send("cmdʡ1ʡdevʡsay hello");
                      document.getElementById("console-input").value = "";
                  });
               };
				
               ws.onmessage = function (event) 
               { 
                  var received_msg = event.data;
                  console.log(received_msg);
                  var data = received_msg.split("ʡ");
                  if(data[0] == "status"){
                      servers_guage.set(parseInt(data[2]));
                      players_guage.set(parseInt(data[4]));
                      stuff_guage.set(parseInt(data[3]));

                        for(i = 18; i > 0; i--){
                            procData[i] = procData[i - 1];
                            playerData[i] = playerData[i - 1];
                            memData[i] = memData[i - 1];
                        }                        
                        
                        procData[0] = parseInt(data[4]);
                        playerData[0] = parseInt(data[2]);
                        memData[0] = parseInt(data[3]);
                        $(".sparkline_bar").sparkline(procData, {
                                type: 'bar',
                                colorMap: {
                                    '7': '#a1a1a1'
                                },
                                barColor: '#26B99A',
                                barWidth: 8
                        });                        
                        $(".sparkline_bar_player").sparkline(playerData, {
                                type: 'bar',
                                colorMap: {
                                    '7': '#a1a1a1'
                                },
                                barColor: '#26B99A',
                                barWidth: 8
                        });                        
                        $(".sparkline_bar_mem").sparkline(memData, {
                                type: 'bar',
                                colorMap: {
                                    '7': '#a1a1a1'
                                },
                                barColor: '#26B99A',
                                barWidth: 8
                        });
                  }
                  else if(data[0] = "cmd"){
                      var t = document.createTextNode(data[1]);
                      document.getElementById("console-text").appendChild(t);
                      document.getElementById("console-text").appendChild(document.createElement("br"));
                      document.getElementById("console-scroll").scrollTop = document.getElementById("console-scroll").scrollHeight;

                  }
               };

				
               ws.onclose = function()
               { 
                  // websocket is closed.
                  alert("Connection to server is closed, reload the page!"); 
               };
            
            
      });
    </script>
    <!-- /jQuery Sparklines -->

@endsection
