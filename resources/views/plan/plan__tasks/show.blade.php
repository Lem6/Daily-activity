@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Plan  Task' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('plan__tasks.plan__task.destroy', $planTask->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('plan__tasks.plan__task.index') }}" class="btn btn-primary" title="Show All Plan  Task">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('plan__tasks.plan__task.create') }}" class="btn btn-success" title="Create New Plan  Task">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('plan__tasks.plan__task.edit', $planTask->id ) }}" class="btn btn-primary" title="Edit Plan  Task">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Plan  Task" onclick="return confirm(&quot;Click Ok to delete Plan  Task.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Task Name</dt>
            <dd>{{ $planTask->task_name }}</dd>
            <dt>Progress</dt>
            <dd>{{ $planTask->progress }}</dd>
            <dt>Percent</dt>
            <dd>{{ $planTask->percent }}</dd>
            <dt>Description</dt>
            <dd>{{ $planTask->description }}</dd>
            <dt>Challenge</dt>
            <dd>{{ $planTask->challenge }}</dd>
            <dt>Approved By</dt>
            <dd>{{ optional($planTask->approvedBy)->id }}</dd>
            <dt>Reject Reason</dt>
            <dd>{{ $planTask->reject_reason }}</dd>
            <dt>User</dt>
            <dd>{{ optional($planTask->user)->id }}</dd>
            <dt>Team</dt>
            <dd>{{ optional($planTask->team)->id }}</dd>
            <dt>Directorate</dt>
            <dd>{{ optional($planTask->directorate)->id }}</dd>
            <dt>Center</dt>
            <dd>{{ optional($planTask->center)->id }}</dd>
            <dt>Plan Task</dt>
            <dd>{{ optional($planTask->planTask)->id }}</dd>
            <dt>Date</dt>
            <dd>{{ $planTask->date }}</dd>
            <dt>Progress Time</dt>
            <dd>{{ $planTask->progress_time }}</dd>

        </dl>

    </div>
</div>

@endsection