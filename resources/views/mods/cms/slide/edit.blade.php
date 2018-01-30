@extends('layout.supreme.master')

@section('content')
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                                <h3 class="m-portlet__head-text">
                                    Edycja slajdu
                                </h3>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::model($slide, ['method' => 'PATCH','class' => 'm-form', 'files' => true, 'route' => ['Slide.update', $slide->id]]) !!}
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group">
                                <label class="col-lg-1 col-form-label">
                                    Wgraj plik
                                </label>
                                <label class="custom-file">
                                    {!! Form::file('slide_image',null) !!}
                                </label>
                            </div>
                        </div>
                    </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-11">
                                        <button type="submit" class="btn btn-success">
                                            Zapisz
                                        </button>
                                        <button type="reset" class="btn btn-secondary">
                                            Wyczyść
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {!! Form::hidden('slider_id', $slide->slider_id) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('pageScripts')

@endsection