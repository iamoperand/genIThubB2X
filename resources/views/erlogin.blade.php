@extends('template.default')

@section('content')
 
    <div class="container">

       @if (Session::has('failure_employer'))
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Failed:</strong> {{Session::get('failure_employer')}}
        </div>

      @endif 
      @if (Session::has('employer_notlogged'))
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Failed:</strong> {{Session::get('employer_notlogged')}}
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
            <p id="profile-name" class="profile-name-card" style="font-size:1.5em;color:#ff003f;font-family: 'Lato', sans-serif;">Employer Login</p>
            <div>&nbsp;</div>
 <form method="post" action="{{ route('erLogin') }}" data-parsley-validate>
    <div class="form-group text-center">
      <label for="Name">Username</label>
      <input type="name" name="er_name" class="form-control text-center" placeholder="Enter name" required="">
    </div>
    <div class="form-group text-center">
      <label for="pwd">Password</label>
      <input type="password" name="er_pass" class="form-control text-center" placeholder="Enter password" required="">
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