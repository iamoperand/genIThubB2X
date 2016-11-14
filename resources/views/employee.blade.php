@extends('template.default')

@section('content')



<div class="container" style="background-color:white;">
  <h2>Employee</h2>
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
        <td><form method="post" action="{{route('startQuery')}}"><button type="submit" class="btn btn-info"  {{ $user->a_flag==true?'disabled':''}}>Accepted</button><input type="hidden" name="token" value="{{ $user->token_num }}"><input type="hidden" name="flag" value="1"><input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_token" value="{{ Session::token() }}"></form></td>
        <td><form method="post" action="{{route('finishQuery')}}"><button type="submit" class="btn btn-info" {{ $user->e_flag==true?'disabled':''}}>Finished</button><input type="hidden" name="token" value="{{ $user->token_num }}"><input type="hidden" name="flag" value="1"><input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_token" value="{{ Session::token() }}"></form></td>
      </tr>
    
@endforeach

  </tbody>
  </table>

  <div class="text-center">
{!! $users->links(); !!}
</div>
</div>

@stop