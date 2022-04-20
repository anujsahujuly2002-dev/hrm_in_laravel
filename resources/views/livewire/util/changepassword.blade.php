<div class="row">
    <div class="col-md-12">
        @include('include.messages')
    </div>

    <div class="col-md-12">
        <div class="iq-card">
            <div class="card-body">
                <form wire:submit.prevent="update" class="row">
                    <div class="form-group col-md-3 mb-3">
                        <label>Current Password</label>
                        <input type="password" autocomplete="off" placeholder="Your current password" wire:model.defer="current_password" class="form-control">
                        @error('current_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 mb-3">
                        <label>New Password</label>
                        <input type="password" autocomplete="off" placeholder="Create new password" wire:model.defer="new_password" class="form-control">
                        @error('new_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 mb-3">
                        <label>Password Confirm</label>
                        <input type="password" autocomplete="off" placeholder="Confirm new password" wire:model.defer="confirm_password" class="form-control">
                        @error('confirm_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="ri-save-line"></i> Update</button>
                        <a href="{{ route('utility.index') }}" class="btn btn-danger btn-lg"><i class="ri-arrow-left-line"></i> Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
