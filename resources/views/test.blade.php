@extends('layouts.client')

@section('content')


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>DEV TEST PAGE</h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div id="sse">
                    <a href="javascript:WebSocketTest()">Run WebSocket</a>
                </div>                 
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

      <script type="text/javascript">
         function WebSocketTest()
         {
            if ("WebSocket" in window)
            {
               alert("WebSocket is supported by your Browser!");
               
               // Let us open a web socket
               var ws = new WebSocket("ws://localhost:2220");
				
               ws.onopen = function()
               {
                  // Web Socket is connected, send data using send()
                  ws.send("cmdʡ0ʡdevʡsay hello");
                  alert("Message is sent...");
               };
				
               ws.onmessage = function (event) 
               { 
                  var received_msg = event.data;
                  alert("Message is received... " );
                   console.log(event.data);
               };

				
               ws.onclose = function()
               { 
                  // websocket is closed.
                  alert("Connection is closed..."); 
               };
            }
            
            else
            {
               // The browser doesn't support WebSocket
               alert("WebSocket NOT supported by your Browser!");
            }
         }
      </script>

@endsection
