@extends('template.default')

@section('content')

<div class="container-fluid">
<div class="text-center">
<p id="profile-name" class="profile-name-card" style="font-size:6em;color:#D5C36D;font-family: 'Lato', sans-serif;">Token Number</p>
</div>
@foreach ($users as $user)
<div class="col-md-3">
<div class="card card-container">


<img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            
<div class="text-center"></div>
<table class="table table-bordered table-hover">
    
<tbody> 

    
      <tr id="refresh" class="text-center">

        <td><span style="font-size:3.2em;font-weight:700;">{{ $user->token_num }}</span></td>

</tr>
    


  </tbody>
  </table>



</div>
</div>
@endforeach
</div>
<script src="js/refresh.js"></script>
@stop

