@extends('template.default')

@section('content')
 
    <div class="container">
      
      @if (Session::has('success_user'))
        <div class="alert alert-success fade in" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success:</strong> {{Session::get('success_user')}}
        </div>
      @endif
        
     

       <div class="card card-container">
                        
            <div class="text-center" style="font-size:1.8em;font-weight:700;font-family: 'Lato', sans-serif;">Purpose of Visit</div>
 <div>&nbsp;</div>
 <form method="post" action="{{ route('purpose') }}">
  <div class="container-fluid">
  <div class="row">


    <select name="purpose" class="form-control">
      <option value="General-Enquiry">General-Enquiry</option>
      <option value="Repair">Repair</option>
      <option value="Accessories">Accessories</option>
    </select>
    <br />
    <div class="text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_token" value="{{ Session::token() }}">
  </div>

  </div>
  </form>
        </div>
    </div>

@stop