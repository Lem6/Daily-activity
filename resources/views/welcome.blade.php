@extends('layouts.main')
@section('title', 'Index')
@section('content')
@section('style')

 @stop

<div class="row">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-primary bg-soft">
                
                        <div class="text-primary p-3">
                            <h5 class="text-primary">Welcome Back !</h5>
                            <a> <i class="bx bxs-quote-alt-right text-primary h1 align-middle me-3"></i><span class="text-primary"> <b>መልካም የተግባር ቀን </b> &nbsp;<i class="bx bxs-quote-alt-right text-primary h1 align-middle me-3"></i></a>
                             <ul class="verti-timeline list-unstyled">
                  

                </ul> 
                 
                 
                        </div>
                    
            </div>
            
        </div>
        
    </div>
    <div class="col-xl-8">
        <div class="row">
        @if($colors)
            @foreach ($colors as $color)
            
           
            <div class="col-md-{{12/count($colors) }}">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">{{ $color->name }}</p>
                                <p class="mb-0">{{ $color->plan_start_time }} - {{ $color->plan_end_time }}</p>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-danger">
                                    <span class="avatar-title" style="background-color:{{ $color->color }}">
                                        <i class="bx bx-time font-size-28"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
           @endif
           
            </div>

            </div>
        </div>



<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <blockquote class="blockquote blockquote-custom bg-white px-3 pt-4">
                  <div>
                    <i class="fa fa-quote-left text-black"></i>
                  </div>
                  <p class="mb-0 mt-2 font-italic">
                    @if($random)
                    {{$random->qoute}}
                    @endif
                  </p>
                  {{-- <footer class="blockquote-footer pt-4 mt-4 border-top">
                    Someone famous in
                    <cite title="Source Title">Source Title</cite>
                  </footer> --}}
                </blockquote>
              </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection