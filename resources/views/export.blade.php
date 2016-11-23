@extends('template.default')

@section('content')


<div class="container text-center">

<div class="card card-container">

<img src="{{ asset('images/toExcelsm.png') }}" class="">

<p id="profile-name" class="profile-name-card" style="font-size:2em;color:#000;font-family: 'Lato', sans-serif;">Export Your Data</p>
            <div>&nbsp;</div>
            
     <div class="input-group input-daterange" data-provide="datepicker" data-date-format="yyyy-mm-dd">
    <input type="text" class="form-control" value="2016-11-22">
    <span class="input-group-addon">to</span>
    <input type="text" class="form-control" value="2016-11-23">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div>
       <br />
<div class="text-center">
<a href="{{ route('admin.info.excel') }}" class="btn btn-success">Export to Excel</a>
</div>
</div>
</div>

<script>
	$(function(){

	});
</script>


@stop