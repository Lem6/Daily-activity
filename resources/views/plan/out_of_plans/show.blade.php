@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Out Of Plan' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('out_of_plans.out_of_plan.destroy', $outOfPlan->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('out_of_plans.out_of_plan.index') }}" class="btn btn-primary" title="Show All Out Of Plan">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('out_of_plans.out_of_plan.create') }}" class="btn btn-success" title="Create New Out Of Plan">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('out_of_plans.out_of_plan.edit', $outOfPlan->id ) }}" class="btn btn-primary" title="Edit Out Of Plan">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Out Of Plan" onclick="return confirm(&quot;Click Ok to delete Out Of Plan.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Activity</dt>
            <dd>{{ $outOfPlan->activity }}</dd>
            <dt>Date</dt>
            <dd>{{ $outOfPlan->date }}</dd>
            <dt>User</dt>
            <dd>{{ optional($outOfPlan->user)->id }}</dd>
            <dt>Team</dt>
            <dd>{{ optional($outOfPlan->team)->id }}</dd>
            <dt>Directorate</dt>
            <dd>{{ optional($outOfPlan->directorate)->id }}</dd>
            <dt>Center</dt>
            <dd>{{ optional($outOfPlan->center)->id }}</dd>
            <dt>Approved By</dt>
            <dd>{{ optional($outOfPlan->approvedBy)->id }}</dd>
            <dt>Reject Reason</dt>
            <dd>{{ $outOfPlan->reject_reason }}</dd>

        </dl>

    </div>
</div>

@endsection