@extends('template.default')

@section('content')


<div class="container">
      
     
        @if (Session::has('success_admin'))
        <div class="alert alert-success fade in" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success:</strong> {{Session::get('success_admin')}}
        </div>
      @endif
     

       <div class="card card-container">
                        
            <div class="text-center" style="font-size:1.3em;font-weight:700;">Who are you?</div>
            <div>&nbsp;</div>
 <form method="post" action="{{ route('processInfo') }}">
  <div class="container-fluid">
  <div class="row">


    <select name="choice" class="form-control">
      <option value="employer">Employer</option>
      <option value="employee">Employee</option>
    </select>
    </div>
    <br />
    <div class="text-center">
    <button type="submit" class="btn btn-default">Submit</button>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_token" value="{{ Session::token() }}">
  </div>

  </div>
  </form>
        </div>
    </div>

@stop