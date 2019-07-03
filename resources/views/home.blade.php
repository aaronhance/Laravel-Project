@extends('layouts.client')

@section('content')


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Dashboard</h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                You have logged in                    
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>News</h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <ul class="list-unstyled timeline widget">
                @foreach($posts as $post)
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                            <a>{{$post->title}}</a>
                            </h2>
                            <div class="byline">
                              <span>{{$post->created_at->format('jS \\of F, g:i a') }}</span>
                            </div>
                            <p class="excerpt">{{$post->body}}</p>
                          </div>
                        </div>
                      </li>
                @endforeach
                    </ul>                   
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
                            <h4 class="text-center" >Servers Online</h4>
                            <canvas width="150" height="80" id="servers" class="" style="width: 100%; height: 100%;"></canvas>
                            <div class="goal-wrapper">
                                <span class="gauge-value pull-left"></span>
                                <span id="servers-text" class="gauge-value pull-left">3</span>
                                <span id="goal-text" class="goal-value pull-right">5</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1"></div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="sidebar-widget">
                            <h4 class="text-center" >Players Online</h4>
                            <canvas width="150" height="80" id="players" class="" style="width: 100%; height: 100%;"></canvas>
                            <div class="goal-wrapper">
                                <span class="gauge-value pull-left"></span>
                                <span id="players-text" class="gauge-value pull-left">64</span>
                                <span id="goal-text" class="goal-value pull-right">260</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1"></div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="sidebar-widget">
                            <h4 class="text-center" >Most Players</h4>
                            <canvas width="150" height="80" id="stuff" class="" style="width: 100%; height: 100%;"></canvas>
                            <div class="goal-wrapper">
                                <span class="gauge-value pull-left"></span>
                                <span id="stuff-text" class="gauge-value pull-left">0</span>
                                <span id="goal-text" class="goal-value pull-right">260</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')

    <!-- gauge.js -->
    <script>
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

      servers_guage.maxValue = 5;
      servers_guage.animationSpeed = 100;
      servers_guage.set(4);
      servers_guage.setTextField(document.getElementById("servers-text"));

      var target = document.getElementById('players');
      players_guage = new Gauge(target).setOptions(opts);

      players_guage.maxValue = 260;
      players_guage.animationSpeed = 100;
      players_guage.set(132);
      players_guage.setTextField(document.getElementById("players-text"));

      var target = document.getElementById('stuff');
      stuff_guage = new Gauge(target).setOptions(opts);

      stuff_guage.maxValue = 260;
      stuff_guage.animationSpeed = 100;
      stuff_guage.set(198);
      stuff_guage.setTextField(document.getElementById("stuff-text"));

    </script>
    <!-- /gauge.js -->

@endsection
