@extends('main')

@section('content')

<div class="row show-grid" style="text-align: center;">
	<!-- Customer ROW -->
	<div class="col-md-3">
        <div class="card b-radius--10 ">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 btn btn-primary">
                            <div class="">
                                <h4 class="text--white">{{__($admin->full_name)}}</h4>
                            </div>
                        <div class="align-items-center">
                            <div class="avatar avatar--lg">
							    <img class="img-profile rounded-circle" src="{{ asset($admin->image) }}"  alt="@lang('Image')" style="width: 100px !important; height: 100px !important;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                @lang('Name')
                                <span class="font-weight-bold">{{__($admin->full_name)}}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                @lang('Email')
                                <span  class="font-weight-bold">{{$admin->email}}</span>
                            </li>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
	</div>
    <div class="col-md-9">
        <div class="card b-radius--10 ">
            <div class="card-body">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview" style="background-image: url({{ asset($admin->image) }})">
                                                <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" class="profilePicUpload" name="image" id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                            <label for="profilePicUpload1" class="bg--success">@lang('Upload Image')</label>
                                            <small class="mt-2 text-facebook">@lang('Supported files'): <b>@lang('jpeg'), @lang('jpg').</b>  </small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-control-label font-weight-bold">@lang('Name')</label>
                                <input class="form-control" type="text" name="full_name" value="{{__($admin->full_name)}}" >
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
            function proPicURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var preview = $(input).parents('.thumb').find('.profilePicPreview');
                        $(preview).css('background-image', 'url(' + e.target.result + ')');
                        $(preview).addClass('has-image');
                        $(preview).hide();
                        $(preview).fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".profilePicUpload").on('change', function () {
                proPicURL(this);
            });
            $(".remove-image").on('click', function () {
                $(this).parents(".profilePicPreview").css('background-image', 'none');
                $(this).parents(".profilePicPreview").removeClass('has-image');
                $(this).parents(".thumb").find('input[type=file]').val('');
            });
        })(jQuery);

    </script>

@endpush
