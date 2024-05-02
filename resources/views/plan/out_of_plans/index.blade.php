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
                <h4 class="mt-5 mb-5">Out Of Plans</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('out_of_plans.out_of_plan.create') }}" class="btn btn-success" title="Create New Out Of Plan">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($outOfPlans) == 0)
            <div class="panel-body text-center">
                <h4>No Out Of Plans Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Activity</th>
                            <th>Date</th>
                            <th>User</th>
                            <th>Team</th>
                            <th>Directorate</th>
                            <th>Center</th>
                            <th>Approved By</th>
                            <th>Reject Reason</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($outOfPlans as $outOfPlan)
                        <tr>
                            <td>{{ $outOfPlan->activity }}</td>
                            <td>{{ $outOfPlan->date }}</td>
                            <td>{{ optional($outOfPlan->user)->id }}</td>
                            <td>{{ optional($outOfPlan->team)->id }}</td>
                            <td>{{ optional($outOfPlan->directorate)->id }}</td>
                            <td>{{ optional($outOfPlan->center)->id }}</td>
                            <td>{{ optional($outOfPlan->approvedBy)->id }}</td>
                            <td>{{ $outOfPlan->reject_reason }}</td>

                            <td>

                                <form method="POST" action="{!! route('out_of_plans.out_of_plan.destroy', $outOfPlan->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('out_of_plans.out_of_plan.show', $outOfPlan->id ) }}" class="btn btn-info" title="Show Out Of Plan">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('out_of_plans.out_of_plan.edit', $outOfPlan->id ) }}" class="btn btn-primary" title="Edit Out Of Plan">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Out Of Plan" onclick="return confirm(&quot;Click Ok to delete Out Of Plan.&quot;)">
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
            {!! $outOfPlans->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection