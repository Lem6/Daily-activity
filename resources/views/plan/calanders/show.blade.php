@extends('plan.layouts.admin')
@section('title','daily plan')

@section('content')

  <div class="page-content">
                    <div class="container-fluid">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Calander' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('calanders.calander.destroy', $calander->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('calanders.calander.index') }}" class="btn btn-primary" title="Show All Calander">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('calanders.calander.create') }}" class="btn btn-success" title="Create New Calander">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('calanders.calander.edit', $calander->id ) }}" class="btn btn-primary" title="Edit Calander">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Calander" onclick="return confirm(&quot;Click Ok to delete Calander.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Activity Name</dt>
            <dd>{{ $calander->activity_name }}</dd>
            <dt>Date</dt>
            <dd>{{ $calander->date }}</dd>
            <dt>Team</dt>
            <dd>{{ optional($calander->team)->id }}</dd>
            <dt>Directorate</dt>
            <dd>{{ optional($calander->directorate)->id }}</dd>
            <dt>Center</dt>
            <dd>{{ optional($calander->center)->id }}</dd>
            <dt>All</dt>
            <dd>{{ $calander->all }}</dd>

        </dl>

    </div>
</div>

@endsection
