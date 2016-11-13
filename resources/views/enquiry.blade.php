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
                        
            <h3> Purpose of Visit</h3>
 <form method="post" action="{{ route('purpose') }}">
  <div class="container-fluid">
  <div class="row">


    <select name="purpose">
      <option value="General-Enquiry">General-Enquiry</option>
      <option value="Repair">Repair</option>
      <option value="Accessories">Accessories</option>
    </select>
    <button type="submit" class="btn btn-default">Submit</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_token" value="{{ Session::token() }}">
  </div>

  </div>
  </form>
        </div>
    </div>

@stop