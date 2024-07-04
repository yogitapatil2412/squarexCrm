@extends('main')

@section('content')

<div class="row show-grid" style="text-align: center;">
	<!-- Customer ROW -->
	<div class="col-md-12">
            <div class="card b-radius--10">
                <div class="card-body">
                    <div class="text-right mb-3">
                        <a href="{{ route('customer.customer') }}" class="btn btn-primary"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
                        <a href="{{ route('customer.customer.history', '') }}/{{ $customer->id }}" class="btn btn-warning"> Customer History</a>
                       
                    </div>                    
                </div>
            </div>
    </div>
	<div class="col-md-12">
            <div class="card b-radius--10 ">
                <div class="card-body">
                    <form class="customer-validation" name="customer-validation" action="{{ route('customer.customer.customer_history_save', '') }}/{{ $customer->id }}" method="post">
                        @csrf
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
                                        <label class="form-control-label font-weight-bold"> @lang('Alternate Number')</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="alternate_number" value="{{ $customer->alternate_number }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label class="form-control-label font-weight-bold"> @lang('Address')</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="mobile" value="{{ $customer->address }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label class="form-control-label font-weight-bold"> @lang('Pin Code')</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="pin_code" value="{{ $customer->pin_code }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label class="form-control-label font-weight-bold"> @lang('District')</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="district" value="@if($customer->district){{ $customer->customerDistrict->district_name }}@endif" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label class="form-control-label font-weight-bold"> @lang('Taluka')</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="taluka" value="@if($customer->taluka) {{ $customer->customerTaluka->taluka_name }} @endif" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label class="form-control-label font-weight-bold"> @lang('State')</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="state" value="@if($customer->state){{ ($customer->customerState->state_name) }}@endif" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label class="form-control-label font-weight-bold"> @lang('Call Date')</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="call_date" value="{{ $customer->call_date }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label class="form-control-label font-weight-bold"> @lang('Call Time')</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="call_time" value="{{ $customer->call_time }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label class="form-control-label font-weight-bold"> @lang('Follow up Date')</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="follow_up_date" id="follow_up_date" value="{{ $customer->follow_up_date }}" placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label class="form-control-label font-weight-bold"> @lang('Call Status')</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" id="call_status" name="call_status">
                                            <option value="">-Select Call Status-</option>
                                            <option value="Follow Up" @if($customer->call_status=="Follow Up") selected @endif>Follow Up</option>
                                            <option value="Appointment" @if($customer->call_status=="Appointment") selected @endif>Appointment</option>
                                            <option value="Call Back" @if($customer->call_status=="Call Back") selected @endif>Call Back</option>
                                            <option value="Ringing" @if($customer->call_status=="Ringing") selected @endif>Ringing</option>
                                            <option value="Call Waiting" @if($customer->call_status=="Call Waiting") selected @endif>Call Waiting</option>
                                            <option value="Service Call" @if($customer->call_status=="Service Call") selected @endif>Service Call </option>
                                            <option value="Wrong Number" @if($customer->call_status=="Wrong Number") selected @endif>Wrong Number</option>
                                            <option value="Not Contactable" @if($customer->call_status=="Not Contactable") selected @endif>Not Contactable</option>
                                            <option value="Switched Off" @if($customer->call_status=="Switched Off") selected @endif>Switched Off</option>
                                            <option value="Business Closed" @if($customer->call_status=="Business Closed") selected @endif>Business Closed</option>
                                            <option value="Not Interested" @if($customer->call_status=="Not Interested") selected @endif>Not Interested</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label class="form-control-label font-weight-bold"> @lang('Package Pitched')</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" id="package_pitched"   name="package_pitched" >
                                            <option value="">-Select Package-</option>
                                            <option value="SMS Marketing">SMS Marketing</option>
                                            <option value="WhatsApp Marketing">WhatsApp Marketing</option>
                                            <option value="Software Purchase">Software Purchase</option>
                                            <option value="E-Sewa">E-Sewa</option>
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label class="form-control-label font-weight-bold"> @lang('Sale Close Date')</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="sale_close_date" id="sale_close_date" value="{{ $customer->sale_close_date }}" placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label class="form-control-label font-weight-bold"> @lang('Amount Pitched')</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="amount_pitched" id="amount_pitched" value="@if($customerHistory){{ $customerHistory->amount_pitched }}@endif" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label class="form-control-label font-weight-bold"> @lang('Dealer Ship Company Name')</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="selectpicker" multiple data-live-search="true" id="dealer_ship_company_name"  name="dealer_ship_company_name[]">
                                            
                                            @php
                                                $dealer_ship_company_name = "";
                                                if($customerHistory){
                                                    $dealer_ship_company_name = $customerHistory->dealer_ship_company_name;
                                                }
                                            @endphp
                                            @foreach ($dealer_ship_company as $itemd)
                                                <option value="{{ $itemd->id }}" @if ($itemd->id  == $dealer_ship_company_name)
                                                selected
                                                @endif >{{$itemd->company_name }}</option>
                                             @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label class="form-control-label font-weight-bold"> @lang('Demo Date')</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="demo_date" id="demo_date" placeholder="dd-mm-yyyy" value="@if($customerHistory){{ $customerHistory->demo_date }}@endif" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label class="form-control-label font-weight-bold"> @lang('Follow Up Status')</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" id="follow_up_status" name="follow_up_status">
                                            <option value="">-Select Appointment Status-</option>
                                            @php
                                                $follow_up_status = "";
                                                if($customerHistory){
                                                    $follow_up_status = $customerHistory->follow_up_status;
                                                }
                                            @endphp
                                            <option value="Mad Follow Up" @if ($follow_up_status == "Mad Follow Up") selected @endif>Met follow Up</option>
                                            <option value="Sale closed" @if ($follow_up_status == "Sale closed") selected @endif>Sale Closed</option>
                                            <option value="Not Instrested" @if ($follow_up_status == "Not Instrested") selected @endif>Not Instrested</option>
                                            <option value="Inprogress" @if ($follow_up_status == "Inprogress") selected @endif>Inprogress</option>
                                            <option value="Use by other companys" @if ($follow_up_status == "Use by other companys") selected @endif>Use by other companys</option>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label class="form-control-label font-weight-bold"> @lang('Software Demo')</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" id="software_demo" name="software_demo">
                                            <option value="">-Select Software Demo-</option>
                                            @php
                                                $software_demo = "";
                                                if($customerHistory){
                                                    $software_demo = $customerHistory->software_demo;
                                                }
                                            @endphp
                                            <option value="Pending" @if ($software_demo == "Pending") selected @endif >Pending</option>
                                            <option value="Dome"  @if ($software_demo == "Dome") selected @endif>Done</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label class="form-control-label font-weight-bold"> @lang('Detailed Remark')</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="detailed_remark" id="detailed_remark" placeholder="Detailed Remark" value="@if($customerHistory){{ $customerHistory->detailed_remark }}@endif" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label class="form-control-label font-weight-bold"> @lang('Client Handling By')</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" id="client_handling_by" name="client_handling_by">
                                            <option value="">@lang('-Select Client Handling By-')</option>
                                            @php
                                                $client_handling_by = "";
                                                if($customerHistory){
                                                    $client_handling_by = $customerHistory->client_handling_by;
                                                }
                                            @endphp
                                            @foreach ($employee as $itememp)
                                                <option value="{{ $itememp->id }}" @if ($itememp->id  == $client_handling_by)
                                                selected
                                                @endif>{{ __($itememp->full_name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <button type="submit" class="btn btn-primary">@lang('Update Call History')</button>
                                </div>
                            </div>
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
            $('select').selectpicker();
            $("#follow_up_date").datepicker({
                minDate: 0,
                dateFormat: "mm/dd/yy",
            });
            $("#sale_close_date").datepicker({
                minDate: 0,
                dateFormat: "mm/dd/yy",
            });
            $("#demo_date").datepicker({
                minDate: 0,
                dateFormat: "mm/dd/yy",
            });
            $(".customer-validation").validate({
                    rules: {
                        //amount_pitched: "required",
                        amount_pitched: 
                        {
                            //required: true,
                            digits: true
                            //range:[1,100000]
                        }
                    }
            });
        })(jQuery);

    </script>

@endpush
