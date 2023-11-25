<div>
    <div class="card border-success">


        <div class="card-body">
            <h4 class="card-title">رفع تحديث دسك توب</h4>
            <form class="row g-3" wire:submit.prevent="save">
                <div class="col-auto">
                    <label>:الاصدار</label>
                    <input type="text" class="form-control" wire:model='version' required>
                </div>
                <div class="col-auto">
                    <label>التطبيق</label>
                    {{-- <input type="file" class="form-control" wire:model='file' required> --}}
                    <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <input type="file" class="form-control" wire:model="file">
                    <div x-show="isUploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                </div>
                </div>
                <div class="col-auto mt-6">
                    <button class="btn btn-success">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
