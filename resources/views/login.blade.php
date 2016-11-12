@extends('template.default')

@section('content')
 
    <div class="container">

       @if (Session::has('failure'))
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Failed:</strong> {{Session::get('failure')}}
        </div>

      @endif  
        <div class="card card-container">
                    <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
 <form method="post" action="{{ route('submit') }}">
    <div class="form-group">
      <label for="Name">Username</label>
      <input type="name" name="name" class="form-control"  placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password</label>
      <input type="password" name="pass" class="form-control" placeholder="Enter password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="Remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" name="_token" value="{{ Session::token() }}">
  </form>
        </div>
    </div>
@stop