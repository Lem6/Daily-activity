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
    <div class="row">

         <div class="col-xl-4">
  <div class="btn-group btn-group-sm pull-right" role="group">
             @can('calander_create')
                 <a type="button" href="{{ route('calanders.calander.create') }}" class="btn btn-primary waves-effect waves-light" title="Create New Color">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                <i class="bx bx-smile font-size-16 align-middle me-2"></i> Create

                  </a>
                  @endcan


     </div>
            </div>
            <div class="pull-left">
                <h4 class="mt-5 mb-5">Calanders</h4>
            </div>



        </div>

        @if(count($tasks) == 0)
            <div class="panel-body text-center">
                <h4>No Calanders Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Activity Name</th>
                            <th>Date</th>
                           

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->task_name }}</td>
                            <td>{{ $task->created_at }}</td>
                            


                                 <td>
                                                            <form method="POST" action="{!! route('calanders.calander.destroy') !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}
                                <input type="hidden" name="user" value="{{ $task->users }}">
                                                       <div class="btn-group btn-group-example mb-3" role="group">
                                                            {{-- <button type="button" onclick="location.href ='{{ route('colors.color.show', $color->id ) }}' "  class="btn btn-outline-primary w-sm">Show</button> --}}

                                                            @can('calander_edit')
                                                            <button  type="button" onclick="location.href ='{{ route('calanders.calander.edit', $task->id ) }}' "  class="btn btn-outline-primary w-sm" >Edit </button>
                                                             @endcan
                                                            @can('calander_delete')
                                                            <button   type="submit" onclick="return confirm(&quot;Click Ok to delete Calander.&quot;)" class="btn btn-outline-primary w-sm" >Delete</button>
                                                            @endcan
                                                           </div>
                                                        </form>
                                                    </td>


                    
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        {{-- <div class="panel-footer">
            {!! $tasks->render() !!}
        </div> --}}

        @endif

    </div>
    </div>
    </div>
    </div>
@endsection
