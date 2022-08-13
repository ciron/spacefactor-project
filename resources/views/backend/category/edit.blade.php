@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.edit'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')

    {{ html()->modelForm($category, 'PATCH', route('admin.category.update', $category->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.access.users.management')
                        <small class="text-muted">@lang('labels.backend.access.users.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label('category name')->class('col-md-2 form-control-label')->for('top-title') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder('category')
                                ->attribute('maxlength', 50)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <div class="col-md-10">
                            {{html()->img(asset('cat_image/'.$category->cat_image),$category->cat_image )->attributes
                                     (['width'=>'50px',
                                     'height'=>'50px'])}}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('category Image')->class('col-md-2 form-control-label')->for('image') }}

                        <div class="col-md-10">
                            {{ html()->file('cat_image')
                                ->class('form-control')
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--form-group-->


        </div><!--col-->
    </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                {{ form_cancel(route('admin.category.index'), __('buttons.general.cancel')) }}
            </div><!--col-->

            <div class="col text-right">
                {{ form_submit(__('buttons.general.crud.update')) }}
            </div><!--row-->
        </div><!--row-->
    </div><!--card-footer-->
    </div><!--card-->
    {{ html()->closeModelForm() }}
@endsection
