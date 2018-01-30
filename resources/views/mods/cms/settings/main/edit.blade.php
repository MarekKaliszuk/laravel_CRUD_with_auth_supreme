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
                                    Edycja konfiguracji - {{ $setting->name }}
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
                    {!! Form::model($setting, ['method' => 'PATCH','class' => 'm-form', 'route' => ['main.update', $setting->id]]) !!}
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-1 col-form-label">
                                    Nazwa:
                                </label>
                                <div class="col-lg-11">
                                    {!! Form::text('name', null, array('placeholder' => 'Podaj nazwę pola','class' => 'form-control m-input', 'required')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-1 col-form-label">
                                    Wartość:
                                </label>
                                <div class="col-lg-11">
                                    {!! Form::textarea('value', null, array('placeholder' => 'Podaj wartość','class' => 'form-control m-input', 'required')) !!}
                                </div>
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
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('pageScripts')

@endsection