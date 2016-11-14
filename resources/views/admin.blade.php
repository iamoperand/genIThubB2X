@extends('template.default')

@section('content')

<<<<<<< HEAD
<div class="container" style="background-color:white;">
  <h2>Customer Information</h2>
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
        <td>{{ $user->token_num }}</td>
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
=======
>>>>>>> ff8cd56966e521f4c94dc3d7ca354a06049d7d5c

<div class="container">
      
     
        
     

       <div class="card card-container">
                        
            <h3> Who are you?</h3>
 <form method="post" action="{{ route('processInfo') }}">
  <div class="container-fluid">
  <div class="row">


    <select name="choice">
      <option value="employer">Employer</option>
      <option value="employee">Employee</option>
    </select>
    <button type="submit" class="btn btn-default">Submit</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_token" value="{{ Session::token() }}">
  </div>

  </div>
  </form>
        </div>
    </div>

@stop