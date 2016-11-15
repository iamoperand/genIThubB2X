@extends('template.default')

@section('content')

<div class="container">
<div class="card card-container">

<img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card" style="font-size:1.5em;color:#ff003f;font-family: 'Lato', sans-serif;">Token Number</p>
<table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Token Number</th>
 </tr>
    </thead>
<tbody>
@foreach ($users as $user)
    
      <tr>
        <td><span style="font-size:1.2em;font-weight:700;">{{ $user->token_num }}</span></td>
</tr>
    
@endforeach

  </tbody>
  </table>



</div>
</div>

@stop

