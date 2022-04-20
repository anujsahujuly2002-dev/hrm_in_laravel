<div class="row">
    <div class="col-md-12">
        @include('include.messages')
    </div>

    <div class="col-md-12">
        <div class="iq-card">
            <div class="card-body">
                <form wire:submit.prevent="createPatient" class="row">
                    <div class="form-group col-md-3 mb-3">
                        <label for="name_of_patient">Name</label>
                        <input type="text" name="name_of_patient" wire:model.defer="name_of_patient"
                            placeholder="Full name of the patient" id="name_of_patient" class="form-control"
                            autocomplete="off">
                        @error('name_of_patient')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-9 mb-3">
                        <label for="address_of_patient">Address</label>
                        <input type="text" name="address_of_patient" wire:model.defer="address_of_patient"
                            placeholder="Address of the patient" id="address_of_patient" class="form-control"
                            autocomplete="off">
                        @error('address_of_patient')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-2 mb-3">
                        <label for="gender_of_patient">Gender</label>
                        <select name="gender_of_patient" wire:model.defer="gender_of_patient" id="gender_of_patient"
                            class="form-control">
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        @error('gender_of_patient')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 mb-3">
                        <label for="contact_of_patient">Contact</label>
                        <input type="text" name="contact_of_patient" wire:model.defer="contact_of_patient"
                            placeholder="Contact of the patient" id="contact_of_patient" class="form-control"
                            autocomplete="off">
                        @error('contact_of_patient')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 mb-3">
                        <label for="email_of_patient">Email (Optional)</label>
                        <input type="email" name="email_of_patient" wire:model.defer="email_of_patient"
                            placeholder="Email of the patient" id="email_of_patient" class="form-control"
                            autocomplete="off">
                        @error('email_of_patient')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 mb-3">
                        <label for="dob_of_patient">Date of birth</label>
                        <input type="date" name="dob_of_patient" wire:model.lazy="dob_of_patient" wire:change="getAge"
                            placeholder="Address of the patient" id="dob_of_patient" class="form-control"
                            autocomplete="off">
                        @error('dob_of_patient')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-1 mb-3">
                        <label for="age_of_patient">Age</label>
                        <input type="number" name="age_of_patient" readonly tabindex="-1"
                            wire:model.defer="age_of_patient" placeholder="Age" id="age_of_patient" class="form-control"
                            autocomplete="off">
                        @error('age_of_patient')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-9 mb-3">
                        <label for="allergy_of_patient">Allergy (If any)</label>
                        <input type="text" name="allergy_of_patient" wire:model.defer="allergy_of_patient"
                            placeholder="Allergy (If any)" id="allergy_of_patient" class="form-control"
                            autocomplete="off">
                        @error('allergy_of_patient')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 mb-3">
                        <label for="balance_of_patient">Balance</label>
                        <input type="text" name="balance_of_patient" wire:model.defer="balance_of_patient"
                            placeholder="Balance amount of patient" id="balance_of_patient" class="form-control"
                            autocomplete="off">
                        @error('balance_of_patient')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 mb-3">
                        <label for="image_of_patient">Image (Optional)</label>
                        <input type="file" name="image_of_patient" wire:model.defer="image_of_patient"
                            id="image_of_patient" class="form-control-file" autocomplete="off">
                        @error('image_of_patient')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary"><i class="ri-save-line"></i> Save</button>
                        <a href="{{ route('patient.index') }}" class="btn btn-danger"><i class="ri-arrow-left-line"></i> Go back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
