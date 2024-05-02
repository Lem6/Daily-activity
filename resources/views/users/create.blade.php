@extends('layouts.main')
@section('title', 'users create')
@section('content')

 <div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				<h4 class="card-title">Create New User
					<a style="float:right" class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                          </h5>
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
                {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Full Name <b style="color:red">*</b></label>
                                 {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>

                            <div class="col-lg-6">
                                <label>Email <b style="color:red">*</b></label>
                                  {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label> Password <b style="color:red">*</b></label>
                                  {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                            </div>

                            <div class="col-lg-6">
                                <label>Confirm password <b style="color:red">*</b></label>
                                 {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Role <b style="color:red">*</b></label>
                                <select    name="roles[]" id="formrow-inputState" class="select2 form-control select2-multiple"
                                                        multiple="multiple" data-placeholder="Choose ...">
                                                        <option value="">Select Role</option>
                                                            @foreach($roles as $role)

                                                            <option value="{{$role->id}}" {{ old('role') ? 'selected' : '' }} >{{$role->name}}</option>

                                                        @endforeach
                                                        </select>
                                 {{-- {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!} --}}
                            </div>
                            <div class="col-lg-6">
                                <label>Organzation Unit <b style="color:red">*</b></label>
                                <select    name="organization_id" id="formrow-inputState" class="form-control" data-placeholder="Choose ...">
                                                          <option value="">Select Organization Unit</option>

                                                            @foreach($org_units as $org)

                                                            <option value="{{$org->id}}" {{ old('organization_id') ? 'selected' : '' }} >{{$org->name}}</option>

                                                        @endforeach
                                                        </select>
                                 {{-- {!! Form::select('organization_id', $orgs,[], array('class' => 'form-control','multiple')) !!} --}}
                            </div>
                            <div class="col-lg-12">
                                <br>
                            </div>

                            <div class="col-lg-6">
                                <label>Is Chairman?</label>&nbsp;&nbsp;
                                <input type="checkbox" id="vehicle1" @if(old('chairman')) checked @endif name="chairman" value="1">

                                {{-- {!! Form::checkbox('chairman', null,false, array('class' => 'form-control')) !!} --}}
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







@endsection




