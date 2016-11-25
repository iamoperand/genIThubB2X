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
<div class="container text-center">

<div class="card card-container">

<img src="{{ asset('images/toExcelsm.png') }}" class="">

<p id="profile-name" class="profile-name-card" style="font-size:2em;color:#000;font-family: 'Lato', sans-serif;">Export Your Data</p>
<div>&nbsp;</div>
            <div>&nbsp;</div>

<div style="font-size:1em;color:#000;font-family: 'Lato', sans-serif;">Choose the <b>START</b> and <b>END</b> dates</div>
<div>&nbsp;</div>
            
             <form method="post" action="{{route('admin.info.excel')}}" data-parsley-validate>
     <div class="input-daterange">
    <input type="text" class="form-control datepicker_start" name="start" placeholder="Start Date" required="">
    <div style="font-size:1.2em;font-weight:700;padding:5px 0px 5px 0px;">TO</div>
    <input type="text" class="form-control datepicker_finish" name="finish" placeholder="End Date" required="">

</div>

 
       <br />
<div>&nbsp;</div>
            
   <div class="form-group">
<input type="submit" class="btn btn-primary" value="Export to Excel">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" name="_token" value="{{ Session::token() }}">
  </div>
  </form>


</div>
</div>

<script>
	$('.datepicker_start').datepicker({
    
    format: 'yyyy-mm-dd',
    autoclose: true,
    	
    daysOfWeekDisabled: '0',
    title: "Choose Initial Date",
    todayHighlight: true,
});
	$('.datepicker_finish').datepicker({
    
    format: 'yyyy-mm-dd',
    autoclose: true,
    
    daysOfWeekDisabled: '0',
    title: "Choose Final Date",
    todayHighlight: true,
});
</script>


@stop