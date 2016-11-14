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
        <th>Accept for Start</th>
        <th>Finish for Project</th>
      </tr>
    </thead>
<tbody>
@foreach ($users as $user)
    
      <tr>
        <td>{{ $user->token_num }}</td>
        <td>{{ $user->purpose }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->phone_num }}</td>
        <td><button type="submit">Accepted</button></td>
        <td><button type="submit">Finished</button></td>
      </tr>
    
@endforeach

  </tbody>
  </table>

  <div class="text-center">
{!! $users->links(); !!}
</div>

</div>


@stop