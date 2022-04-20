<div class="row">
    <div class="col-md-12">
        @include('include.messages')
    </div>

    <div class="col-md-12">
        <div class="iq-card">
            <div class="card-body">
                <form class="row" wire:submit.prevent="create">
                    <div class="form-group col-md-3 mb-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control mb-0" id="username" name="username" wire:model.defer="username" placeholder="Create a username">
                        @error('username')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control mb-0" id="name" name="name" wire:model.defer="name" placeholder="Full name of user">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 mb-3">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control mb-0" id="email" name="email" wire:model.defer="email" placeholder="Enter email">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- <div class="form-group col-md-3 mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control mb-0" id="password" name="password" wire:model.defer="password" placeholder="Password">
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div> --}}
                    <div class="form-group col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="ri-save-line"></i> Update</button>
                        <a href="{{ route('utility.index') }}" class="btn btn-danger btn-lg"><i class="ri-arrow-left-line"></i> Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (Auth::user()->role == 2)
    <div class="col-md-12">
        <div class="iq-card">
            <div class="card-body">
                <form wire:submit.prevent="update" class="row">
                    <div class="col-md-12 form-group mb-3">
                        <h4>Doctor's information</h4>
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label for="doctor_name">Name (Without "Dr." prefix)</label>
                        <input type="text" name="doctor_name" wire:model.defer="doctor_name" placeholder="Name of the doctor" id="doctor_name" autocomplete="off" class="form-control">
                        @error('doctor_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label for="doctor_contact">Contact</label>
                        <input type="number" name="doctor_contact" wire:model.defer="doctor_contact" placeholder="Contact of the doctor" id="doctor_contact" autocomplete="off" class="form-control">
                        @error('doctor_contact')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label for="doctor_email">Email</label>
                        <input type="email" name="doctor_email" wire:model.defer="doctor_email" placeholder="Email of the doctor" id="doctor_email" autocomplete="off" class="form-control">
                        @error('doctor_email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label for="doctor_department">Department</label>
                        <input type="text" name="doctor_department" wire:model.defer="doctor_department" placeholder="Department of the doctor" id="doctor_department" class="form-control">
                        @error('doctor_department')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-9">
                        <label for="doctor_address">Address</label>
                        <input type="text" name="doctor_address" wire:model.defer="doctor_address" placeholder="Full address of the doctor" id="doctor_address" class="form-control">
                        @error('doctor_address')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-3">
                        <label for="doctor_image">Image (Optional)</label>
                        <input type="file" accept=".jpg,.jpeg,.png" name="doctor_image" wire:model.defer="doctor_image" id="doctor_image" class="form-control-file">
                        @error('doctor_image')
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
    @endif
</div>
