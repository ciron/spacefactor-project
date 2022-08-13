@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Categories
                        <small class="text-muted">Active Categories</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar">
                        <a href="{{ route('admin.category.create') }}" class="btn btn-success ml-1" data-toggle="tooltip"
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
                                <th>Category</th>
                                <th>Type</th>
                                <th>Active</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categorys as $category)
                                <tr>
                                    <td>{{html()->img(asset('cat_image/'.$category->cat_image),$category->cat_image )->attributes
                                    (['width'=>'50px',
                                    'height'=>'50px'])}}</td>
                                    <td>{{ $category->cat_name }}</td>
                                    <td>{{ $category->type }}</td>
                                    <td>{{ $category->active }}</td>
                                    <td class="btn-td">

                                        <div class="btn-group btn-group-sm" role="group" aria-label="Option">
                                            {{--<button type="button" class="btn btn-secondary"--}}
                                            {{--onClick="location.href='{{ route('admin.design.edit', ['id'=>$design->id]) }}'">--}}
                                            {{--Update--}}
                                            {{--</button>--}}
                                            <button type="button" class="btn btn-secondary"
                                                    onClick="location.href='{{ route('admin.category.delete', ['id'=>$category->id]) }}'">
                                                Delete
                                            </button>
                                        </div>

                                    </td>
                                    {{--<td class="btn-td"><a href="{{ route('admin.category.edit', $category) }}" data-toggle="tooltip"--}}
                                                          {{--data-placement="top"--}}
                                                          {{--title="@lang('buttons.general.crud.edit')" class="btn btn-primary">--}}
                                            {{--<i class="fas fa-edit"></i>--}}
                                        {{--</a></td>--}}
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
                    if ($categorys->total() > 0 ) {?>
                    <div class="float-left">
                        {!! $categorys->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $categorys->total()) }}
                    </div>
                    <?php }?>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $categorys->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
