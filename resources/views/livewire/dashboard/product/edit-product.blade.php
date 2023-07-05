<div>
    <form id="newproductForm" wire:submit.prevent="saveproduct">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">البيانات الاساسية</h4>
            </div>
            <div class="card-body" wire:ignore.self>
                <div class="row gy-1 pt-75">
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modelname">{{ __('tran.name') }}</label>
                        <input type="text" wire:model.defer='name' id="modelname" name="modelname"
                            class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modelpricing">{{ __('tran.category') }}</label>
                        <select id="modelcategory" wire:model.defer='selectcategory' name="modelcategory"
                            class="form-select">
                            <option value="null">{{ __('tran.default') }}</option>
                            @foreach ($categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modeltext">{{ __('tran.limit_order') }}</label>
                        <input type="text" wire:model.defer='limit' id="modeldescription" class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="demo-inline-spacing">
                            <div class="d-flex flex-column">
                                <label class="form-check-label mb-50" for="state">{{ __('tran.state') }}</label>
                                <div class="form-check form-switch form-check-success">
                                    <input type="checkbox" class="form-check-input" wire:model.defer='state'
                                        id="state" {{ $state == 1 ? 'checked' : '' }} />
                                    <label class="form-check-label" for="state">
                                        <span class="switch-icon-left"><i data-feather="check"></i></span>
                                        <span class="switch-icon-right"><i data-feather="x"></i></span>
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <label class="form-check-label mb-50" for="online">{{ __('tran.online') }}</label>
                                <div class="form-check form-switch form-check-success">
                                    <input type="checkbox" class="form-check-input" wire:model='online' id="online"
                                        {{ $online == 1 ? 'checked' : '' }} />
                                    <label class="form-check-label" for="online">
                                        <span class="switch-icon-left"><i data-feather="check"></i></span>
                                        <span class="switch-icon-right"><i data-feather="x"></i></span>
                                    </label>
                                </div>
                            </div>

                            <div class="d-flex flex-column">
                                <label class="form-check-label mb-50" for="scales">{{ __('tran.scales') }}</label>
                                <div class="form-check form-switch form-check-success">
                                    <input type="checkbox" class="form-check-input" wire:model.defer='scales'
                                        id="scales" {{ $statescales == 1 ? 'checked' : '' }} />
                                    <label class="form-check-label" for="scales">
                                        <span class="switch-icon-left"><i data-feather="check"></i></span>
                                        <span class="switch-icon-right"><i data-feather="x"></i></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">البيانات الفرعية</h4>
            </div>
            <div class="card-body" wire:ignore.self>
                <ul class="nav nav-tab justify-content-center" dir="rtl" role="tablist">
                    @foreach ($detailslist as $index => $details)
                        <li class="nav-item">
                            <a class="nav-link  {{ $index == 0 ? 'active' : '' }}" id="unit{{ $index + 1 }}-tab"
                                data-bs-toggle="tab" href="#unit{{ $index + 1 }}" aria-controls="home"
                                role="tab" aria-selected="true"><i data-feather="tool"></i>
                                {{ $index == 0 ? __('tran.unit1') : ($index == 1 ? __('tran.unit2') : __('tran.unit3')) }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach ($detailslist as $index => $details)
                        <div class="tab-pane  {{ $index == 0 ? 'active' : '' }}" id="unit{{ $index + 1 }}"
                            aria-labelledby="unit{{ $index + 1 }}-tab" role="tabpanel">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="d-flex">
                                        <x-imageupload wire:model.defer="detailslist.{{$index}}.imagenew"  :imagenew="$detailslist[$index]['imagenew']" :imageold="$detailslist[$index]['image']" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label"
                                        for="{{ $index }}.unit">{{ __('tran.unit') }}</label>
                                    <select id="modelcategory" name="modelcategory" class="form-select"
                                        wire:model.defer='detailslist.{{ $index }}.unit'>
                                        <option value="null">{{ __('tran.default') }}</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($index != 0)
                                    <div class="col-12 col-md-6">
                                        <label class="form-label"
                                            for="{{ $index }}.unitqty">{{ __('tran.unit' . $index + 1) }}</label>
                                        <input type="text"
                                            wire:model.defer='detailslist.{{ $index }}.unitqty'
                                            id="{{ $index }}.unitqty" class="form-control" />
                                    </div>
                                @endif
                                <div class="col-12 col-md-6">
                                    <label class="form-label"
                                        for="{{ $index }}.code">{{ __('tran.code') }}</label>
                                    <input type="text" wire:model.defer='detailslist.{{ $index }}.code'
                                        id="{{ $index }}.code" class="form-control" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label"
                                        for="{{ $index }}.price_pay">{{ __('tran.price_bay') }}</label>
                                    <input type="text"
                                        wire:model.defer='detailslist.{{ $index }}.price_pay'
                                        id="{{ $index }}.price_pay" class="form-control" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label"
                                        for="{{ $index }}.price_salse">{{ __('tran.price1') }}</label>
                                    <input type="text"
                                        wire:model.defer='detailslist.{{ $index }}.price_salse'
                                        id="{{ $index }}.price_salse" class="form-control" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label"
                                        for="{{ $index }}.offer">{{ __('tran.price2') }}</label>
                                    <input type="text" wire:model.defer='detailslist.{{ $index }}.offer'
                                        id="{{ $index }}.offer" class="form-control" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label"
                                        for="{{ $index }}.dateexp">{{ __('tran.dateexp') }}</label>
                                    <input type="text" wire:model.defer='detailslist.{{ $index }}.dateexp'
                                        id="{{ $index }}.dateexp" class="form-control"
                                        placeholder="yyyy/m/d" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label"
                                        for="{{ $index }}.limitmax">{{ __('tran.limitmax') }}</label>
                                    <input type="text" wire:model.defer='detailslist.{{ $index }}.limitmax'
                                        id="{{ $index }}.limitmax" class="form-control" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="demo-inline-spacing">
                                        <div class="d-flex flex-column">
                                            <label class="form-check-label mb-50"
                                                for="customSwitch4">{{ __('tran.online') }}</label>
                                            <div class="form-check form-switch form-check-success">
                                                <input type="checkbox" class="form-check-input"
                                                    wire:model.defer='detailslist.{{ $index }}.online'
                                                    id="{{ $index }}.online"
                                                    {{ $online == 1 ? 'checked' : '' }} />
                                                <label class="form-check-label" for="{{ $index }}.online">
                                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <label class="form-check-label mb-50"
                                                for="customSwitch4">{{ __('tran.addtosales') }}</label>
                                            <div class="form-check form-switch form-check-success">
                                                <input type="checkbox" class="form-check-input"
                                                    wire:model.defer='detailslist.{{ $index }}.addtosales'
                                                    id="{{ $index }}.addtosales"
                                                    {{ $state == 1 ? 'checked' : '' }} />
                                                <label class="form-check-label" for="{{ $index }}.addtosales">
                                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-12 text-center mt-2 pt-50">

            <button type="submit" class="btn btn-primary me-1">Save</button>
            <a class="btn btn-outline-secondary" href="{{ route('products') }}">
                Cancel
            </a>
        </div>
    </form>
</div>

@push('jslive')
    <script>
        window.addEventListener('swal', event => {

            Swal.fire({
                title: event.detail.message,
                icon: 'success',
                customClass: {
                    confirmButton: 'btn btn-success'
                },
                buttonsStyling: false
            });
        })
    </script>
@endpush
{{-- @push('jslive') --}}
{{-- <script>
        var fullEditor = new Quill('#full-container .editor', {
            bounds: '#full-container .editor',
            modules: {
                formula: true,
                syntax: true,
                toolbar: [
                    [{
                            font: []
                        },
                        {
                            size: []
                        }
                    ],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                            color: []
                        },
                        {
                            background: []
                        }
                    ],
                    [{
                            script: 'super'
                        },
                        {
                            script: 'sub'
                        }
                    ],
                    [{
                            header: '1'
                        },
                        {
                            header: '2'
                        },
                        'blockquote',
                        'code-block'
                    ],
                    [{
                            list: 'ordered'
                        },
                        {
                            list: 'bullet'
                        },
                        {
                            indent: '-1'
                        },
                        {
                            indent: '+1'
                        }
                    ],
                    [
                        'direction',
                        {
                            align: []
                        }
                    ],
                    ['link', 'image', 'video', 'formula'],
                    ['clean']
                ]
            },
            theme: 'snow'
        });
        function callMe() //display current HTML
            {
                var html = fullEditor.root.innerHTML;
                @this.set('description', html);
            }
        window.addEventListener('closeModal', event=> {
            var isRtl = $('html').attr('data-textdirection') === 'rtl';
            $("#newproduct").modal('hide');
                if(event.detail.message){
                    toastr['success']( event.detail.message, '',{
                        closeButton: true,
                        tapToDismiss: false,
                        progressBar: true,
                        rtl:  isRtl,
                    });
                }
        })
    </script> --}}
{{-- @endpush --}}
