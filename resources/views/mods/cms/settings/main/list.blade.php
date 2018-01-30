@extends('layout.supreme.master')

@section('content')
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Konfiguracja CMS
                </h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">
                        -
                    </li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
											<span class="m-nav__link-text">
												Lista ustawień
											</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push"
                 data-dropdown-toggle="hover" aria-expanded="true">
                <a href="#"
                   class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                    <i class="la la-plus m--hide"></i>
                    <i class="la la-ellipsis-h"></i>
                </a>
                <div class="m-dropdown__wrapper">
                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                    <div class="m-dropdown__inner">
                        <div class="m-dropdown__body">
                            <div class="m-dropdown__content">
                                <ul class="m-nav">
                                    <li class="m-nav__item">
                                        <a href="{{ route('main.create') }}" class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-share"></i>
                                            <span class="m-nav__link-text">
																	Dodaj nową konfigurację
																</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="m-content">
        <div class="row">
            @if ($message = Session::get('message'))
                <div class="col-xl-12">
                    <div class="alert alert-success alert-dismissible fade show   m-alert m-alert--square m-alert--air"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        <strong>
                            {{ $message }}
                        </strong>
                    </div>
                </div>
            @endif
            <div class="col-xl-12">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Lista konfiguracji
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <!--begin::Section-->
                        <div class="m-section">
                            <div class="m-section__content">
                                <table class="table table-striped m-table">
                                    <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Nazwa
                                        </th>
                                        <th>
                                            Wartość
                                        </th>
                                        <th>
                                            Akcje
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse( $settings as $setting)
                                        <tr>
                                            <th scope="row">
                                                {{ $setting->id }}
                                            </th>
                                            <td>
                                                {{ $setting->name }}
                                            </td>
                                            <td>
                                                {{ $setting->value }}
                                            </td>
                                            <td style="width: 10%;">
                                                <a class="btn btn-primary btn-sm"
                                                   href="{{ route('main.edit',$setting->id) }}"><i
                                                            class="fa fa-pencil"></i></a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['main.destroy', $setting->id],'style'=>'display:inline']) !!}
                                                <button type="submit" style="display: inline;"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>
                                                </button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @empty
                                        Brak dostępnych konfiguracji!
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Form-->
                </div>


            </div>

        </div>

    </div>



@endsection
