@extends('layout.supreme.auth.master')

@section('content')
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--singin"
             id="m_login">
            <div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
                <div class="m-stack m-stack--hor m-stack--desktop">
                    <div class="m-stack__item m-stack__item--fluid">
                        <div class="m-login__wrapper">
                            <div class="m-login__logo">
                                <a href="#">
                                    <img src="{{ asset('assets/app/media/img//logos/logo-2.png') }}">
                                </a>
                            </div>
                            <div class="m-login__signin">
                                <div class="m-login__head">
                                    <h3 class="m-login__title">
                                        Sign In To Admin
                                    </h3>
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
                                {!! Form::open(array('route' => 'login', 'class' => 'm-login__form m-form', 'method'=>'POST')) !!}
                                {{ csrf_field() }}
                                    <div class="form-group m-form__group">
                                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control m-input', 'required')) !!}
                                    </div>
                                    <div class="form-group m-form__group">
                                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control m-input m-login__form-input--last', 'required')) !!}
                                    </div>
                                    <div class="row m-login__form-sub">
                                        <div class="col m--align-left">
                                            <label class="m-checkbox m-checkbox--focus">
                                                <input type="checkbox" name="remember">
                                                Remember me
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="m-login__form-action">
                                        <button id="m_login_signin_submit"
                                                class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                                            Sign In
                                        </button>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content"
                 style="background-image: url({{ asset('assets/app/media/img//bg/bg-4.jpg') }})">
                <div class="m-grid__item m-grid__item--middle">
                    <h3 class="m-login__welcome">
                        Supreme
                    </h3>
                    <p class="m-login__msg">
                        Designed for Your bussiness
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pageScripts')
    <script src="{{ asset('assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
@endsection