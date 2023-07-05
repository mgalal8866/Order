<div>
    <form id="newproductForm" wire:submit.prevent="savecategory">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{__('tran.datacategory')}}</h4>
            </div>
            <div class="card-body" wire:ignore.self>
                <div class="row gy-1 pt-75">
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="name">{{ __('tran.name') }}</label>
                        <input type="text" wire:model.defer='name' id="name" name="name"
                            class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label"
                            for="categoryparent">{{ __('tran.categorysub') }}
                        <span class="text-danger">{{$maincat == true ? ' * القسم رئيسي ويحتوى على اقسام فرعيه لايمكن تحويله لقسم فرعى':''}}</span>
                        </label>
                        <select id="categoryparent" name="categoryparent" class="form-select"
                            wire:model.defer='categoryparent' {{$maincat == true ? 'disabled':''}}>
                            <option value="null">{{ __('tran.default') }}</option>
                            @foreach ($categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="note">{{ __('tran.note') }}</label>
                        <input type="text" wire:model.defer='note' id="note" name="note"
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
                    <a class="btn btn-outline-secondary" href="{{ route('categorys') }}">
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
