@props([
    'imagenew' => null,
    'imageold' => null,

])
 <label class="form-label"
 for="{{ $imagenew }}">{{ __('tran.image') }}</label>
    <a href="#" class="me-25">
        <img src="{{$imagenew == null ?  $imageold: $imagenew->temporaryUrl()}}" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="image" height="100" width="100" />
    </a>
    <div class="d-flex align-items-end mt-75 ms-1">

            {{-- <label for="account-upload" class="btn btn-sm btn-success mb-75 me-75 ">Upload</label> --}}
             {{-- <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button> --}}
            <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false; progress = 5" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                <a class="btn btn-success btn-sm btn-file-upload">
                    اختر صورة <input {{$attributes}} type="file" id="account-upload" name="file" size="40" accept=".png, .jpg, .jpeg, .gif">
                </a>
                <div x-show.transition="isUploading" class="progress progress-sm mt-2 rounded">
                    <div class="progress-bar bg-success  progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`">
                        <span class="sr-only">40% Complete (success)</span>
                    </div>
                </div>
            </div>


    </div>
