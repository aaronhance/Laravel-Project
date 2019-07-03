@extends('layouts.client')

@section('content')


<div class="row">
              <div class="col-md-3 col-sm-3 col-xs-6"></div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Information</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3"></div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate>

                      <label for="fullname">Name</label>
                      <input type="text" id="fullname" class="form-control" name="fullname" required value="{{$info[0]}}"/><br/>


                      <label for="email">Email </label>
                      <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" required value="{{$info[1]}}"/><br/>


                      <label for="phone">Phone </label>
                      <input type="text" minlength="7" id="phone" class="form-control" name="phone"  data-parsley-type="integer" data-parsley-trigger="change" required value="{{$info[2]}}"/><br/>


                      <br/>
                      <div class="col-md-4 col-sm-4 col-xs-12"></div>
                      <span class="btn btn-success">Change details</span>

                    </form>
                    <!-- end form for validations -->
                  </div>
                </div>
              </div>
            </div>


@endsection
