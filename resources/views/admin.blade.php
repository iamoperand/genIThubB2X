@extends('template.default')

@section('content')

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


@stop