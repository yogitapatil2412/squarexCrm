@extends('main')

@section('content')

<div class="row show-grid" style="text-align: center;">
	<!-- Customer ROW -->
	<div class="col-md-12">
        <div class="card b-radius--10 ">
            <div class="card-body">
                <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-control-label font-weight-bold">@lang('Name')</label>
                                <input class="form-control" type="text" name="sitename" value="{{($general_setting->sitename)}}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label font-weight-bold">@lang('Favicon')</label>
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="faviconPreview" style="background-image: url({{ asset($general_setting->favicon) }})">
                                                <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" class="faviconUpload" name="favicon" id="faviconUpload" accept=".png, .jpg, .jpeg">
                                            <label for="faviconUpload" class="bg--success">@lang('Upload Image')</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label font-weight-bold">@lang('Logo')</label>
                                <div class="logoimage-upload">
                                    <div class="logothumb">
                                        <div class="avatar-preview">
                                            <div class="logoPreview" style="background-image: url({{ asset($general_setting->logo) }})">
                                                <button type="button" class="logoremove-image"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" class="logoUpload" name="logo" id="logoUpload" accept=".png, .jpg, .jpeg">
                                            <label for="logoUpload" class="bg--success">@lang('Upload Image')</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label font-weight-bold">@lang('Login Image')</label>
                                <div class="login_imgimage-upload">
                                    <div class="login_imgthumb">
                                        <div class="avatar-preview">
                                            <div class="login_imgPreview" style="background-image: url({{ asset($general_setting->login_img) }})">
                                                <button type="button" class="login_imgremove-image"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" class="login_imgUpload" name="login_img" id="login_imgUpload" accept=".png, .jpg, .jpeg">
                                            <label for="login_imgUpload" class="bg--success">@lang('Upload Image')</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">@lang('Save Changes')</button>
                    </div>
                </form>    
            </div>
        </div>
	</div>
</div>
@endsection('content')
@push('script')

    <script>
        (function ($) {
            "use strict";
            function faviconURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var preview = $(input).parents('.thumb').find('.faviconPreview');
                        $(preview).css('background-image', 'url(' + e.target.result + ')');
                        $(preview).addClass('has-image');
                        $(preview).hide();
                        $(preview).fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".faviconUpload").on('change', function () {
                faviconURL(this);
            });
            $(".remove-image").on('click', function () {
                $(this).parents(".faviconPreview").css('background-image', 'none');
                $(this).parents(".faviconPreview").removeClass('has-image');
                $(this).parents(".thumb").find('input[type=file]').val('');
            });

            
            function logoURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var preview = $(input).parents('.logothumb').find('.logoPreview');
                        $(preview).css('background-image', 'url(' + e.target.result + ')');
                        $(preview).addClass('has-image');
                        $(preview).hide();
                        $(preview).fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".logoUpload").on('change', function () {
                logoURL(this);
            });
            $(".logoremove-image").on('click', function () {
                $(this).parents(".logoPreview").css('background-image', 'none');
                $(this).parents(".logoPreview").removeClass('has-image');
                $(this).parents(".logothumb").find('input[type=file]').val('');
            });

            function login_imgURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var preview = $(input).parents('.login_imgthumb').find('.login_imgPreview');
                        $(preview).css('background-image', 'url(' + e.target.result + ')');
                        $(preview).addClass('has-image');
                        $(preview).hide();
                        $(preview).fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".login_imgUpload").on('change', function () {
                login_imgURL(this);
            });
            $(".login_imgremove-image").on('click', function () {
                $(this).parents(".login_imgPreview").css('background-image', 'none');
                $(this).parents(".login_imgPreview").removeClass('has-image');
                $(this).parents(".login_imgthumb").find('input[type=file]').val('');
            });
        })(jQuery);

    </script>

@endpush
