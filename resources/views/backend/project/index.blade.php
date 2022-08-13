@extends('backend.layouts.app')



@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{$title}}
                        <small class="text-muted"> View All</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar">
                        <a href="{{ route('admin.project.create') }}" class="btn btn-success ml-1" data-toggle="tooltip"
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
                                <th>Title</th>
                                <th>Category</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{html()->img(asset('project_banner/'.$project->banner),$project->banner )->attributes
                                    (['width'=>'50px',
                                    'height'=>'50px'])}}</td>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->cat_name }}</td>
                                    <td class="btn-td">

                                        <div class="btn-group btn-group-sm" role="group" aria-label="Option">
                                            {{--<button type="button" class="btn btn-secondary"--}}
                                                    {{--onClick="location.href='{{ route('admin.design.edit', ['id'=>$design->id]) }}'">--}}
                                                {{--Update--}}
                                            {{--</button>--}}
                                            <button type="button" class="btn btn-secondary"
                                                    onClick="location.href='{{ route('admin.project.delete', ['id'=>$project->project_id]) }}'">
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
                    if ($projects->total() > 0 ) {?>
                    <div class="float-left">
                        {!! $projects->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $projects->total()) }}
                    </div>
                    <?php }?>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $projects->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
