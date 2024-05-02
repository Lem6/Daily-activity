@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Planing  Time' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('planing__times.planing__time.destroy', $planingTime->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('planing__times.planing__time.index') }}" class="btn btn-primary" title="Show All Planing  Time">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('planing__times.planing__time.create') }}" class="btn btn-success" title="Create New Planing  Time">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('planing__times.planing__time.edit', $planingTime->id ) }}" class="btn btn-primary" title="Edit Planing  Time">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Planing  Time" onclick="return confirm(&quot;Click Ok to delete Planing  Time.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Plan Start Time</dt>
            <dd>{{ $planingTime->plan_start_time }}</dd>
            <dt>Plan End Time</dt>
            <dd>{{ $planingTime->plan_end_time }}</dd>
            <dt>Progress Start Time</dt>
            <dd>{{ $planingTime->progress_start_time }}</dd>
            <dt>Progress End Time</dt>
            <dd>{{ $planingTime->progress_end_time }}</dd>
            <dt>Additional Time</dt>
            <dd>{{ $planingTime->additional_time }}</dd>

        </dl>

    </div>
</div>

@endsection