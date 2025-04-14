@extends('admin.layouts.master')

@section('master')
    <div class="col-12">
        <div class="custom--card">
            <div class="card-header">
                <h3 class="title">@lang('Site Preferences')</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST" class="row g-lg-4 g-3">
                    @csrf
                    <div class="col-lg-4 col-sm-6">
                        <label class="form--label required">@lang('Site Name')</label>
                        <input type="text" class="form--control" name="site_name" value="{{ $setting->site_name }}" placeholder="@lang('Phinix Admin')" required>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <label class="form--label required">@lang('Platform Currency')</label>
                        <input type="text" class="form--control" name="site_cur" value="{{ $setting->site_cur }}" placeholder="@lang('USD')" required>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <label class="form--label required">@lang('Currency Symbol')</label>
                        <input type="text" class="form--control" name="cur_sym" value="{{ $setting->cur_sym }}" placeholder="$" required>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <label class="form--label required">@lang('Time Region')</label>
                        <select class="form--control form-select select-2" name="time_region" required>
                            @foreach($timeRegions as $timeRegion)
                                <option value="'{{ @$timeRegion }}'">{{ __($timeRegion) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <label class="form--label required">@lang('Items Showing Per Page')</label>
                        <select class="form--control form-select" name="per_page_item" required>
                            <option value="20">20 @lang('items per page')</option>
                            <option value="50">50 @lang('items per page')</option>
                            <option value="100">100 @lang('items per page')</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <label class="form--label required">@lang('Date Format')</label>
                        <select class="form--control form-select" name="date_format" required>
                            <option value="m-d-Y">MDY (Month-Day-Year)</option>
                            <option value="d-m-Y">DMY (Day-Month-Year)</option>
                            <option value="Y-m-d">YMD (Year-Month-Day)</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <label class="form--label required">@lang('Fractional Digit Show')</label>
                        <input type="text" class="form--control" name="fraction_digit" value="{{ $setting->fraction_digit }}" placeholder="2" required>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <label class="form--label required">@lang('Primary Color')</label>
                        <div class="input--group colorpicker">
                            <input type="color" class="form--control" value="#{{ $setting->primary_color }}">
                            <input type="text" class="form--control" name="primary_color" value="#{{ $setting->primary_color }}" placeholder="@lang('Hex Code e.g. #00ffff')" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <label class="form--label required">@lang('Secondary Color')</label>
                        <div class="input--group colorpicker">
                            <input type="color" class="form--control" value="#{{ $setting->secondary_color }}">
                            <input type="text" class="form--control" name="secondary_color" value="#{{ $setting->secondary_color }}" placeholder="@lang('Hex Code e.g. #ffff00')" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn--base px-4">@lang('Submit')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="custom--card">
            <div class="card-header">
                <h3 class="title">@lang('System Preferences')</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.basic.setting.system') }}" method="POST" class="row g-4">
                    @csrf
                    <div class="col-12">
                        <div class="row g-lg-4 g-3 row-cols-xxl-5 row-cols-xl-4 row-cols-md-3 row-cols-sm-2 row-cols-1 preference-card-list justify-content-center">
                            <div class="col">
                                <div class="preference-card bg-img" data-background-image="{{ asset('assets/admin/images/card-bg-1.png') }}">
                                    <div class="preference-card__thumb">
                                        <i class="ti ti-login-2"></i>
                                    </div>
                                    <div class="preference-card__content">
                                        <span class="preference-card__title">@lang('User Signup')</span>
                                        <span class="preference-card__desc">@lang('Toggle this switch to enable or disable user registration on your website. When deactivated, the option to create new accounts will be disabled.')</span>
                                    </div>
                                    <div class="form-check form--switch">
                                        <input type="checkbox" class="form-check-input" name="signup" @checked($setting->signup)>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="preference-card bg-img" data-background-image="{{ asset('assets/admin/images/card-bg-1.png') }}">
                                    <div class="preference-card__thumb">
                                        <i class="ti ti-lock"></i>
                                    </div>
                                    <div class="preference-card__content">
                                        <span class="preference-card__title">@lang('Enforce Strong Password')</span>
                                        <span class="preference-card__desc">@lang('Activate this toggle to enhance account security by enforcing the use of strong passwords, thereby ensuring robust user authentication.')</span>
                                    </div>
                                    <div class="form-check form--switch">
                                        <input type="checkbox" class="form-check-input" name="strong_pass" @checked($setting->strong_pass)>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="preference-card bg-img" data-background-image="{{ asset('assets/admin/images/card-bg-1.png') }}">
                                    <div class="preference-card__thumb">
                                        <i class="ti ti-clipboard-text"></i>
                                    </div>
                                    <div class="preference-card__content">
                                        <span class="preference-card__title">@lang('Accept Policy')</span>
                                        <span class="preference-card__desc">@lang('Activate this toggle to control user access, requiring users to agree to your terms before accessing the website.')</span>
                                    </div>
                                    <div class="form-check form--switch">
                                        <input type="checkbox" class="form-check-input" name="agree_policy" @checked($setting->agree_policy)>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="preference-card bg-img" data-background-image="{{ asset('assets/admin/images/card-bg-1.png') }}">
                                    <div class="preference-card__thumb">
                                        <i class="ti ti-user-scan"></i>
                                    </div>
                                    <div class="preference-card__content">
                                        <span class="preference-card__title">@lang('Know Your Customer Check')</span>
                                        <span class="preference-card__desc">@lang('Enable this toggle to implement user identity verification, enhancing trust and compliance with regulatory standards on your website.')</span>
                                    </div>
                                    <div class="form-check form--switch">
                                        <input type="checkbox" class="form-check-input" name="kc" @checked($setting->kc)>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="preference-card bg-img" data-background-image="{{ asset('assets/admin/images/card-bg-1.png') }}">
                                    <div class="preference-card__thumb">
                                        <i class="ti ti-mail-check"></i>
                                    </div>
                                    <div class="preference-card__content">
                                        <span class="preference-card__title">@lang('Email Confirmation')</span>
                                        <span class="preference-card__desc">@lang('Activate this toggle to ensure user authenticity by requiring users to verify their email addresses during the registration process.')</span>
                                    </div>
                                    <div class="form-check form--switch">
                                        <input type="checkbox" class="form-check-input" name="ec" @checked($setting->ec)>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="preference-card bg-img" data-background-image="{{ asset('assets/admin/images/card-bg-1.png') }}">
                                    <div class="preference-card__thumb">
                                        <i class="ti ti-mail-bolt"></i>
                                    </div>
                                    <div class="preference-card__content">
                                        <span class="preference-card__title">@lang('Email Alert')</span>
                                        <span class="preference-card__desc">@lang('Activate this toggle to notify users via email about important updates, events, and announcements on your website.')</span>
                                    </div>
                                    <div class="form-check form--switch">
                                        <input type="checkbox" class="form-check-input" name="ea" @checked($setting->ea)>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="preference-card bg-img" data-background-image="{{ asset('assets/admin/images/card-bg-1.png') }}">
                                    <div class="preference-card__thumb">
                                        <i class="ti ti-message-check"></i>
                                    </div>
                                    <div class="preference-card__content">
                                        <span class="preference-card__title">@lang('Mobile Confirmation')</span>
                                        <span class="preference-card__desc">@lang('Activate this toggle to enhance user verification, mandating users to confirm their identity via their mobile devices during registration.')</span>
                                    </div>
                                    <div class="form-check form--switch">
                                        <input type="checkbox" class="form-check-input" name="sc" @checked($setting->sc)>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="preference-card bg-img" data-background-image="{{ asset('assets/admin/images/card-bg-1.png') }}">
                                    <div class="preference-card__thumb">
                                        <i class="ti ti-message-bolt"></i>
                                    </div>
                                    <div class="preference-card__content">
                                        <span class="preference-card__title">@lang('SMS Alert')</span>
                                        <span class="preference-card__desc">@lang('Activate this toggle to notify users via SMS about important updates, events, and announcements on your website.')</span>
                                    </div>
                                    <div class="form-check form--switch">
                                        <input type="checkbox" class="form-check-input" name="sa" @checked($setting->sa)>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="preference-card bg-img" data-background-image="{{ asset('assets/admin/images/card-bg-1.png') }}">
                                    <div class="preference-card__thumb">
                                        <i class="ti ti-certificate"></i>
                                    </div>
                                    <div class="preference-card__content">
                                        <span class="preference-card__title">@lang('Enforce SSL')</span>
                                        <span class="preference-card__desc">@lang('Activate this toggle feature to ensure data security by requiring all connections to your website to be encrypted.')</span>
                                    </div>
                                    <div class="form-check form--switch">
                                        <input type="checkbox" class="form-check-input" name="enforce_ssl" @checked($setting->enforce_ssl)>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="preference-card bg-img" data-background-image="{{ asset('assets/admin/images/card-bg-1.png') }}">
                                    <div class="preference-card__thumb">
                                        <i class="ti ti-language"></i>
                                    </div>
                                    <div class="preference-card__content">
                                        <span class="preference-card__title">@lang('Language Preference')</span>
                                        <span class="preference-card__desc">@lang('Activate this toggle to control user experience, allowing visitors to select their preferred language for seamless interaction.')</span>
                                    </div>
                                    <div class="form-check form--switch">
                                        <input type="checkbox" class="form-check-input" name="language" @checked($setting->language)>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn--base px-4">@lang('Submit')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="custom--card">
            <div class="card-header">
                <h3 class="title">@lang('Logo and Favicon Preferences')</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.basic.setting.logo.favicon') }}" method="POST" enctype="multipart/form-data" class="row g-lg-4 g-3">
                    @csrf
                    <div class="col-12">
                        <div class="alert alert--base">
                            @lang('If the visual identifiers remain unchanged, it\'s advisable to perform a cache clearance within your browser. Typically, clearing the cache resolves this issue. However, if the previous logo or favicon persists, it could be attributed to caching mechanisms at the server or network level. Additional cache clearance may be necessary in such cases').
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <label for="logoLight" class="form--label">@lang('Logo Light')</label>
                        <div class="upload__img">
                            <label for="logoLight" class="upload__img__btn"><i class="ti ti-camera"></i></label>
                            <input type="file" id="logoLight" class="image-upload" name="logo_light" accept=".png">
                            <label for="logoLight" class="upload__img-preview image-preview">
                                <img src="{{ getImage(getFilePath('logoFavicon') . '/logo_light.png') }}" alt="logo">
                            </label>
                            <button type="button" class="btn btn--sm btn--icon btn--danger custom-file-input-clear d-none">
                                <i class="ti ti-circle-x"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <label for="logoDark" class="form--label">@lang('Logo Dark')</label>
                        <div class="upload__img">
                            <label for="logoDark" class="upload__img__btn"><i class="ti ti-camera"></i></label>
                            <input type="file" id="logoDark" class="image-upload" name="logo_dark" accept=".png">
                            <label for="logoDark" class="upload__img-preview image-preview">
                                <img src="{{ getImage(getFilePath('logoFavicon') . '/logo_dark.png') }}" alt="logo">
                            </label>
                            <button type="button" class="btn btn--sm btn--icon btn--danger custom-file-input-clear d-none">
                                <i class="ti ti-circle-x"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <label for="favicon" class="form--label">@lang('Favicon')</label>
                        <div class="upload__img">
                            <label for="favicon" class="upload__img__btn"><i class="ti ti-camera"></i></label>
                            <input type="file" id="favicon" class="image-upload" name="favicon" accept=".png">
                            <label for="favicon" class="upload__img-preview image-preview">
                                <img src="{{ getImage(getFilePath('logoFavicon') . '/favicon.png', getFileSize('favicon')) }}" alt="logo">
                            </label>
                            <button type="button" class="btn btn--sm btn--icon btn--danger custom-file-input-clear d-none">
                                <i class="ti ti-circle-x"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn--base px-4">@lang('Submit')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('page-script')
    <script>
        (function ($) {
            "use strict";

            $('.colorpicker').find('input').on('keyup', function () {
                let colorCode = $(this).val();
                $(this).siblings('input').val(colorCode);
            });

            $('.colorpicker').find('input[type=color]').on('input', function () {
                let colorCode = $(this).val();
                $(this).siblings('input').val(colorCode);
            });

            $('[name=per_page_item]').val('{{ bs('per_page_item') }}');
            $('[name=date_format]').val('{{ bs('date_format') }}');
            $('[name=time_region]').val("'{{ config('app.timezone') }}'").select2();
        })(jQuery);
    </script>
@endpush
