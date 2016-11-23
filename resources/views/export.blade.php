@extends('template.default')

@section('content')


<div class="container text-center">

<div class="card card-container">

<img src="{{ asset('images/toExcelsm.png') }}" class="">

<p id="profile-name" class="profile-name-card" style="font-size:2em;color:#000;font-family: 'Lato', sans-serif;">Export Your Data</p>
<div>&nbsp;</div>
            <div>&nbsp;</div>

<div style="font-size:1em;color:#000;font-family: 'Lato', sans-serif;">Choose the <b>start</b> and <b>end</b> date</div>
<div>&nbsp;</div>
            
             <form method="post" action="{{route('admin.info.excel')}}" data-parsley-validate>
     <div class="input-daterange">
    <input type="text" class="form-control datepicker_start" name="start" placeholder="Start Date" required="">
    <div style="font-size:1.2em;font-weight:700;padding:5px 0px 5px 0px;">TO</div>
    <input type="text" class="form-control datepicker_finish" name="finish" placeholder="End Date" required="">

</div>

 
       <br />
<div>&nbsp;</div>
            
   <div class="form-group">
<input type="submit" class="btn btn-primary" value="Export to Excel">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" name="_token" value="{{ Session::token() }}">
  </div>
  </form>


</div>
</div>

<script>
	$('.datepicker_start').datepicker({
    
    format: 'yyyy-mm-dd',
    autoclose: true,
    	
    daysOfWeekDisabled: '0',
    title: "Choose Initial Date",
    todayHighlight: true,
});
	$('.datepicker_finish').datepicker({
    
    format: 'yyyy-mm-dd',
    autoclose: true,
    
    daysOfWeekDisabled: '0',
    title: "Choose Final Date",
    todayHighlight: true,
});
</script>


@stop