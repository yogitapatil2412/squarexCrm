@extends('main')

@section('content')

<div class="row show-grid" style="text-align: center;">
	<!-- Customer ROW -->
	<div class="col-md-12">
            <div class="card b-radius--10 ">
                <div class="card-body">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Full Name')</th>
                                    <th>@lang('Email')</th>
                                    <th>@lang('Mobile')</th>
                                    <th>@lang('Address')</th>
                                    <th>@lang('Role')</th>
                                    <th>@lang('Gender')</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($employee as $item)
                                <tr>
                                    <td data-label="@lang('Full Name')">
                                        {{ __($item->full_name) }}
                                    </td>
                                    <td data-label="@lang('Email')">
                                        {{ __($item->email) }}
                                    </td>
                                    <td data-label="@lang('Mobile')">
                                        {{ __($item->mobile) }}
                                    </td>
                                    <td data-label="@lang('Address')">
                                        {{ __($item->address) }}
                                    </td>
                                    <td data-label="@lang('Follow Up Date')">
                                        {{ ($item->userRole->role_name) }}
                                    </td>
                                    <td data-label="@lang('Address')">
                                        {{ __($item->gender) }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer py-4">
                    {{ paginateLinks($employee) }}
                </div>
            </div>
	</div>

</div>
    

   

    
@endsection('content')

@push('script')

    <script>
        (function ($) {
            "use strict";

        })(jQuery);

    </script>

@endpush
