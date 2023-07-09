<div>
    <form id="notifi" wire:submit.prevent="sendnotificion">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('tran.notifiction') }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6">
                    <div class="d-flex flex-column">
                        <label class="form-check-label mb-50" for="scales">{{ __('tran.sendall') }}</label>
                        <div class="form-check form-switch form-check-success">
                            <input type="checkbox" class="form-check-input" wire:model='selectactive'
                                id="scales" {{ $selectactive == 1 ? 'checked' : '' }} />
                            <label class="form-check-label" for="scales">
                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                            </label>
                        </div>
                    </div>
                    </div>
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
        </div>
    </form>
</div>
