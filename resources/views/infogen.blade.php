@extends('template.default')

@section('content')

<div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Welcome to B2X Services</h4>
        </div>
        <div class="modal-body">
          <p style="font-size:1.2em">Your token number is <span id="show-token" style="font-weight:700;font-size:1.4em;"></span></p>
          <br />
          <br />
          <p>Here are your details:</p>
          <p>Name - <span></span>
          <p>Purpose - <span></span>
          <p>Mobile Number - <span></span>
          <p>Check-in time - <span></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary close"></button>
        </div>
</div>

@stop