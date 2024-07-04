@extends('main')

@section('content')

<div class="row show-grid" style="text-align: center;">
	<!-- Customer ROW -->
	<div class="col-md-12">
            <div class="card b-radius--10">
                <div class="card-body">
                    <div class="text-right mb-3">
                        <a href="javascript:void(0)" class="btn btn-primary addBtn"><i class="fa fa-fw fa-plus"></i>@lang('Add New Customer')</a>
                        
                        <a href="javascript:void(0)" class="btn btn-success importBtn">@lang('Import User Data')</a>

                        <a href="{{ route('customer.customer.export') }}" class="btn btn-success exportBtn">@lang('Export User Data')</a>
                    </div>
                </div>
            </div>
    </div>
	<div class="col-md-12">
            <div class="card b-radius--10 ">
                <div class="card-body">
                    <div class="text-right mb-3">
                        <form action="{{ route('customer.customer.search', $scope ?? str_replace('customer.customer.', '', request()->route()->getName())) }}" method="GET" class="form-inline float-sm-right bg--white">
                            <div class="input-group has_append">
                                <input type="text" name="search" class="form-control" placeholder="@lang('search')" value="{{ $search ?? '' }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br><br>
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Company Name')</th>
                                    <th>@lang('Shop Name')</th>
                                    <th>@lang('Proprietor Name')</th>
                                    <th>@lang('Email')</th>
                                    <!-- <th>@lang('Date Of Birth')</th> -->
                                    <th>@lang('Mobile')</th>
                                    <th>@lang('Address')</th>
                                    <th>@lang('District')</th>
                                    <th>@lang('Client Handling By')</th>
                                    <th>@lang('Follow Up Date')</th>
                                    <th>@lang('Sale Closed Date')</th>
                                    <th>@lang('Sale Closed By')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                    <th>@lang('TME Name')</th>
				                    @if(auth()->user()->role==1)
                                    <th>@lang('Asign TME')</th>
                                    
				                    @endif	
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($customer as $item)
                                <tr>
                                    <td data-label="@lang('Company Name')">
                                        {{ __($item->company_name) }}
                                    </td>
                                    <td data-label="@lang('Shop Name')">
                                        {{ __($item->shop_name) }}
                                    </td>
                                    <td data-label="@lang('Proprietor Name')">
                                        {{ __($item->full_name) }}
                                    </td>
                                    <td data-label="@lang('Email')">
                                        {{ __($item->email) }}
                                    </td>
                                    <!-- <td data-label="@lang('Date Of Birth')">
                                        {{ __($item->date_of_birth) }}
                                    </td> -->
                                    <td data-label="@lang('Mobile')">
                                        {{ __($item->mobile) }}
                                    </td>
                                    <td data-label="@lang('Address')">
                                        {{ __($item->address) }}
                                    </td>
                                    <td data-label="@lang('District')">
                                        @if ($item->customerDistrict)
                                            {{ __($item->customerDistrict->district_name) }}
                                        @endif
                                    </td>
                                    <td data-label="@lang('Client Handling By')">
                                        {{ __($item->updateBy->full_name) }}
                                    </td>
                                    <td data-label="@lang('Follow Up Date')">
                                        {{ __($item->follow_up_date) }}
                                    </td>
                                    <td data-label="@lang('Sale Closed Date')">
                                        {{ __($item->sale_close_date) }}
                                    </td>
                                    <td data-label="@lang('Sale Closed By')">
                                        {{ __($item->closedByUser->full_name) }}
                                    </td>
                                    <td data-label="@lang('Status')">
                                        @if($item->status == 1)
                                        <span class="text--small badge font-weight-normal badge--success">@lang('Active')</span>
                                        @else
                                        <span class="text--small badge font-weight-normal badge--warning">@lang('Disabled')</span>
                                        @endif
                                    </td>
                                    <td data-label="@lang('Action')">
                                        <button type="button" class="btn btn-warning editBtn"
                                                data-toggle="modal" data-target="#editModal"
                                                data-customer = "{{ $item }}"
                                                data-original-title="@lang('Update')">
                                            <i class="fa fa-pen"></i>
                                        </button>

                                        @if ($item->status != 1)
                                            <button type="button"
                                            class="btn btn-success activeBtn"
                                            data-toggle="modal" data-target="#activeModal"
                                            data-id="{{ $item->id }}"
                                            data-type_name="{{ $item->name }}"
                                            data-original-title="@lang('Active')">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                        @else
                                            <button type="button" class="btn btn-danger disableBtn"
                                                data-toggle="modal" data-target="#disableModal"
                                                data-id="{{ $item->id }}"
                                                data-type_name="{{ $item->name }}"
                                                data-original-title="@lang('Disable')">
                                                
                                                <i class="fa fa-eye-slash"></i>
                                            </button>
                                        @endif
                                        <a href="{{ route('customer.customer.detail', '') }}/{{ $item->id }}" class="btn btn-primary">
                                            <i class="fas fa-fw fa-list-alt"></i>
                                        </a>
                                    </td>
                                    <td data-label="@lang('TME Name')">
                                        {{ __($item->asignTME->full_name) }}
                                    </td>
                                    
				                    @if(auth()->user()->role==1)
                                    <td data-label="@lang('Asign TME')">
                                        
                                        <button type="button" class="btn btn-warning tmeBtn"
                                                data-toggle="modal" data-target="#tmeModal"
                                                data-customer = "{{ $item }}"
                                                data-original-title="@lang('Update')">
                                                <i class="fa fa-user"></i> Asign TME
                                        </button>
                                    </td>
				                    @endif	
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
                    {{ paginateLinks($customer) }}
                </div>
            </div>
	</div>

</div>
    <!-- /.Customer ROW -->{{-- Add METHOD MODAL --}}
    <div id="addModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> @lang('Add Customer')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="customer-validation" name="customer-validation" action="{{ route('customer.customer.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Company Name')</label>
                            <input type="text" class="form-control" placeholder="@lang('Enter Company Name')" name="company_name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Shop Name')</label>
                            <input type="text" class="form-control" placeholder="@lang('Enter Shop Name')" name="shop_name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Proprietor Name')</label>
                            <input type="text" class="form-control" placeholder="@lang('Enter Proprietor Name')" name="full_name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Email')</label>
                            <input type="email" class="form-control" placeholder="@lang('Enter Customer Email')" name="email" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Date Of Birth')</label>
                            <input type="text" class="form-control" placeholder="@lang('Enter Customer Date Of Birth')" id="date_of_birth"  name="date_of_birth" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Mobile')</label>
                            <input type="text" class="form-control" placeholder="@lang('Enter Customer Mobile')" name="mobile" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Alternate Number')</label>
                            <input type="text" class="form-control" placeholder="@lang('Enter Alternate Number')" name="alternate_number" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Gender')</label>
                            <label class="radio-inline"><input type="radio" name="gender" value="Male"> Male</label>
                            <label class="radio-inline"> <input type="radio"  name="gender" value="Female"> Female</label>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Address')</label>
                            <textarea class="form-control" placeholder="@lang('Enter Customer Address')" name="address" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Pin Code')</label>
                            <input type="text" class="form-control" placeholder="@lang('Enter Pin Code')" name="pin_code" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('District')</label>
                            <select name="district" id="district" class="form-control">
                                <option value="">@lang('Select an option')</option>
                                @foreach ($district as $itemd)
                                    <option value="{{ $itemd->id }}">{{ __($itemd->district_name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Taluka')</label>
                            <select name="taluka" id="taluka" class="form-control">
                                <option value="">@lang('Select an option')</option>
                                <!-- @foreach ($taluka as $itemt)
                                    <option value="{{ $itemt->id }}">{{ __($itemt->taluka_name) }}</option>
                                @endforeach -->
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('State')</label>
                            <select name="state" class="form-control">
                                <option value="">@lang('Select an option')</option>
                                @foreach ($state as $items)
                                    <option value="{{ $items->id }}">{{ __($items->state_name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Update METHOD MODAL --}}
    <div id="editModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> @lang('Update Customer')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="customer-validation-update" name="customer-validation-update" action="" method="POST">
                    @csrf
                    <div class="modal-body"> 
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Company Name')</label>
                            <input type="text" class="form-control" placeholder="@lang('Enter Company Name')" name="company_name" required>
                        </div>                           
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Shop Name')</label>
                            <input type="text" class="form-control" placeholder="@lang('Enter Shop Name')" name="shop_name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Proprietor Name')</label>
                            <input type="text" class="form-control" placeholder="@lang('Enter Proprietor Name')" name="full_name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Email')</label>
                            <input type="email" class="form-control" placeholder="@lang('Enter Customer Email')" name="email" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Date Of Birth')</label>
                            <input type="text" class="form-control" placeholder="@lang('Enter Customer Date Of Birth')" id="date_of_birthe"  name="date_of_birth" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Mobile')</label>
                            <input type="text" class="form-control" placeholder="@lang('Enter Customer Mobile')" name="mobile" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Alternate Number')</label>
                            <input type="text" class="form-control" placeholder="@lang('Enter Alternate Number')" name="alternate_number" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Gender')</label>
                            <label class="radio-inline"><input type="radio" name="gender" value="Male"> Male</label>
                            <label class="radio-inline"> <input type="radio"  name="gender" value="Female"> Female</label>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Address')</label>
                            <textarea class="form-control" placeholder="@lang('Enter Customer Address')" name="address" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Pin Code')</label>
                            <input type="text" class="form-control" placeholder="@lang('Enter Pin Code')" name="pin_code" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('District')</label>
                            <select name="district" id="districte" class="form-control">
                                <option value="">@lang('Select an option')</option>
                                @foreach ($district as $itemd)
                                    <option value="{{ $itemd->id }}">{{ __($itemd->district_name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Taluka')</label>
                            <select name="taluka" id="talukae" class="form-control">
                                <option value="">@lang('Select an option')</option>
                                @foreach ($taluka as $itemt)
                                    <option value="{{ $itemt->id }}">{{ __($itemt->taluka_name) }}</option>
                                @endforeach
                            </select>
                        </div>
                       
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('State')</label>
                            <select name="state" class="form-control">
                                <option value="">@lang('Select an option')</option>
                                @foreach ($state as $items)
                                    <option value="{{ $items->id }}">{{ __($items->state_name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Update')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- active METHOD MODAL --}}
    <div id="activeModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> @lang('Active Customer')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('customer.customer.active.disable')}}" method="POST">
                    @csrf
                    <input type="text" name="id" hidden="true">
                    <div class="modal-body">
                        <p>@lang('Are you sure to active') <span class="font-weight-bold type_name"></span> @lang('customer')?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Active')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- disable METHOD MODAL --}}
    <div id="disableModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> @lang('Disable Customer')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('customer.customer.active.disable')}}" method="POST">
                    @csrf
                    <input type="text" name="id" hidden="true">
                    <div class="modal-body">
                        <p>@lang('Are you sure to disable') <span class="font-weight-bold type_name"></span> @lang('customer')?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--danger">@lang('Disable')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Import METHOD MODAL --}}
    <div id="importModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> @lang('Import User Data')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="import-validation" name="import-validation" action="{{ route('customer.customer.import') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="file" name="file" class="form-control" required accept=".xlsx, .xls, .csv"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn-primary">@lang('Import')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Update METHOD MODAL --}}
    <div id="tmeModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> @lang('Asign TME')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="customer-validation-updateTme" name="customer-validation-updateTme" action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('Assign TME')</label>
                            <select name="assign_to" class="form-control">
                                <option value="">@lang('Select an option')</option>
                                @foreach ($employee as $itememp)
                                    <option value="{{ $itememp->id }}">{{ __($itememp->full_name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Update TME')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection('content')

@push('script')

    <script>
        (function ($) {
            "use strict";
            var talukasUrlTemplate = '{{ route("districts.talukas", ":id") }}';
           
            $(document).on('change', "select[name='district']", function() {
                var districtId = $(this).val();
                alert(districtId);
                var talukasUrl = talukasUrlTemplate.replace(':id', districtId);

                // Assuming you have multiple inputs with name='taluka'
                $("select[name='taluka']").empty().append(new Option('Select Taluka', ''));

                if (districtId) {
                    // Fetch talukas based on district name
                    $.ajax({
                        url: talukasUrl,
                        method: 'GET',
                        success: function(data) {
                            data.forEach(function(taluka) {
                                $("select[name='taluka']").append(new Option(taluka.taluka_name, taluka.id));
                            });
                        }
                    });
                }
            });
            
            $('.disableBtn').on('click', function () {
                var modal = $('#disableModal');
                modal.find('input[name=id]').val($(this).data('id'));
                modal.find('.type_name').text($(this).data('type_name'));
                modal.modal('show');
            });

            $('.activeBtn').on('click', function () {
                var modal = $('#activeModal');
                modal.find('input[name=id]').val($(this).data('id'));
                modal.find('.type_name').text($(this).data('type_name'));
                modal.modal('show');
            });

            $('.addBtn').on('click', function () {
                $('.showSeat').empty();
                var modal = $('#addModal');
                modal.modal('show');
            });
            
            $('.importBtn').on('click', function () {
                $('.showSeat').empty();
                var modal = $('#importModal');
                modal.modal('show');
            });
            $(".customer-validation").validate({
                    rules: {                        
                        mobile: {
                            required: true,
                            mobileno: true,
                        },
                        alternate_number: {
                            required: true,
                            mobileno: true,
                        },
                        pin_code: {
                            required: true,
                            zipcode: true,
                        }
                    }
            });
            $(".customer-validation-update").validate({
                    rules: {                        
                        mobile: {
                            required: true,
                            mobileno: true,
                        },
                        alternate_number: {
                            required: true,
                            mobileno: true,
                        },
                        pin_code: {
                            required: true,
                            zipcode: true,
                        }
                    }
            });
            jQuery.validator.addMethod("zipcode", function(value, element) {
                return this.optional(element) || /^\d{6}(?:-\d{4})?$/.test(value);
            }, "Please provide a valid zipcode.");
            jQuery.validator.addMethod("mobileno", function(value, element) {
                return this.optional(element) || /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[6789]\d{9}$/.test(value);
            }, "Enter Valid mobile number ex.9811111111.");

            $(document).on('click', '.editBtn', function () {
                var modal   = $('#editModal');
                var data    = $(this).data('customer');
                console.log(data);
                var link    = `{{ route('customer.customer.update', '') }}/${data.id}`;
                modal.find('input[name=shop_name]').val(data.shop_name);
                modal.find('input[name=full_name]').val(data.full_name);
                modal.find('input[name=email]').val(data.email);
                modal.find('input[name=date_of_birth]').val(data.date_of_birth);
                modal.find('input[name=mobile]').val(data.mobile);
                modal.find('input[name=alternate_number]').val(data.alternate_number);
                modal.find('textarea[name=address]').val(data.address);
                modal.find('input[name=pin_code]').val(data.pin_code);
                $('input:radio[name="gender"]').filter('[value="'+data.gender+'"]').attr('checked', true);
                modal.find('select[name=taluka]').val(data.taluka);
                modal.find('select[name=district]').val(data.district);
                modal.find('select[name=state]').val(data.state);

                var talukasUrl = talukasUrlTemplate.replace(':id', data.district);
                var talukae = data.taluka;
                $('#talukae').empty().append(new Option('Select Taluka', ''));

                if (data.district) {
                    $.ajax({
                        url: talukasUrl,
                        method: 'GET',
                        success: function(data) {
                            data.forEach(function(taluka) {
                                // $('#talukae').append(new Option(taluka.taluka_name, taluka.id));
                                var option = new Option(taluka.taluka_name, taluka.id);
                                if (talukae && taluka.id == talukae) {
                                    $(option).attr('selected', true);
                                }
                                $('#talukae').append(option);
                            });
                        }
                    });
                }
                modal.find('form').attr('action', link);

                modal.modal('show');
            });

            $(document).on('click', '.tmeBtn', function () {
                var modal   = $('#tmeModal');
                var data    = $(this).data('customer');
                console.log(data);
                var link    = `{{ route('customer.customer.updateTme', '') }}/${data.id}`;
                modal.find('select[name=assign_to]').val(data.assign_to);

                modal.find('form').attr('action', link);

                modal.modal('show');
            });

            $("#date_of_birth").datepicker({
                maxDate: 0,
                dateFormat: "mm/dd/yy",
                showButtonPanel: true,
                changeMonth: true,
                changeYear: true,
                yearRange: "-80:+00"
            });
            $("#date_of_birthe").datepicker({
                maxDate: 0,
                dateFormat: "mm/dd/yy",
                showButtonPanel: true,
                changeMonth: true,
                changeYear: true,
                yearRange: "-80:+00" 

            });

        })(jQuery);

    </script>

@endpush
