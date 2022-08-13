@extends('backend.layouts.app')



@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Designs
                        <small class="text-muted"> View All</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar">
                        <a href="{{ route('admin.design.create') }}" class="btn btn-success ml-1" data-toggle="tooltip"
                           title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
                    </div><!--btn-toolbar-->

                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>title</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Active</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($designs as $design)
                                <tr>
                                    <td>{{html()->img(asset('design_image/'.$design->image),$design->image )->attributes
                                    (['width'=>'50px',
                                    'height'=>'50px'])}}</td>
                                    <td>{{ $design->title }}</td>
                                    <td>{{ $design->cat_name }}</td>
                                    <td>{{ $design->type }}</td>
                                    <td>{{ $design->active }}</td>
                                    <td class="btn-td">

                                        <div class="btn-group btn-group-sm" role="group" aria-label="Option">
                                            {{--<button type="button" class="btn btn-secondary"--}}
                                                    {{--onClick="location.href='{{ route('admin.design.edit', ['id'=>$design->id]) }}'">--}}
                                                {{--Update--}}
                                            {{--</button>--}}
                                            <button type="button" class="btn btn-secondary"
                                                    onClick="location.href='{{ route('admin.design.delete', ['id'=>$design->design_id]) }}'">
                                                Delete
                                            </button>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col-7">
                    <?php
                    if ($designs->total() > 0 ) {?>
                    <div class="float-left">
                        {!! $designs->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $designs->total()) }}
                    </div>
                    <?php }?>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $designs->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
