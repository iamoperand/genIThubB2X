@extends('template.default')

@section('content')

@foreach($data as $info)
<div class="col-md-offset-2 col-md-8">

<div class="modal-content">
        <div class="modal-header">
          
        <h4 class="modal-title">Welcome to B2X Services</h4>
        </div>
        <div class="modal-body">
          <p style="font-size:1.2em">Your token number is <span id="show-token" style="font-weight:700;font-size:1.4em;">{{ $info->token_num }}</span></p>
          <br />
          <br />
          <p>Here are your details:</p>
          <p>Name - <span>{{ $info->name }}</span><br />
          Purpose - <span>{{ $info->purpose }}</span><br />
          Mobile Number - <span>{{ $info->phone_num }}</span><br />
          Check-in time - <span>{{ $info->start_timestamp }}</span></p>
        </div>
        <div class="modal-footer">
          <a href="{{url('enquiry')}}" class="close"> 
              OK
          </a> 
        </div>
</div>
</div>
@endforeach
@stop