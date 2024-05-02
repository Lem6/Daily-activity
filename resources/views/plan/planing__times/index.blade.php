@extends('layouts.app')

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

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Planing  Times</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('planing__times.planing__time.create') }}" class="btn btn-success" title="Create New Planing  Time">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($planingTimes) == 0)
            <div class="panel-body text-center">
                <h4>No Planing  Times Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Plan Start Time</th>
                            <th>Plan End Time</th>
                            <th>Progress Start Time</th>
                            <th>Progress End Time</th>
                            <th>Additional Time</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($planingTimes as $planingTime)
                        <tr>
                            <td>{{ $planingTime->plan_start_time }}</td>
                            <td>{{ $planingTime->plan_end_time }}</td>
                            <td>{{ $planingTime->progress_start_time }}</td>
                            <td>{{ $planingTime->progress_end_time }}</td>
                            <td>{{ $planingTime->additional_time }}</td>

                            <td>

                                <form method="POST" action="{!! route('planing__times.planing__time.destroy', $planingTime->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('planing__times.planing__time.show', $planingTime->id ) }}" class="btn btn-info" title="Show Planing  Time">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('planing__times.planing__time.edit', $planingTime->id ) }}" class="btn btn-primary" title="Edit Planing  Time">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Planing  Time" onclick="return confirm(&quot;Click Ok to delete Planing  Time.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $planingTimes->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection