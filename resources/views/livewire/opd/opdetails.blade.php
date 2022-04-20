<div class="row">
    <div class="col-md-12">
        @include('include.messages')
    </div>

    <div class="col-md-12">
        <div class="iq-card">
            <div class="card-body">
                <form wire:submit.prevent="update({{ $opd->id }})" class="row">
                    <div class="form-group mb-3 col-md-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" wire:model.defer="name" placeholder="Name of the OPD" autocomplete="off" class="form-control">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label for="doctor">Doctor</label>
                        <input type="text" name="doctor" id="doctor" wire:model.defer="doctor" placeholder="Name of the doctor" autocomplete="off" class="form-control">
                        @error('doctor')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label for="degree">Doctor's Degree</label>
                        <input type="text" name="degree" id="degree" wire:model.defer="degree" placeholder="Degree of doctor" autocomplete="off" class="form-control">
                        @error('degree')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label for="speciality">OPD Speciality</label>
                        <input type="text" name="speciality" id="speciality" wire:model.defer="speciality" placeholder="Speciality of the OPD" autocomplete="off" class="form-control">
                        @error('speciality')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label for="email">Email (Optional)</label>
                        <input type="email" name="email" id="email" wire:model.defer="email" placeholder="Email of the OPD" autocomplete="off" class="form-control">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label for="mobile">Mobile (Optional)</label>
                        <input type="number" name="mobile" id="mobile" wire:model.defer="mobile" placeholder="Mobile of the OPD" autocomplete="off" class="form-control">
                        @error('mobile')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label for="landline">Landline (Optional)</label>
                        <input type="text" name="landline" id="landline" wire:model.defer="landline" placeholder="Landline of the OPD" autocomplete="off" class="form-control">
                        @error('landline')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" wire:model.defer="address" placeholder="Full address of the OPD" autocomplete="off" class="form-control">
                        @error('address')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label for="image">Logo Image (Optional)</label>
                        <input type="file" name="image" id="image" accept=".jpg,.jpeg,.png,.ico" wire:model.defer="image" class="form-control-file">
                        @error('image')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="ri-save-line"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
