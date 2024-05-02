@extends('layouts.main')
@section('title', 'role managment')
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

				<h4 class="card-title">Role Managment
					@can('role-create')
                                <a style="float:right" class="btn btn-success" href="{{ route('roles.create') }}"> Create</a>
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
							<th>Name</th>
							
						<th>Permissions</th>
							<th >Actions</th>
								
							
							   
						</tr>
					</thead>


					<tbody>
				
						@foreach ($roles as $key => $role)
						<tr>
						
							<td>{{ ++$i }}</td>
							<td>{{ $role->name }}</td>
						   
						<td>
						@if(!empty($role->permissions))
									@foreach($role->permissions as $p)
									{{ $p->name }},
									@endforeach
								@endif
								</td>
										
						<td>
							<div class="dropdown">
								<a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="mdi mdi-dots-horizontal font-size-18"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									@if($role->id!='1')
									@can('role-edit')
									<a href="{{ route('roles.edit',$role->id) }}" class="dropdown-item" href="#">Edit</a>
								   @endcan
								   @can('role-delete')
                                                   
								   <a href="{{ route('roles.destroy', $role->id ) }}" onclick="return confirm('Are you sure You Want to Delete?')" style="color:red" class="dropdown-item" href="#">Delete</a>
									
									@endcan
									@endif
								
							
								
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

	    <!-- Responsive examples -->
        <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
	    <!-- Datatable init js -->
        <script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>    
	@stop
@endsection



