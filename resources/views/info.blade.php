@extends('template.default')

@section('content')
 
    <div class="container">
        <div class="card card-container">
                        
            
 <form method="post" action="{{ route('infoSubmit') }}" data-parsley-validate>
    <div class="form-group">
      <div class="text-center" style="font-size:1.8em;font-weight:700;font-family: 'Lato', sans-serif;">Information</div>
     <div>&nbsp;</div>
      <label for="Purpose">Purpose</label>
      <input type="text" name="purpose" class="form-control" id="purpose_info" value="{{$purpose_of_visit}}" disabled>
    </div>
    <div class="form-group">
    
      <label for="Name">Name</label>
      <input type="name" name="name" class="form-control" id="name_info" placeholder="Enter Name" required="" data-parsley-maxlength="255" >
    </div>
    
    <div class="form-group">
      <label for="tel">Mobile</label>
      <input type="text" name="num" class="form-control" id="mobile_info" placeholder="Enter Mobile" required="" data-parsley-type="number" data-parsley-minlength="8" data-parsley-maxlength="11">
    </div>
    <div><br /></div>
    <div class="text-center">
    <button type="submit" href="{{url('infogen')}}" rel="facebox" id="clicked" class="btn btn-primary btn-md">Submit</button>

    <a type="button" class="btn btn-default" href="{{url('enquiry')}}">Go back</a>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_token" value="{{ Session::token() }}">
  </form>
        </div>
    </div>

  
    
@stop