@extends('layouts.main')
@section('title', 'home')
@section('breadcrumb', 'HOME  -Change Logo')
@section('content')


 <div class="col-lg-6">
            <div class="form-group">
<!-- Account settings -->
<div class="card">
    <div class="card-header">
        {{-- <h6 class="card-title">Change Logo  </h6> --}}
    </div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
    <div class="card-body">
       <form method="POST" action="{{ route('logo.update') }}" id="edit_profile_form" name="edit_profile_form" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
      <div class="form-group">
             <label for="quantity">Upload Logo: <b style="color:red">Recommended Logo Sizs is : 202*70</b></label>
             <input type="hidden" name="old_logo" value="{{ $logo->logo }}">
              <input type="file"  class="form-control" id="logo" name="logo"/>
           </div>
          <div class="form-group">
            <img  src='{{ asset("storage/$logo->logo") }}' style="width:100%;height:100%;" alt="">
          </div> 
                  
           

  
        
<br>
            <div class="text-right">
                @can('change_logo')
                <button type="submit" class="btn btn-primary">Change Logo</button>
                @endcan
            </div>
        </form>
    </div>
</div>
 </div>
</div>
<!-- /account settings -->


@endsection
