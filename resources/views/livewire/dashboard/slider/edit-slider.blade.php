<div>
    <form id="newproductForm" wire:submit.prevent="saveslider">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{__('tran.dataslider')}}</h4>
            </div>
            <div class="card-body" wire:ignore.self>
                <div class="row gy-1 pt-75">
                    <div class="col-4 col-md-4  ">
                    <x-imageupload  wire:model.defer='imagenew' :imagenew="$imagenew" :imageold="$image"/>
                </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="name">{{ __('tran.name') }}</label>
                        <input type="text" wire:model.defer='name' id="name" name="name"
                            class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-check-label mb-50" for="state">{{ __('tran.state') }}</label>
                        <div class="form-check form-switch form-check-success">
                            <input type="checkbox" class="form-check-input" wire:model.defer='state' id="state"
                                {{ $state == 1 ? 'checked' : '' }} />
                            <label class="form-check-label" for="state">
                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-footer">
                <div class="col-12 text-center mt-2 pt-50">
                    <button type="submit" class="btn btn-success me-1">Save</button>
                    <a class="btn btn-outline-secondary" href="{{ route('sliders') }}">
                        Cancel
                    </a>
                </div>
            </div>
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
