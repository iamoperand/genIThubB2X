@extends('template.default')

@section('content')


<div class="container text-center">

<div class="card card-container">

<img src="{{ asset('images/toExcelsm.png') }}" class="">

<p id="profile-name" class="profile-name-card" style="font-size:2em;color:#000;font-family: 'Lato', sans-serif;">Export Your Data</p>
            <div>&nbsp;</div>
<div class="text-center">
<a href="{{ route('admin.info.excel') }}" class="btn btn-success">Export to Excel</a>
</div>
</div>
</div>




@stop