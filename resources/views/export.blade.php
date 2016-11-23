@extends('template.default')

@section('content')


<div class="container text-center">

<div class="card card-container">

<img src="{{ asset('images/toExcelsm.png') }}" class="">

<p id="profile-name" class="profile-name-card" style="font-size:2em;color:#000;font-family: 'Lato', sans-serif;">Export Your Data</p>
            <div>&nbsp;</div>
             <form method="post" action="{{route('admin.info.excel')}}">
     <div class="input-group input-daterange" data-provide="datepicker" data-date-format="yyyy-mm-dd">
    <input type="text" class="form-control" name="start" placeholder="Start Date">
    <span class="input-group-addon">to</span>
    <input type="text" class="form-control" name="finish" placeholder="End Date">

</div>

 
       <br />
   <div class="form-group">
<input type="submit" class="btn btn-success" value="Export to Excel">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" name="_token" value="{{ Session::token() }}">
  </div>
  </form>


</div>
</div>

<script>
	
</script>


@stop