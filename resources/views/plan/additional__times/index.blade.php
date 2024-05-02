@extends('plan.layouts.admin')
@section('title','daily plan')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif



     <div class="page-content">
                    <div class="container-fluid">
                        <div class="card">
                                    <div class="card-body">
                                    <form method="POST" action="{{ route('additional__times.additional__time.store') }}" accept-charset="UTF-8" id="create_additional__time_form" name="create_additional__time_form" class="form-horizontal" onSubmit="return checkCriteria(this)">
            {{ csrf_field() }}


      @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif


            @include ('plan.additional__times.form', [
                                        'user' => null,
                                      ])



              <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Create">
                    </div>
                </div>
                         <div class="form-group">
                   <p>Experts List</p>
                </div>

            <br>
<div id="errmsg1">
</div>
        @if(count($users) == 0)
            <div class="panel-body text-center">
                <h4>No Calanders Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>

                            <th><input id="checkAll" type="checkbox">&nbsp;&nbsp; Name </th>
                            <th>Planning Time </th>
                              <th>Reason</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>

                            <td>
                            @if($user->permission)
                            <i style="color:green" class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;&nbsp;
                            @else
                            <input type="checkbox" class="user" value="{{ $user->id }}" name="user[]">&nbsp;&nbsp;
                            @endif


                            {{ $user->name }}
                            </td>
                            {{-- <td>{{ optional($user->permission->color)->name}}</td> --}}
                            @if($user->permission)
                            <td>{{ $user->permission->color->name}}</td>
                             @else
                             <td></td>
                             @endif
                              <td>{{ optional($user->permission)->reason}}</td>



                                 <td>

                                                       <div class="btn-group btn-group-example mb-3" role="group">
                                                            @if($user->permission)
                             <a  type="button" href="{{ route('additional__times.additional__time.edit', $user->id ) }}"  class="btn btn-outline-primary w-sm" >Edit </a>
                            @else
   <button  type="button" disabled  class="btn btn-outline-primary w-sm" >Edit </button>
                            @endif


                                                        </div>

                                                    </td>



                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>



        @endif
 </form>
    </div>
    </div>
    </div>
    </div>


@endsection

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
        $(document).ready(function(){


        $("#checkAll").click(function () {

        $('.user').not(this).prop('checked', this.checked);
        });






        });


        function checkCriteria(form) {

 var slected="false";
 if($(".user:checked").length > 0)
     {
             return true;


    }
else{
$("#errmsg1").html('<h5 ><b style="color:red">Select at least one user !</b></h5 >').show().fadeOut(6666);
return false;
}


}
        </script>
