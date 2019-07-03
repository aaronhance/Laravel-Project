@extends('layouts.client')

@section('css')

    <!-- Datatables -->
    <link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

@endsection

@section('content')


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Servers</h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Address</th>
                        <th>Players</th>
                        <th>Status</th>
                        <th>Manage</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($servers as $server)
                    <tr>
                        <td><h5>{{$server->name}}</h5></td>
                        <td><h5>{{$server->type->name}}</h5></td>
                        <td><h5>{{$server->ip}}:{{$server->port}}</h5></td>
                        <td><h5>{{$server->current_players}} / {{$server->max_players}}</h5></td>
                        <td>
                        @if($server->status == "online")
                        <span class="label label-success pull-right" style="font-size: 22px;">Online</span>
                        @else
                        <span class="label label-danger pull-right" style="font-size: 22px;">Offline</span>
                        @endif
                        </td>
                        <td>
                            <div class="btn-group pull-right">
                                <a type="button" href="/services/servers/{{$server->id}}" class="btn btn-primary">Settings</a>
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                @if($server->status == "online")
                                <li><a href="">Stop</a></li>
                                @else
                                <li><a href="#">Start</a></li>
                                @endif
                                <li><a href="#">Restart</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">Delete</a>
                                </li>
                            </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>                   
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')

    <!-- Datatables -->
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>

        <!-- Datatables -->
    <script>
      $(document).ready(function() {

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
            }
          };
        }();

        $('#datatable').dataTable();

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->

@endsection
