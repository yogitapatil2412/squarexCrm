@extends('main')

@section('content')

<div class="row show-grid" style="text-align: center;">
	<!-- district ROW -->
	<div class="col-md-12">
            <div class="card b-radius--10">
                <div class="card-body">
                    <div class="text-right mb-3">
                        <a href="javascript:void(0)" class="btn btn-primary addBtn"><i class="fa fa-fw fa-plus"></i>@lang('Add New State')</a>
                        
                        
                    </div>
                </div>
            </div>
    </div>
	<div class="col-md-12">
            <div class="card b-radius--10 ">
                <div class="card-body">
                   
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('District Name')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
				                   
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($district as $item)
                                <tr>
                                    <td data-label="@lang('District Name')">
                                        {{ __($item->district_name) }}
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
                                                data-district = "{{ $item }}"
                                                data-original-title="@lang('Update')">
                                            <i class="fa fa-pen"></i>
                                        </button>                                      
                                        <button type="button" class="btn btn-danger deleteBtn"
                                                data-toggle="modal" data-target="#deleteModal"
                                                data-id="{{ $item->id }}"
                                                data-district_name="{{ $item->district_name }}"
                                                data-original-title="@lang('Delete')">
                                                
                                                <i class="fa fa-trash"></i>
                                        </button>
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
                    {{ paginateLinks($district) }}
                </div>
            </div>
	</div>

</div>
<!-- /.district ROW -->{{-- Add METHOD MODAL --}}
<div id="addModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> @lang('Add District')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('district.district.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('District Name')</label>
                            <input type="text" class="form-control" placeholder="@lang('Enter District Name')" name="district_name" required>
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
                    <h5 class="modal-title"> @lang('Update District')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form   action="" method="POST">
                    @csrf
                    <div class="modal-body">                            
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"> @lang('District Name')</label>
                            <input type="text" class="form-control" placeholder="@lang('Enter District Name')" name="district_name" required>
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
    {{-- disable METHOD MODAL --}}
    <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> @lang('Delete District')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('district.district.delete')}}" method="POST">
                    @csrf
                    <input type="text" name="id" hidden="true">
                    <div class="modal-body">
                        <p>@lang('Are you sure to delete') <span class="font-weight-bold district_name"></span> @lang('district')?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--danger">@lang('Delete')</button>
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
            $('.deleteBtn').on('click', function () {
                var modal = $('#deleteModal');
                modal.find('input[name=id]').val($(this).data('id'));
                modal.find('.district_name').text($(this).data('district_name'));
                modal.modal('show');
            });
            $('.addBtn').on('click', function () {
                $('.showSeat').empty();
                var modal = $('#addModal');
                modal.modal('show');
            });
            $(document).on('click', '.editBtn', function () {
                var modal   = $('#editModal');
                var data    = $(this).data('district');
                console.log(data);
                var link    = `{{ route('district.district.update', '') }}/${data.id}`;
                modal.find('input[name=district_name]').val(data.district_name);
               

                modal.find('form').attr('action', link);

                modal.modal('show');
            });

        })(jQuery);

    </script>

@endpush
