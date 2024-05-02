@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Coin' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('coins.coin.destroy', $coin->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('coins.coin.index') }}" class="btn btn-primary" title="Show All Coin">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('coins.coin.create') }}" class="btn btn-success" title="Create New Coin">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('coins.coin.edit', $coin->id ) }}" class="btn btn-primary" title="Edit Coin">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Coin" onclick="return confirm(&quot;Click Ok to delete Coin.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>User</dt>
            <dd>{{ optional($coin->user)->id }}</dd>
            <dt>Coin</dt>
            <dd>{{ $coin->coin }}</dd>

        </dl>

    </div>
</div>

@endsection