@extends('template.default')

@section('content')


<div class="container">


{!! link_to_route('admin.info.excel', 
      'Export to Excel', null, 
      ['class' => 'btn btn-info']) 
!!}

</div>




@stop