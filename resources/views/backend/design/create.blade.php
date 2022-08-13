@extends('backend.layouts.app')



@section('content')
    {{ html()->form('POST', route('admin.design.store'))->class('form-horizontal')->acceptsFiles()->open() }}
    <div class="card">
        <div class="card-body">


            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label('Title')->class('col-md-2 form-control-label')->for('title') }}

                        <div class="col-md-10">
                            {{ html()->text('title')
                                ->class('form-control')
                                ->placeholder('Title')
                                ->attribute('maxlength', 20)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Sub Title')->class('col-md-2 form-control-label')->for('sub_title') }}

                        <div class="col-md-10">
                            {{ html()->text('sub_title')
                                ->class('form-control')
                                ->placeholder('Sub Title')
                                ->attribute('maxlength', 20)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Description')->class('col-md-2 form-control-label')->for('description') }}

                        <div class="col-md-10">
                            {{ html()->textarea('meta[description]')
                                ->class('form-control')
                                ->placeholder('full description')

                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Type')->class('col-md-2 form-control-label')->for('type') }}

                        <div class="col-md-10">
                            {{ html()->select('type')
                                ->class('form-control')
                                ->placeholder('Select Type')
                                ->attribute('maxlength', 20)
                                ->required()
                                ->options(['MOODBOARD'=>'MOODBOARD','TRENDS'=>'TRENDS','DESIGN_SERVICE'=>'DESIGN_SERVICE']) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Category')->class('col-md-2 form-control-label')->for('category') }}

                        <div class="col-md-10">
                            {{ html()->select('category')
                                ->class('form-control')
                                ->placeholder('Select Category')
                                ->attribute('maxlength', 20)
                                ->required()
                                ->options($categories) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Main Image')->class('col-md-2 form-control-label')->for('image') }}

                        <div class="col-md-10">
                            {{ html()->file('image')
                                ->class('form-control')
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.active'))->class('col-md-2 form-control-label')->for('active') }}

                        <div class="col-md-10">
                            <label class="switch switch-label switch-pill switch-primary">
                                {{ html()->checkbox('active', true)->class('switch-input') }}
                                <span class="switch-slider" data-checked="yes" data-unchecked="no"></span>
                            </label>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer clearfix">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.design.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->form()->close() }}
@endsection
