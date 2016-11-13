@extends('template.default')

@section('content')
 
    <div class="container">
        <div class="card card-container">
                        
            
 <form method="post" action="">
    <div class="form-group">

      <label for="Purpose">Purpose</label>
      <input type="text" name="purpose" class="form-control" id="purpose_info" value="{{$purpose_of_visit}}" disabled>
    </div>
    <div class="form-group">
    
      <label for="Name">Name</label>
      <input type="name" name="name" class="form-control" id="name_info" placeholder="Enter Name">
    </div>
    
    <div class="form-group">
      <label for="tel">Mobile</label>
      <input type="text" name="num" class="form-control" id="mobile_info" placeholder="Enter Mobile">
    </div>
    <a type="submit" href="{{url('infogen')}}" rel="facebox" id="clicked" onclick="iterate()" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Submit</a>
    <a type="button" class="btn btn-default" href="{{url('enquiry')}}">Go back</a>
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" name="_token" value="{{ Session::token() }}">
  </form>
        </div>
    </div>
    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      
    </div>
  </div>
@stop