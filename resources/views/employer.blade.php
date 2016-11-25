@extends('template.default')

@section('content')

<div class="container">
    <nav class="navbar navbar-default" style="background-color:#fff;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style="text-decoration:none;color:#3A3A3A;" href="{{url('employer')}}">Options</a>
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
       <li><a style="cursor:pointer;" href="{{ url('chpasser')}}">Change Your Password</a></li>
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
  @if (Session::has('error'))
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Failure:</strong> {{Session::get('error')}}
        </div>
 @endif
 @if (Session::has('success_employer'))
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success:</strong> {{Session::get('success_employer')}}
        </div>
 @endif
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
           <form method="post" action="{{ route('addEmployee') }}" data-parsley-validate>
            <div class="form-group text-center">
            <label for="name" class="control-label">Username</label>
            <input type="name" name="name" class="form-control text-center" required="" data-parsley-maxlength="255">
          </div>
          <div class="form-group text-center">
            <label for="pwd" class="control-label">Password</label>
            <input type="password" name="password" class="form-control text-center" required="" data-parsley-maxlength="255">
          </div>
        <div class="form-group text-center">
            <button class="btn btn-primary btn-md" type="submit">Add Employee</button>
          
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
            <input type="password" name="password" id="er_password" class="form-control text-center" required="" data-parsley-maxlength="255">
          </div>
          <div class="form-group text-center">
            <label for="pwd" class="control-label">Confirm Password</label>
            <input type="password" name="confirmpassword" class="form-control text-center" required="" data-parsley-maxlength="255" data-parsley-equalto="#er_password">
          </div>
        <div class="form-group text-center">
            <button class="btn btn-primary btn-md" type="submit">Submit</button>
          
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
<div class="container" style="background-color:white;">

  <div class="text-center" style="font-family: 'Lato', sans-serif;font-size:1.7em;font-weight:700;margin-top:10px;color:#6d6d6d;">Customer Information <span style="color:#020000;">(Permanent)</span></div>
     <p></p>           
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Serial Number</th>
        <th>Token Number</th>
        <th>Purpose</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Employee Name</th>
        <th>Start Time</th>
        <th>End Time</th>
      </tr>
    </thead>
<tbody>
@foreach ($users as $user)
    
      <tr>
      <td>{{ $user->s_no}}</td>
        <td><span style="font-size:1.2em;font-weight:700;">{{ $user->token_num }}</span></td>
        <td>{{ $user->purpose }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->phone_num }}</td>
        <td>{{ $user->e_name }}</td>
        <td>{{ $user->start_timestamp }}</td>
        <td>{{ $user->end_timestamp }}</td>
      </tr>
    
@endforeach

  </tbody>
  </table>
  <div class="text-center">
{!! $users->links(); !!}
</div>
</div>
@stop