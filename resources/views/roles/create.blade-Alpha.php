@extends('layouts.main')
@section('title', 'create new role')
@section('content')
<div class="page-content">
  <div class="container-fluid">
 <div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				<h4 class="card-title">Create New Role
					<a style="float:right" class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a></h4>
				</h4>

				@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
<div class="card-body">
    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
         <div class="form-group">
             <div class="row">
                 <div class="col-lg-6">
                     <label>Name <b style="color:red">*</b></label>
                      {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                 </div>


             </div>
         </div>


         <div class="form-group">
             <div class="row">
                 <div class="col-lg-6">
                     <label>Permission</label>

                   <br/>
         @foreach($permission as $value)
             <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
             {{ $value->name }}</label>
         <br/>
         @endforeach
                 </div>


             </div>
         </div>

         <div class="text-right">
             <button type="submit" class="btn btn-primary">Submit</button>
         </div>
     {!! Form::close() !!}
 </div>

			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->
</div>
</div>






@endsection




