@extends('layouts.main')
@section('title', 'Edir role')
@section('content')

 <div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				<h4 class="card-title">Edit Role
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
    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
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
                <div class="col-lg-12">
                    <br>
                </div>
                 <div class="col-lg-3">
                     <label>Setting Permissions</label>

                      <br/>
         @foreach($permission as $value)
         @if($loop->iteration >=12 && $loop->iteration <=24)
             <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
             {{ $value->name }}</label>
         <br/>
         @endif
         @endforeach
                 </div>
                 <div class="col-lg-3">
                    <label>User Account and Role</label>

                     <br/>
        @foreach($permission as $value)
        @if($loop->iteration >=1 && $loop->iteration <=11)
            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
            {{ $value->name }}</label>
        <br/>
        @endif
        @endforeach
                </div>
                <div class="col-lg-3">
                    <label>Plan Permissions</label>

                     <br/>
        @foreach($permission as $value)
        @if($loop->iteration >=25 && $loop->iteration <=33)
            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
            {{ $value->name }}</label>
        <br/>
        @endif
        @endforeach
                </div>
                <div class="col-lg-3">
                    <label>Motivations</label>

                     <br/>
        @foreach($permission as $value)
        @if($loop->iteration >=34 && $loop->iteration <=37)
            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
            {{ $value->name }}</label>
        <br/>
        @endif
        @endforeach
                </div>


             </div>
         </div>

         <div class="text-right">
             <button type="submit" class="btn btn-primary">Save changes</button>
         </div>
     {!! Form::close() !!}
 </div>

			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row --







@endsection




