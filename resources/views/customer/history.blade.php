@extends('main')

@section('content')

<div class="row show-grid" style="text-align: center;">
	<!-- Customer ROW -->
	<div class="col-md-12">
            <div class="card b-radius--10">
                <div class="card-body">
                    <div class="text-right mb-3">
                        <a href="{{ route('customer.customer.detail', '') }}/{{ $customer->id }}" class="btn btn-primary"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>                       
                    </div>                    
                </div>
            </div>
    </div>
	<div class="col-md-12">
        <div class="card b-radius--10 ">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label class="form-control-label font-weight-bold"> @lang('Proprietor Name')</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="full_name" value="{{ $customer->full_name }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label class="form-control-label font-weight-bold"> @lang('Shop Name')</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="shop_name" value="{{ $customer->shop_name }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label class="form-control-label font-weight-bold"> @lang('Email')</label>
                            </div>
                            <div class="col-md-8">
                                <input type="email" class="form-control" name="email" value="{{ $customer->email }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label class="form-control-label font-weight-bold"> @lang('Mobile')</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="mobile" value="{{ $customer->mobile }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label class="form-control-label font-weight-bold"> @lang('Sale closed by')</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="sale_closed_by" value="{{ $customer->closedByUser->full_name }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<div class="col-md-12">
        <div class="card b-radius--10">
            <div class="card-body">
                @forelse($customerHistory as $item)
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="form-control-label font-weight-bold"> @lang('Call Date')</label>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-control-label">{{ $item->call_date }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="form-control-label font-weight-bold"> @lang('Call Status')</label>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-control-label">{{ $item->call_status }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="form-control-label font-weight-bold"> @lang('Call Time')</label>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-control-label">{{ $item->call_time }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="form-control-label font-weight-bold"> @lang('Follow up Date')</label>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-control-label">{{ $item->follow_up_date }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="form-control-label font-weight-bold"> @lang('Demo Date')</label>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-control-label">{{ $item->demo_date }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="form-control-label font-weight-bold"> @lang('Follow Up Status')</label>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-control-label">{{ $item->follow_up_status  }}</label>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="form-control-label font-weight-bold"> @lang('Package Pitched')</label>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-control-label">{{ $item->package_pitched }}</label>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="form-control-label font-weight-bold"> @lang('Sale Close Date')</label>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-control-label">{{ $item->sale_close_date }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="form-control-label font-weight-bold"> @lang('Amount Pitched')</label>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-control-label">{{ $item->amount_pitched }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="form-control-label font-weight-bold"> @lang('Dealer Ship Company Name')</label>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-control-label">
                                    <!-- {{ $item->dealerCompany->company_name }} -->
                                    @foreach($item->getRelatedModelsAttribute() as $itemComp)
                                        {{ $itemComp -> company_name }},
                                    @endforeach
                                
                                </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="form-control-label font-weight-bold"> @lang('Software Demo')</label>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-control-label">{{ $item->software_demo }}</label>
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="form-control-label font-weight-bold"> @lang('Detailed Remark')</label>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-control-label">{{ $item->detailed_remark }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="form-control-label font-weight-bold"> @lang('Client Handling By')</label>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-control-label">{{ $item->clientHandlingBy->full_name }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="form-control-label font-weight-bold"> @lang('Updated By')</label>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-control-label">{{ $item->updatedBy->full_name }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @empty
                <div class="row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="form-control-label font-weight-bold"> {{ __($emptyMessage) }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection('content')
@push('script')

    <script>
        (function ($) {
            "use strict";

            $("#follow_up_date").datepicker({
                minDate: 0,
                dateFormat: "mm/dd/yy",
            });
            $("#appointment_date").datepicker({
                minDate: 0,
                dateFormat: "mm/dd/yy",
            });
        })(jQuery);

    </script>

@endpush
