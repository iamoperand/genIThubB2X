@extends('template.default')

@section('content')
 
    <div class="container">
        <div class="card card-container">
                        
            
 <form method="post" action="">
    <div class="form-group">
      <label for="Name"></label>
      <input type="name" name="name" class="form-control"  placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password</label>
      <input type="password" name="pass" class="form-control" placeholder="Enter password">
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
        </div>
    </div>
@stop