@extends('layouts.main')
@section('title', 'users list')
@section('content')
@section('style')
 <!-- DataTables -->
 <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
 <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

 <!-- Responsive datatable examples -->
 <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />   

 @stop
  <div class="page-content">
  <div class="container-fluid">
 <div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				<h4 class="card-title">User Managment
					@can('user_create') 
							<a style="float:right" class="btn btn-success" href="{{ route('users.create') }}"> Create</a>
                            @endcan
                          </h5>
				</h4>
				
				@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
				<table id="datatable" class="table  dt-responsive  nowrap w-100">
					<thead>
					<tr>
						<th>No</th>
									<th>Full Name</th>
									<th>Email</th>
									<th>Roles</th>
								     <th>Status</th>
									<th >Actions</th>
					</tr>
					</thead>


					<tbody>
				
						@foreach ($data as $key => $user)
										<tr>
											<td>{{ ++$i }}</td>
											<td>{{ $user->name }}</td>
											<td>{{ $user->email }}</td>
											<td>
											@if(!empty($user->getRoleNames()))
												@foreach($user->getRoleNames() as $v)
												<label >{{ $v }}</label>
												@endforeach
											@endif
											</td>
											@can('user_activation')
											@if($user->id!='1')
											@if($user->active==1)
											<td><a href="active/{{$user->id}}" class="badge rounded-pill bg-danger" >Deactivate</a></td>
											@else
											<td><a href="deactive/{{$user->id}}" class="badge rounded-pill bg-success" >Activate</a></td>
											@endif
											@else
											@if($user->active==1)
											<td><a disabled class="badge rounded-pill bg-danger">Deactivate</a></td>
											@else
											<td><a disabled  class="badge rounded-pill bg-success">Activate</a></td>
											@endif
											@endif
											@endcan
										
						<td>
							<div class="dropdown">
								<a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="mdi mdi-dots-horizontal font-size-18"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									
									@can('user_edit')
									<a href="{{ route('users.edit',$user->id) }}" class="dropdown-item" href="#">Edit</a>
													
								@endcan
								@can('user_delete')
								@if($user->id!='1')
								<a href="{{ route('users.destroy',$user->id) }}" onclick="return confirm('Are you sure You Want to Delete?')" style="color:red" class="dropdown-item" href="#">Delete</a>
							
								@endif	
								@endcan	
								
								</div>
							</div>
						</td>
					</tr>
					@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->
	
</div>
</div>





	@section('script')
	   <!-- Required datatable js -->
	   <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	   <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
	    <!-- Datatable init js -->
        <script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>    
	@stop
@endsection

