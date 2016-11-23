@extends('template.default')

@section('content')

<div class="container">
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style="text-decoration:none;pointer-events:none;color:#3A3A3A;" href="#">Options</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Employee
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
           <li><a style="cursor:pointer;" data-toggle="modal" data-target="#myModal">Add Employee</a></li>
           <li><a href="{{ route('showEmployee') }}">Show Employee</a></li>
        </ul>
      </li>
       
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Export
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{url('export')}}">Export to Excel</a></li>
        </ul>
      </li>
       <li><a style="cursor:pointer;" data-toggle="modal" data-target="#myModal2">Change Password</a></li>
      </ul>
      
    </div>
  </div>
</nav>
</div>
 @if (Session::has('info'))
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success:</strong> {{Session::get('info')}}
        </div>
 @endif
   <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Change Password</h4>
        </div>
        <div class="modal-body">
           <form method="post" action="{{ route('changeErPassword') }}" data-parsley-validate>
            <div class="form-group text-center">
            <label for="name" class="control-label">New Password</label>
            <input type="password" name="password" class="form-control text-center" required="" data-parsley-maxlength="255">
          </div>
          <div class="form-group text-center">
            <label for="pwd" class="control-label">Confirm Password</label>
            <input type="password" name="confirmpassword" class="form-control text-center" required="" data-parsley-maxlength="255">
          </div>
        <div class="form-group text-center">
            <button class="btn btn-success btn-md" type="submit">Change</button>
          
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_token" value="{{ Session::token() }}"> 
            <input type="hidden" name="ename" value="{{ Session::get('er_name')}}">
        </div>
        
        <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div> 
           
        
      </form>
      </div>
      </div>
    </div>
  </div>


 @if (Session::has('error'))
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Failure:</strong> {{Session::get('error')}}
        </div>
 @endif
  <!-- Modal -->
  <div class="modal fade" id="chPassword" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Change Password</h4>
        </div>
        <div class="modal-body text-center">
           <form  method="post" action="{{ route('chPassword') }}" data-parsley-validate>
            <div class="form-group text-center">
            <label for="name" class="control-label text-center">New Password</label>
            <input type="password" placehoder="Password" name="password" id="password" class="form-control text-center" required="" data-parsley-maxlength="255">
          </div>
          <div class="form-group text-center">
            <label for="name" class="control-label">Confirm Password</label>
            <input type="password" placehoder="Confirm password" name="confirmpass" class="form-control text-center" required="" data-parsley-maxlength="255" data-parsley-equalto="#password">
          </div>
        <div class="form-group text-center">
            <button class="btn btn-success btn-md" type="submit">Change</button>
          
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_token" value="{{ Session::token() }}"> 
            <input type="hidden" id="chpass" name="ename" value="">
        </div>
        
        <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div> 
           
        
      </form>
      </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Add New Employee</h4>
        </div>
        <div class="modal-body">
           <form method="post" action="{{ route('addEmployee') }}">
            <div class="form-group text-center">
            <label for="name" class="control-label">Username</label>
            <input type="name" name="name" class="form-control text-center">
          </div>
          <div class="form-group text-center">
            <label for="pwd" class="control-label">Password</label>
            <input type="password" name="password" class="form-control text-center">
          </div>
        <div class="form-group text-center">
            <button class="btn btn-success btn-md" type="submit">Add Employee</button>
          
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_token" value="{{ Session::token() }}"> 
        </div>
        
        <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div> 
           
        
      </form>
      </div>
      </div>
    </div>
  </div>   
<div class="container" style="background-color:white;">
  
  <div class="text-center" style="font-family: 'Lato', sans-serif;font-size:1.7em;font-weight:700;margin-top:10px;color:#6d6d6d;"> Employee Information </div>
  <p></p>            
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Username</th>
        <th>Change Password</th>
        <th>Delete</th>
      </tr>
    </thead>
<tbody>
@foreach ($employees as $employee)
    
      <tr>
        <td><span style="font-size:1.2em;font-weight:700;">{{ $employee->username }}</span></td>
        <td><button type="button" class="btn btn-danger change" data-toggle="modal" data-target="#chPassword" data-id="{{ $employee->username }}" >Change Password</button></td>
        <td><form method="post" action="{{ route('deleteEe')}}"><button type="submit" class="btn btn-primary">Delete </button><input type="hidden" name="ename" value="{{ $employee->username }}"><input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_token" value="{{ Session::token() }}"></form></td>
      </tr>
    
@endforeach

  </tbody>
  </table>

  <div class="text-center">
</div>
</div>
<script src="{{ asset('js/modalJS.js') }}"></script>
@stop