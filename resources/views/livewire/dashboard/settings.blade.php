<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">اعدادات الاشعارات</h4>
        </div>
        <form id="smsform" wire:submit.prevent="fireconfig">
            <div class="card-body">
                <div class="row">

                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="fire_active">تفعيل اشعار تغير حاله الطلب</label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model.defer='fire_active'
                                id="fire_active" />
                                <label class="form-check-label" for="fire_active">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                        <x-label for="fire_servies" label="نص الاشعار" />
                        <input type="text" wire:model.defer='fire_servies' id="fire_servies" class="form-control" />
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="fire_active">تفعيل اشعار العربة</label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model.defer='fire_active'
                                id="fire_active" />
                                <label class="form-check-label" for="fire_active">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                        <x-label for="fire_servies" label="نص الاشعار  " />
                        <input type="text" wire:model.defer='fire_apiKey' id="fire_apiKey" class="form-control" />
                    </div>
                 


                </div>
                <div class="card-footer">
                    <button class="btn btn-success">{{ __('tran.send') }}</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ __('tran.settingfirebase') }}</h4>
        </div>
        <form id="smsform" wire:submit.prevent="fireconfig">
            <div class="card-body">
                <div class="row">
                    <div class="d-flex flex-column">
                        <label class="form-check-label mb-50" for="fire_active">{{ __('tran.active') }} </label>
                        <div class="form-check form-switch form-check-success">
                            <input type="checkbox" class="form-check-input" wire:model.defer='fire_active'
                                id="fire_active" />
                            <label class="form-check-label" for="fire_active">
                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <x-label for="fire_servies" label="Key-servies" />
                        <input type="text" wire:model.defer='fire_servies' id="fire_servies"
                            class="form-control" />
                    </div>

                    <div class="col-12 col-md-6">
                        <x-label for="fire_apiKey" label="Api-Key" />
                        <input type="text" wire:model.defer='fire_apiKey' id="fire_apiKey"
                            class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <x-label for="fire_authDomain" label="Auth Domain" />
                        <input type="text" wire:model.defer='fire_authDomain' id="fire_authDomain"
                            class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <x-label for="fire_project_id" label="Project-id" />
                        <input type="text" wire:model.defer='fire_project_id' id="fire_project_id"
                            class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <x-label for="fire_storageBucket" label="StorageBucket" />
                        <input type="text" wire:model.defer='fire_storageBucket' id="fire_storageBucket"
                            class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <x-label for="fire_measurement_id" label="Measurement-id" />
                        <input type="text" wire:model.defer='fire_measurement_id' id="fire_measurement_id"
                            class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <x-label for="fire_app_id" label="App_id" />
                        <input type="text" wire:model.defer='fire_app_id' id="fire_app_id"
                            class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <x-label for="fire_messagingSender_id" label="Messaging-Sender-id" />
                        <input type="text" wire:model.defer='fire_messagingSender_id' id="fire_messagingSender_id"
                            class="form-control" />
                    </div>


                </div>
                <div class="card-footer">
                    <button class="btn btn-success">{{ __('tran.send') }}</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ __('tran.settingsite') }}</h4>
        </div>
        <form id="smsform" wire:submit.prevent="siteconfig">
            <div class="card-body">
                <div class="row">

                    <div class="col-12">
                        <x-label for="smssenderid" label="Color_primary" />
                        <input type="color" class="form-control" id="head" name="head"
                            wire:model.defer='site_color_primary' />
                    </div>
                    <div class="col-12">
                        <x-label for="smssenderid" label="Color_Second" />
                        <input type="color" class="form-control" id="head" name="head"
                            wire:model.defer='site_color_second' />
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-success">{{ __('tran.send') }}</button>
                </div>

            </div>
        </form>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ __('tran.settingsms') }}</h4>
        </div>
        <form id="smsform" wire:submit.prevent="smsconfig">
            <div class="card-body">
                <div class="row">
                    <div class="d-flex flex-column">
                        <label class="form-check-label mb-50" for="smsactive">{{ __('tran.active') }} </label>
                        <div class="form-check form-switch form-check-success">
                            <input type="checkbox" class="form-check-input" wire:model.defer='smsactive'
                                id="smsactive" />
                            <label class="form-check-label" for="smsactive">
                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <x-label for="smssenderid" label="{{ __('tran.senderid') }}" />
                        <input type="text" wire:model.defer='smssenderid' id="smssenderid"
                            class="form-control" />
                    </div>
                    <div class="col-12">
                        <x-label for="smsusername" label="{{ __('tran.smsusername') }}" />
                        <input type="text" wire:model.defer='smsusername' id="smsusername"
                            class="form-control" />
                    </div>
                    <div class="col-12">
                        <x-label for="smspassword" label="{{ __('tran.password') }}" />
                        <input type="text" wire:model.defer='smspassword' id="smspassword"
                            class="form-control" />
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-success">{{ __('tran.send') }}</button>
                </div>

            </div>
        </form>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ __('tran.settingsecurity') }}</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <section id="ApiKeyPage">
                    <!-- create API key -->
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title">انشاء مفتاح جديد</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-5 order-md-0 order-1">
                                <div class="card-body">
                                    <!-- form -->
                                    <form id="createApiForm" wire:submit.prevent="apicreate">

                                        <div class="mb-2">
                                            <label for="nameApiKey" class="form-label">اسم المصدر</label>
                                            <input class="form-control" type="text" name="apiKeyName"
                                                placeholder="ادخل اسم المصدر" id="nameApiKey"
                                                wire:model.defer='nametoken' data-msg="ادخل اسم المصدر" />
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100">انشاء</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- api key list -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">صلاحية استخدام API</h4>
                        </div>
                        <div class="card-body">
                            <div class="row gy-2">
                                @foreach ($apitoken as $token)
                                    <div class="col-12">
                                        <div class="bg-light-secondary position-relative rounded p-2">
                                            <div class="d-flex align-items-center flex-wrap">
                                                <h4 class="mb-1 me-1">{{ $token->name }}</h4>
                                                <span class="badge badge-light-primary mb-1">Full Access</span>
                                            </div>
                                            <h6 class="d-flex align-items-center fw-bolder">
                                                <span class="me-50">{{ $token->token }}</span>
                                                {{-- <span><i data-feather="copy" class="font-medium-4 cursor-pointer"></i></span> --}}
                                            </h6>
                                            <span>Created on {{ $token->created_at }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>



            </div>
            <div class="card-footer">
                <button class="btn btn-success">{{ __('tran.send') }}</button>
            </div>

        </div>
    </div>

</div>
@push('jslive')
    <script>
        window.addEventListener('swal', event => {
            Swal.fire({
                title: event.detail.message,
                icon: event.detail.ev,
                customClass: {
                    confirmButton: 'btn btn-' + event.detail.ev
                },
                buttonsStyling: false
            });
        })
    </script>
    <script src={{ asset('asset/vendors/js/forms/select/select2.full.min.js') }}></script>
    <script src={{ asset('asset/vendors/js/forms/select/form-select2.js') }}></script>
@endpush
