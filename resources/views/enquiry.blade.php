@extends('template.default')

@section('content')
 
    <div class="container">
      
      @if (Session::has('success'))
        <div class="alert alert-success fade in" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success:</strong> {{Session::get('success')}}
        </div>
      @endif
        
     

       <div class="card card-container">
                        
            <h3> Purpose</h3>
 <form method="post" action="">
  <div class="container-fluid">
  <div class="row">
    <a href="http://localhost/genIThubB2X/public/info" id="1" class="btn btn-default">General Enquiry</a>
    <br> 
    <a href="http://localhost/genIThubB2X/public/info" id="2" class="btn btn-default">Repair</a>
   <br>
    <a href="http://localhost/genIThubB2X/public/info" id="3" class="btn btn-default">Accessories</a>
  <div>
  </div>
  </form>
        </div>
    </div>

@stop