@extends('template.default')

@section('content')

<div class="container-fluid">

<div class="card card-container">


<img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card" style="font-size:1.5em;color:#ff003f;font-family: 'Lato', sans-serif;">Token Number</p>
<div class="text-center"></div>
<table class="table table-bordered table-hover">
    
<tbody>

    
      <tr>
@foreach ($users as $user)
        <td><span style="font-size:3.2em;font-weight:700;">{{ $user->token_num }}</span></td>
@endforeach
</tr>
    


  </tbody>
  </table>



</div>
</div>

@stop

