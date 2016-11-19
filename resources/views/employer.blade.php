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
      <a class="navbar-brand" href="#">Options</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="{{ url('add-employee') }}">Add Employee</a></li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Export
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{url('export')}}">Export to Excel</a></li>
        </ul>
      </li>
      </ul>
      
    </div>
  </div>
</nav>
</div>
<div class="container" style="background-color:white;">

  <div class="text-center" style="font-family: 'Lato', sans-serif;font-size:1.7em;font-weight:700;margin-top:10px;color:#6d6d6d;">Customer Information <span style="color:#020000;">(Permanent)</span></div>
     <p></p>           
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Token Number</th>
        <th>Purpose</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Start Time</th>
        <th>End Time</th>
      </tr>
    </thead>
<tbody>
@foreach ($users as $user)
    
      <tr>
        <td><span style="font-size:1.2em;font-weight:700;">{{ $user->token_num }}</span></td>
        <td>{{ $user->purpose }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->phone_num }}</td>
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