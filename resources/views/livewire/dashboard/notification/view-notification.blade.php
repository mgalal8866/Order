<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">اعدادات الاشعارات التلقائية</h4>
        </div>
        <form id="smsform" wire:submit.prevent="setconfig">
            <div class="card-body">
                <div class="row">

                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="notif_change_text1">تفعيل اشعار تغير حاله
                                الطلب</label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model.defer='notif_change_statu'
                                    id="notif_change_text1" />
                                <label class="form-check-label" for="notif_change_text1">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                        <x-label for="notif_change_text" label="نص الاشعار" />
                        <input type="text" {{ $notif_change_statu == 0 ? 'disabled' : '' }}
                            wire:model.defer='notif_change_text' id="notif_change_text" class="form-control" />
                    </div>

                    <div class="col-12 ">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="notif_sent_cart1">تفعيل اشعار العربة</label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model.defer='notif_sent_cart'
                                    id="notif_sent_cart1" />
                                <label class="form-check-label" for="notif_sent_cart1">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                        <x-label for="notif_cart_text1" label="نص الاشعار " />
                        <input type="text" {{ $notif_sent_cart == 0 ? 'disabled' : '' }}
                            wire:model.defer='notif_cart_text' id="notif_cart_text1" class="form-control" />
                    </div>

                    <div class="col-12 mt-2" >
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="notif_neworder1">تفعيل اشعار طلب جديد'</label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model.defer='notif_neworder'
                                    id="notif_neworder1" />
                                <label class="form-check-label" for="notif_neworder1">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                        <x-label for="notif_neworder_text1" label="نص الاشعار " />
                        <input type="text"  {{ $notif_neworder == 0 ? 'disabled' : '' }}
                            wire:model.defer='notif_neworder_text' id="notif_neworder_text1" class="form-control" />
                    </div>

                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="notif_newoffer1">تفعيل اشعار عرض جديد</label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model.defer='notif_newoffer'
                                    id="notif_newoffer1" />
                                <label class="form-check-label" for="notif_newoffer1">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                        <x-label for="notif_newoffer_text1" label="نص الاشعار " />
                        <input type="text"  {{ $notif_newoffer == 0 ? 'disabled' : '' }}
                            wire:model.defer='notif_newoffer_text' id="notif_newoffer_text1" class="form-control" />
                    </div>

                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="notif_welcome1">تفعيل اشعار الترحيب </label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model.defer='notif_welcome'
                                    id="notif_welcome1" />
                                <label class="form-check-label" for="notif_welcome1">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                        <x-label for="notif_welcome_text1" label="نص الاشعار " />
                        <input type="text" {{ $notif_welcome == 0 ? 'disabled' : '' }}
                            wire:model.defer='notif_welcome_text' id="notif_welcome_text1" class="form-control" />
                    </div>
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="notif_chat1">تفعيل اشعار رساله جديدة </label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model.defer='notif_chat'
                                    id="notif_chat1" />
                                <label class="form-check-label" for="notif_chat1">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                        <x-label for="notif_newchat_text1" label="نص الاشعار " />
                        <input type="text" {{ $notif_chat == 0 ? 'disabled' : '' }}
                            wire:model.defer='notif_newchat_text' id="notif_newchat_text1" class="form-control" />
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success">{{ __('tran.save') }}</button>
                </div>
            </div>
        </form>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ __('tran.notifiction') }}</h4>
        </div>
        <form id="notifi" wire:submit.prevent="sendnotifiction">
            <div class="card-body">
                <div class="row">
                    <div class="d-flex flex-column">
                        <label class="form-check-label mb-50" for="scales">مخصص / {{ __('tran.sendall') }} </label>
                        <div class="form-check form-switch form-check-success">
                            <input type="checkbox" class="form-check-input" wire:model='selectactive' id="scales"
                                {{ $selectactive == 0 ? 'checked' : '' }} />
                            <label class="form-check-label" for="scales">
                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                            </label>
                        </div>
                    </div>
                    @if ($selectactive == 0)
                        <div wire:ignore class="col-md-6 mb-1">
                            <label class="form-label" for="select2-multiple">Multiple</label>
                            <select class="select2 form-select" id="select2-multiple" multiple>
                                @foreach ($users as $item)
                                    <option value="{{ $item->fsm }}">{{ $item->client_name }}</option>
                                @endforeach
                            </select>
                        </div>

                    @endif
                    {{-- <div   class="col-12 col-md-6 ">
                        <label class="form-label" for="first-name-icon">{{__('tran.customer')}}</label>
                        <div wire:ignore class=" d-flex " style="flex-warp:nwrap !important">
                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></span>
                            <select class="select2 form-select" id="select2" >
                                <option value="">Walk-In Customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->uuid }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-outline-primary waves-effect" data-bs-target="#newcustomer"  data-bs-toggle="modal" id="button-addon2" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg></button>
                        </div>

                    </div> --}}
                    <div class="col-12 col-md-6">
                        <x-label for="title" label="{{ __('tran.title') }}" />
                        <input type="text" wire:model.defer='title' id="title" class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <x-label for="body" label="{{ __('tran.body') }}" />
                        <input type="text" wire:model.defer='body' id="body" class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex  mt-2">
                            <x-imageupload wire:model.defer="image" :width="300" :height="150"
                                :imagenew="$image" :imageold="$image ?? asset('asset/images/noimage.jpg')" />
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-success">{{ __('tran.send') }}</button>
                </div>

            </div>
        </form>
    </div>
</div>
@push('jslive')
    <script>
        window.addEventListener('swal', event => {

            Swal.fire({
                title: event.detail.message,
                icon: 'info',
                customClass: {
                    confirmButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });
        })

        // var select = $('.select2');
        // $(document).on('click', '.add-new-customer', function() {
        //     select.select2('close');
        // });

        // select.on('select2:open', function() {
        //     if (!$(document).find('.add-new-customer').length) {
        //         $(document)
        //             .find('.select2-results__options')
        //             .before(
        //                 '<div class="add-new-customer btn btn-flat-success cursor-pointer rounded-0 text-start mb-50 p-50 w-100" data-bs-toggle="modal" data-bs-target="#newcustomer">' +
        //                 feather.icons['plus'].toSvg({
        //                     class: 'font-medium-1 me-50'
        //                 }) +
        //                 '<span class="align-middle">Add New Customer</span></div>'
        //             );
        //     }
        // });
        // select.each(function() {
        //     var $this = $(this)
        //     $this.wrap('<div style="width: 100%;" class="position-relative"></div>');
        //     // $this.wrap('<div class="position-relative"></div>');
        //     $this.select2({
        //         // the following code is used to disable x-scrollbar when click in select input and
        //         // take 100% width in responsive also
        //         dropdownAutoWidth: true,
        //         width: '100%',
        //         dropdownParent: $this.parent()
        //     });
        //     $('#select2').on('change', function(e) {
        //         var data = $('#select2').select2("val");
        //         @this.set('selected', data);
        //     });
        // });
    </script>
    <script src={{ asset('asset/vendors/js/forms/select/select2.full.min.js') }}></script>
    <script src={{ asset('asset/vendors/js/forms/select/form-select2.js') }}></script>
    <script>
        // (function (window, document, $) {
        //     // to remove sm control classes from datatables
        //     if ($.fn.dataTable) {
        //         $.extend($.fn.dataTable.ext.classes, {
        //             sFilterInput: 'form-control',
        //             sLengthSelect: 'form-select'
        //         });
        //     }
        // });
    </script>
@endpush
