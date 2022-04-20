<div class="row">
    <div class="col-md-12">
        @include('include.messages')
    </div>

    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <form wire:submit.prevent="create" class="row">
                    <div class="form-group col-md-3 mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" wire:model.defer="name" placeholder="Name of the disease" autocomplete="off" id="name" class="form-control">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary"><i class="ri-save-line"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
