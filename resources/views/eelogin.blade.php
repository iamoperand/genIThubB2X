@extends('template.default')

@section('content')
 <div class="container">

       @if (Session::has('failure_employee'))
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Failed:</strong> {{Session::get('failure_employee')}}
        </div>

      @endif 
      @if (Session::has('employee_notlogged'))
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Failed:</strong> {{Session::get('employee_notlogged')}}
        </div>

      @endif 

      @if (Session::has('logged_as'))
        <div class="alert alert-info fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Information:</strong> {{Session::get('logged_as')}}
        </div>

      @endif  
      <div class="row">
        <div class="col-md-12">
        <div class="card card-container">
                    <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card" style="font-size:1.5em;color:#ff003f;font-family: 'Lato', sans-serif;">Employee Login</p>
            <div>&nbsp;</div>
 <form method="post" action="{{ route('eeLogin') }}">
    <div class="form-group text-center">
      <label for="Name">Username</label>
      <input type="name" name="ee_name" class="form-control text-center" placeholder="Enter name">
    </div>
    <div class="form-group text-center">
      <label for="pwd">Password</label>
      <input type="password" name="ee_pass" class="form-control text-center" placeholder="Enter password">
    </div>
    <!--
    <div class="checkbox">
      <label><input type="checkbox" name="Remember"> Remember me</label>
    </div>
    -->
    <div class="text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" name="_token" value="{{ Session::token() }}">
  </form>
        </div>
      </div>
</div>
    </div>
@stop