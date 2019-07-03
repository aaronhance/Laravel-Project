@extends('layouts.client')

@section('content')


<div class="row">
              <div class="col-md-3 col-sm-3 col-xs-6"></div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Create new server</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3"></div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <!-- start form for validation -->
                    <form id="" data-parsley-validate method="post" action="/admin/servers/new">
                                  {{ csrf_field() }}

                      <label>Name </label>
                      <input type="text" minlength="3" id="name" class="form-control" name="name"  data-parsley-type="alphanum" data-parsley-trigger="change" required value=""/><br/>

                      <div>
                      <label>User </label>
                      <input type="text" id="ac-users" class="form-control" name="user" data-parsley-trigger="change" required value=""/><br/>
                      <div id="acc-users" style="position: relative !important; float: left !important; width: 360px !important; margin-top: -20px !important;"></div>
                      </div>

                      <div>
                      <label>Type </label>
                      <input type="text" id="ac-types" class="form-control" name="type" data-parsley-trigger="change" required value=""/><br/>
                      <div id="acc-types" style="position: relative !important; float: left !important; width: 360px !important; margin-top: -20px !important;"></div>
                      </div>

                      <label>Slots </label>
                      <input max="99999" min="0" type="number" minlength="1" id="phone" class="form-control" name="slots"  data-parsley-type="integer" data-parsley-trigger="change" required value=""/><br/>
                      <label>Memory (MB)</label>
                      <input max="99999" min="128" type="number" minlength="1" id="phone" class="form-control" name="mem"  data-parsley-type="integer" data-parsley-trigger="change" required value="Enter 0 for unlimited"/><br/>

                      <label>Processor priority </label>
                      <input max="2" min="0" type="number" minlength="1" id="phone" class="form-control" name="proc"  data-parsley-type="integer" data-parsley-trigger="change" required value=""/><br/>


                      <br/>
                      <div class="col-md-4 col-sm-4 col-xs-12"></div>
                      <button class="btn btn-success" type="submit">Create</button>

                    </form>
                    <!-- end form for validations -->
                  </div>
                </div>
              </div>
            </div>


@endsection

@section('js')
    <!-- jquery.inputmask -->
    <script src="{{ asset('vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{ asset('vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>

    <!-- jquery.inputmask -->
    <script>

      $(document).ready(function() {
        $('.date').val('');
      });

      $('.date').mouseover(function(){
        $(this).inputmask();
      });

    </script>
    <!-- /jquery.inputmask -->

    <!-- jQuery autocomplete -->
    <script>
      $(document).ready(function() {
        var typesData = {!! json_encode($types->toArray()) !!};

        var types = [typesData.length];
        for(i = 0; i < typesData.length; i++){
          types[i] = typesData[i].name;
        }    

        var userData = {!! json_encode($users->toArray()) !!};

        var users = [userData.length];
        for(i = 0; i < userData.length; i++){
          users[i] = userData[i];
        }


        // initialize autocomplete with custom appendTo
        $('#ac-types').autocomplete({
          lookup: types,
          appendTo: '#acc-types'
        });        
        $('#ac-users').autocomplete({
          lookup: users,
          appendTo: '#acc-users'
        });
      });
    </script>
    <!-- /jQuery autocomplete -->
@endsection
