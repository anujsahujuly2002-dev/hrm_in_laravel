<div class="row">
    <div class="col-md-12">
        @include('include.messages')
    </div>

    <div class="col-md-12">
        <div class="iq-card">
            <div class="card-body">
                <form wire:submit.prevent="create" class="row">
                    <div class="col-md-12 form-group mb-3">
                        <h4>Doctor's information</h4>
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label for="name">Name (Without "Dr." prefix)</label>
                        <input type="text" name="name" wire:model.defer="name" placeholder="Name of the doctor" id="name" autocomplete="off" class="form-control">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label for="contact">Contact</label>
                        <input type="number" name="contact" wire:model.defer="contact" placeholder="Contact of the doctor" id="contact" autocomplete="off" class="form-control">
                        @error('contact')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" wire:model.defer="email" placeholder="Email of the doctor" id="email" autocomplete="off" class="form-control">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label for="department">Department</label>
                        <input type="text" name="department" wire:model.defer="department" placeholder="Department of the doctor" id="department" class="form-control">
                        @error('department')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-9">
                        <label for="address">Address</label>
                        <input type="text" name="address" wire:model.defer="address" placeholder="Full address of the doctor" id="address" class="form-control">
                        @error('address')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label for="image">Image (Optional)</label>
                        <input type="file" accept=".jpg,.jpeg,.png" name="image" wire:model.defer="image" id="image" class="form-control-file">
                        @error('image')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    @if ($doctor_user_id == null)
                    <div class="col-md-12 form-group mb-3 mt-2">
                        <h4>Security</h4>
                        <h6>If you want the doctor to login & perform his/her activities.</h6>
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label for="username">Name</label>
                        <input type="text" name="username" wire:model.defer="username" placeholder="Create username for the doctor" id="username" autocomplete="off" class="form-control">
                        @error('username')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" wire:model.defer="password" placeholder="Create password for the doctor" id="password" autocomplete="off" class="form-control">
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    @endif
                    <div class="form-group col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary"><i class="ri-save-line"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
