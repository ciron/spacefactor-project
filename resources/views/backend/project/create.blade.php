@extends('backend.layouts.app')



@section('content')
    {{ html()->form('POST', route('admin.project.store'))->class('form-horizontal')->acceptsFiles()->open() }}

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
                                ->attribute('maxlength', 150)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Location')->class('col-md-2 form-control-label')->for('location') }}

                        <div class="col-md-10">
                            {{ html()->text('meta[location]')
                                ->class('form-control')
                                ->placeholder('Location')
                                ->attribute('maxlength', 150)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Area')->class('col-md-2 form-control-label')->for('site_area') }}

                        <div class="col-md-10">
                            {{ html()->text('meta[site_area]')
                                ->class('form-control')
                                ->placeholder('Area')
                                ->attribute('maxlength', 150)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Client')->class('col-md-2 form-control-label')->for('client') }}

                        <div class="col-md-10">
                            {{ html()->text('meta[client]')
                                ->class('form-control')
                                ->placeholder('client')
                                ->attribute('maxlength', 50)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->


                    <div class="form-group row">
                        {{ html()->label('Description')->class('col-md-2 form-control-label')->for('description') }}

                        <div class="col-md-10">
                            {{ html()->textarea('description]')
                                ->class('form-control')
                                ->placeholder('full description')

                                ->required()
                                ->autofocus() }}
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
                        {{ html()->label('Design Service')->class('col-md-2 form-control-label')->for('design_service') }}

                        <div class="col-md-10">
                            {{ html()->select('design_service')
                                ->class('form-control')
                                ->placeholder('Select One')
                                ->attribute('maxlength', 20)
                                ->required()
                                ->options($design_service) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Banner Image')->class('col-md-2 form-control-label')->for('banner') }}

                        <div class="col-md-10">
                            {{ html()->file('banner')
                                ->class('form-control')
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Project gallery')->class('col-md-2 form-control-label')->for('gallery') }}

                        <div class="col-md-10">
                            {{ html()->file('gallery[]')
                                ->class('form-control')
                                ->required()
                                ->multiple()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->


                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer clearfix">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.project.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->form()->close() }}
@endsection
