@extends('backend.layouts.app')



@section('content')

    {{ html()->form('POST', route('admin.design.update',['id'=>$design->id]))->class('form-horizontal')->acceptsFiles()->open() }}
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
                                ->placeholder('title')
                                ->attribute('maxlength', 20)
                                ->required()
                                ->value($design->title)
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Sub Title')->class('col-md-2 form-control-label')->for('sub_title') }}

                        <div class="col-md-10">
                            {{ html()->text('sub_title')
                                ->class('form-control')
                                ->placeholder('sub title')
                                ->attribute('maxlength', 20)
                                ->required()
                                ->value($design->sub_title)
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Category')->class('col-md-2 form-control-label')->for('category') }}

                        <div class="col-md-10">
                            {{ html()->select('category')
                                ->class('form-control')
                                ->placeholder('sub title')
                                ->attribute('maxlength', 20)
                                ->required()
                                ->value($design->category)
                                ->options($categories) }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        <div class="col-md-10">
                            {{html()->img(asset('design_image/'.$design->image),$design->image )->attributes
                                     (['width'=>'50px',
                                     'height'=>'50px'])}}
                        </div><!--col-->

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
                    {{--                    {{ form_cancel(route('admin.design.index'), __('buttons.general.cancel')) }}--}}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->form()->close() }}

@endsection
