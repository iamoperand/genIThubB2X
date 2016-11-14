@extends('template.default')

@section('content')


<div class="container">
      
     
        
     

       <div class="card card-container">
                        
            <h3> Who are you?</h3>
 <form method="post" action="{{ route('processInfo') }}">
  <div class="container-fluid">
  <div class="row">


    <select name="choice">
      <option value="employer">Employer</option>
      <option value="employee">Employee</option>
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