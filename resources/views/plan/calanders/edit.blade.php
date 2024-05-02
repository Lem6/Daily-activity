@extends('plan.layouts.admin')
@section('title','daily plan')

@section('content')

  <div class="page-content">
                    <div class="container-fluid">
<div class="card">
                                    <div class="card-body">
    <div class="row">

         <div class="col-xl-4">
                <div class="btn-group btn-group-example mb-3" role="group">
                                                            <button type="button" onclick="location.href ='{{ route('calanders.calander.index') }}' "  class="btn btn-outline-primary w-sm">View </button>
                                                            <button type="button"  onclick="location.href ='{{ route('calanders.calander.create') }}' " class="btn btn-outline-primary w-sm">Create </button>

                                                        </div>

     </div>
        </div>


            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'Calander' }}</h4>
            </div>




        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('calanders.calander.update') }}" id="edit_calander_form" name="edit_calander_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('plan.calanders.form', [
                                        'calander' => $calander,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>
    </div>
    </div>
    </div>
<br>
<br>
<br>
@endsection
