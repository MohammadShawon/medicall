@extends ('layouts.master')

@section('content') 


	
<div class="col-md-8 appointment-form">
	<form method="post" enctype="multipart/form-data">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Email address</label>
	    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
	  </div>
	  
	  <button type="submit" class="btn btn-default pull-right">Submit</button>
	</form>
</div>
@endsection