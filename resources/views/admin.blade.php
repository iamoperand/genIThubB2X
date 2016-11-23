@extends('template.default')

@section('content')


<div class="container">
      
     
        @if (Session::has('success_admin'))
        <div class="alert alert-success fade in" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success:</strong> {{Session::get('success_admin')}}
        </div>
      @endif
      @if (Session::has('failure'))
        <div class="alert alert-warning fade in" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Problem:</strong> {{Session::get('failure')}}
        </div>
      @endif

       <div class="card card-container">
                        
            <div class="text-center" style="font-size:1.8em;font-weight:700;font-family: 'Lato', sans-serif;">Who are you?</div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
 <form method="post" action="{{ route('processInfo') }}" data-parsley-validate>
  <div class="container-fluid">
  <div class="row text-center">


    <select name="choice" class="selectpicker">
      <option value="employer">Employer</option>
      <option value="employee">Employee</option>
    </select>
    </div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
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
<script type="text/javascript">
  $('.selectpicker').selectpicker({
  style: 'btn-default',
  
});
</script>
@stop