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
                         <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <a   href="{{ route('additional__times.additional__time.index') }}" class="btn btn-primary"  >View</a>
                    </div>
                </div> 
                
      @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            
            <form method="POST" action="{{ route('additional__times.additional__time.update', $user->id) }}" id="edit_additional__time_form" name="edit_additional__time_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('plan.additional__times.form', [
                                        'user' => $user,
                                      ])

               

            
                          <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Save Change">
                    </div>
                </div>       
               </form>
            <br>

       
 
    </div>
    </div>
    </div>
    </div>

      
@endsection

 