@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.category.store'))->class('form-horizontal')->acceptsFiles()->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                     Category Management
                        <small class="text-muted">Create Category</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label('Category Name')->class('col-md-2 form-control-label')->for('top-title') }}

                        <div class="col-md-10">
                            {{ html()->text('cat_name')
                                ->class('form-control')
                                ->placeholder('Category')
                                ->attribute('maxlength', 50)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Category type')->class('col-md-2 form-control-label')->for('top-title') }}

                        <div class="col-md-10">
                            {{ html()->select('type')
                                ->class('form-control')
                                ->placeholder('Select Type')
                                ->attribute('maxlength', 50)
                                ->required()
                                ->options(['MOODBOARD'=>'MOODBOARD','PROJECT'=>'PROJECT','TRENDS'=>'TRENDS','DESIGN_SERVICE'=>'DESIGN_SERVICE']) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Category Image')->class('col-md-2 form-control-label')->for('image') }}

                        <div class="col-md-10">
                            {{ html()->file('cat_image')
                                ->class('form-control')
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer clearfix">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.category.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->form()->close() }}
@endsection
