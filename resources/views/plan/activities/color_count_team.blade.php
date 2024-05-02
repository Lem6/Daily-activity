<div class="row">
                                    @if($colors)
                                    @foreach ($colors as $color)


                                    <div class="col-md-{{12/count($colors) }}">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">{{ $color->name }}</p>
                                                        <p class="mb-0">{{ $data->where('color_id',$color->id)->count() }}</p>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-danger">
                                                            <span class="avatar-title" style="background-color:{{ $color->color }}">
                                                                <i class="bx bx-time font-size-24"></i>
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