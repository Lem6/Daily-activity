@extends('plan.layouts.admin')
@section('title','daily plan')
@section('style')
  <!-- dragula css -->
  <link href="{{ asset('admin/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('admin/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
@stop
@section('content')

 <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           

                  <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">

                                       <div class="row mb-4">
                                                        <h4 class="card-title mb-4">Date Interval </h4>
                                                <div class="col-lg-12">
                                                    <div class="input-daterange input-group" id="project-date-inputgroup" data-provide="datepicker" data-date-format="dd M, yyyy"  data-date-container='#project-date-inputgroup' data-date-autoclose="true">
                                                        <input type="text" class="form-control" placeholder="Start Date"name="from_date" id="from_date"  />
                                                        <input type="text" class="form-control" placeholder="End Date" name="to_date" id="to_date" />
                                                    </div>
                                                </div>
                                            </div>
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Timeline</h4>

                             

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                       
                        <!-- end row -->

                        <div class="row">
                                         <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Activity List</h4>

                                    <div class="page-title-right">
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                          <div class="row">
                            <div class="col-lg-8">
                                <div class="">
                                    <div class="table-responsive">
                                        <table class="table project-list-table table-nowrap align-middle table-borderless">
                                            <thead>
                                                <tr>
                                                    
                                                     <th scope="col">Expert</th>
                                                    <th scope="col">Daily Task</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                  
                                                    <th scope="col">View</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr  data-bs-toggle="collapse" href="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
                                                 
                                                     <td>Amare Yohhanes</td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">New admin Design</a></h5>
                                                        <p class="text-muted mb-0">It will be as simple as Occidental <span class="bg-warning badge me-2">planed</span></p>
                                                    </td>
                                                    <td>15 Oct, 19</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                   
                                                    <td>
                                                        <button  type="button" class="btn btn-outline-warning waves-effect waves-light">Detail</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                               
 <tr class="collapse hidden" id="collapseExample" >
                                                 
                                                   <td colspan="6"  ><div id="demo3" >Demo3 sdhahdv havoha vehfo heofh ehfoheofh oehfo heohf oehfoheof oeh</div></td>
                                                         
                                                        
                                                    
</tr>



                                                <tr>
                                                  
                                                     <td>Amare Yohhanes</td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">New admin Design</a></h5>
                                                        <p class="text-muted mb-0">It will be as simple as Occidental <span class="bg-warning badge me-2">out of plan</span></p>
                                                    </td>
                                                    <td>15 Oct, 19</td>
                                                    <td><span class="badge bg-primary">In progress</span></td>
                                                   
                                                    <td>
                                                       <button type="button" class="btn btn-outline-warning waves-effect waves-light">Detail</button>
                                                    </td>
                                                </tr>
                                                    <tr>
                                               
                                                     <td>Amare Yohhanes</td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">New admin Design</a></h5>
                                                        <p class="text-muted mb-0">It will be as simple as Occidental <span class="bg-warning badge me-2">out of plan</span></p>
                                                    </td>
                                                    <td>15 Oct, 19</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                   
                                                    <td>
                                                           <button type="button" class="btn btn-outline-warning waves-effect waves-light">Detail</button>
                                                    </td>
                                                </tr>
                                                    <tr>
                                                   
                                                     <td>Amare Yohhanes</td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">New admin Design</a></h5>
                                                        <p class="text-muted mb-0">It will be as simple as Occidental <span class="bg-warning badge me-2">planed</span></p>
                                                    </td>
                                                    <td>15 Oct, 19</td>
                                                    <td><span class="badge bg-danger">no progress</span></td>
                                                   
                                                    <td>
                                                     <button type="button" class="btn btn-outline-warning waves-effect waves-light">Detail</button>
                                                    </td>
                                                </tr>
                                            </tbody>

                                         
                                        </table>
                                          {{ csrf_field() }}
                                             
                                                <div class="mt-4 mt-lg-0">
                                                    
                
            
                                            
                                                    <nav aria-label="...">
                                                        <ul class="pagination">
                                                            <li class="page-item disabled">
                                                                <span class="page-link"><i class="mdi mdi-chevron-left"></i></span>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                            <li class="page-item active">
                                                                <span class="page-link">
                                                                    2
                                                                    <span class="sr-only">(current)</span>
                                                                </span>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                            <li class="page-item">
                                                                <a class="page-link" href="#"><i class="mdi mdi-chevron-right"></i></a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                            
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Expert List</h4>

                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 50px;"><img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt=""></td>
                                                        <td><h5 class="font-size-14 m-0"><a href="#" class="text-dark">Daniel Canales</a></h5></td>
                                                        <td>
                                                            <div>
                                                                <a href="#" class="badge bg-primary bg-soft text-primary font-size-11">Frontend</a>
                                                                <a href="#" class="badge bg-primary bg-soft text-primary font-size-11">UI</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xs" alt=""></td>
                                                        <td><h5 class="font-size-14 m-0"><a href="#" class="text-dark">Jennifer Walker</a></h5></td>
                                                        <td>
                                                            <div>
                                                                <a href="#" class="badge bg-primary bg-soft text-primary font-size-11">UI / UX</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-primary text-white font-size-16">
                                                                    C
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-size-14 m-0"><a href="#" class="text-dark">Carl Mackay</a></h5></td>
                                                        <td>
                                                            <div>
                                                                <a href="#" class="badge bg-primary bg-soft text-primary font-size-11">Backend</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt=""></td>
                                                        <td><h5 class="font-size-14 m-0"><a href="#" class="text-dark">Janice Cole</a></h5></td>
                                                        <td>
                                                            <div>
                                                                <a href="#" class="badge bg-primary bg-soft text-primary font-size-11">Frontend</a>
                                                                <a href="#" class="badge bg-primary bg-soft text-primary font-size-11">UI</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-primary text-white font-size-16">
                                                                    T
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-size-14 m-0"><a href="#" class="text-dark">Tony Brafford</a></h5></td>
                                                        <td>
                                                            <div>
                                                                <a href="#" class="badge bg-primary bg-soft text-primary font-size-11">Backend</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="text-center my-3">
                                    <a href="javascript:void(0);" class="text-success"><i class="bx bx-loader bx-spin font-size-18 align-middle mr-2"></i> Load more </a>
                                </div>
                            </div> <!-- end col-->
                        </div>

                    </div> <!-- container-fluid -->


@endsection

@section('script')
  <!-- dragula css -->
  <script src="{{ asset('admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
 
@stop