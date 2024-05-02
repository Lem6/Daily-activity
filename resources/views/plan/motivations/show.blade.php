@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Motivation' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('motivations.motivation.destroy', $motivation->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('motivations.motivation.index') }}" class="btn btn-primary" title="Show All Motivation">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('motivations.motivation.create') }}" class="btn btn-success" title="Create New Motivation">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('motivations.motivation.edit', $motivation->id ) }}" class="btn btn-primary" title="Edit Motivation">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Motivation" onclick="return confirm(&quot;Click Ok to delete Motivation.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Qoute</dt>
            <dd>{{ $motivation->qoute }}</dd>

        </dl>

    </div>
</div>

@endsection