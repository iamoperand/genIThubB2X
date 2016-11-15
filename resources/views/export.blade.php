@extends('template.default')

@section('content')


<div class="container text-center">

<div class="card card-container">

<img src="images/toExcelsm.png" class="">

<p id="profile-name" class="profile-name-card" style="font-size:2em;color:#000;font-family: 'Lato', sans-serif;">Export Your Data</p>
            <div>&nbsp;</div>
<div class="text-center">
{!! link_to_route('admin.info.excel', 
      'Export to Excel (Customer Data)', null, 
      ['class' => 'btn btn-success']) 
!!}
</div>
</div>
</div>




@stop