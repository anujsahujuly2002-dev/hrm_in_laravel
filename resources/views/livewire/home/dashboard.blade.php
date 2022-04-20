<div>
    <div class="col-md-12">
        @include('include.messages')
    </div>
    @if (Auth::user()->role==1)
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body iq-bg-primary rounded">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="rounded-circle iq-card-icon bg-primary"><i class="ri-user-fill"></i></div>
                                    <div class="text-right">
                                        <h2 class="mb-0"><span class="counter">{{ $doctorCount }}</span></h2>
                                        <h5 class="">Doctors</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body iq-bg-warning rounded">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="rounded-circle iq-card-icon bg-warning"><i class="ri-wheelchair-line"></i>
                                    </div>
                                    <div class="text-right">
                                        <h2 class="mb-0"><span class="counter">{{ $checkupCount }}</span></h2>
                                        <h5 class="">Checkups</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body iq-bg-danger rounded">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="rounded-circle iq-card-icon bg-danger"><i class="ri-group-fill"></i></div>
                                    <div class="text-right">
                                        <h2 class="mb-0"><span class="counter">{{ $patientCount }}</span></h2>
                                        <h5 class="">Patients</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body iq-bg-info rounded">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="rounded-circle iq-card-icon bg-info"><i class="ri-capsule-line"></i></div>
                                    <div class="text-right">
                                        <h2 class="mb-0"><span class="counter">{{ $medicinesCount }}</span></h2>
                                        <h5 class="">Medicines</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height" style="position: relative;">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Hospital Income</h4>
                        </div>
                    </div>
                    <div class="iq-card-body pb-0 mt-3">
                        <div class="row text-center">
                            <div class="col-sm-6 col-6">
                                <h4 class="margin-0">₹ {{ $todayIncome }} </h4>
                                <p class="text-muted"> Today's Income</p>
                            </div>
                            <div class="col-sm-6 col-6">
                                <h4 class="margin-0">₹ {{ $weekIncome }} </h4>
                                <p class="text-muted">This Week's Income</p>
                            </div>
                            <div class="col-sm-6 col-6">
                                <h4 class="margin-0">₹ {{ $monthIncome }} </h4>
                                <p class="text-muted">This Month's Income</p>
                            </div>
                            <div class="col-sm-6 col-6">
                                <h4 class="margin-0">₹ {{ $yearIncome }} </h4>
                                <p class="text-muted">This Year's Income</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height" style="position: relative;">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Appointments</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <h4>
                                <a href="#" data-toggle="modal" data-target="#exampleModal"><span class="text-primary">
                                        <i class="ri-add-line"></i>New Appointment
                                    </span></a>
                            </h4>
                        </div>
                    </div>
                    <div class="iq-card-body pb-0 mt-3">
                        <div class="row text-center">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Age</th>
                                            <th>Doctor</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($data) > 0)
                                            @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->date }}</td>
                                                <td>{{ $item->patients->name }}</td>
                                                <td>{{ $item->patients->gender }}</td>
                                                <td>{{ 'Carbon\Carbon'::parse($item->patients->dob)->age }}</td>
                                                <td>
                                                    @if ($item->doctor_id)
                                                        {{ $item->docs->name }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="#" wire:click="createCheckup({{ $item->id }})" class="btn btn-outline-primary btn-sm"><i class="ri-wheelchair-line"></i> Checkup</a>
                                                        <a href="#" wire:click="cancelApp({{ $item->id }})" class="btn btn-outline-danger btn-sm"><i class="ri-close-line"></i> Cancel</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="text-center" colspan="9">No Appointments.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (Auth::user()->role==2)
    @endif
    @if (Auth::user()->role==6)
        <div class="row">
            <div class="col-md-3">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Today</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        @if ($todaysApo)
                        @foreach ($todaysApo as $item)
                        <ul class="list-inline m-0 p-0">
                            <li>
                                <h5 class="float-left mb-1">{{ $item->patients->name }}</h5>
                                <div class="d-inline-block w-100">
                                    <p>
                                        <span class="text-muted">Last visit:</span> <span
                                            class="badge badge-primary">{{ $item->checkups->date }} </span>
                                    </p>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Tomorrow</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        @if ($tomorrowApo)
                        @foreach ($tomorrowApo as $item)
                        <ul class="list-inline m-0 p-0">
                            <li>
                                <h5 class="float-left mb-1">{{ $item->patients->name }}</h5>
                                <div class="d-inline-block w-100">
                                    <p>
                                        <span class="text-muted">Last visit:</span> <span
                                            class="badge badge-primary">{{ $item->checkups->date }} </span>
                                    </p>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">The day after</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        @if ($dayafterApo)
                        @foreach ($dayafterApo as $item)
                        <ul class="list-inline m-0 p-0">
                            <li>
                                <h5 class="float-left mb-1">{{ $item->patients->name }}</h5>
                                <div class="d-inline-block w-100">
                                    <p>
                                        <span class="text-muted">Last visit:</span> <span
                                            class="badge badge-primary">{{ $item->checkups->date }} </span>
                                    </p>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="modal fade" id="exampleModal" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12 mb-3">
                            <label for="contact_of_patient">Contact</label>
                            <input type="text" name="contact_of_patient" onchange="findP()" wire:model.defer="contact_of_patient"
                                placeholder="Contact of the patient" id="contact_of_patient" class="form-control"
                                autocomplete="off">
                                @if ($patients)
                                <div class="dropdown">
                                    <div id="myDropdown" class="dropdown-content">
                                        @foreach ($patients as $item)
                                            <a href="#" onclick="hide()" wire:click="selectP({{ $item->id }})">{{ $item->name }}-{{ $item->address }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            @error('contact_of_patient')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        @if ($patientData)
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $name_of_patient }}</td>
                                        <td>{{ $address_of_patient }}</td>
                                        <td>{{ $gender_of_patient }}</td>
                                        <td>{{ $age_of_patient }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="col-6">
                            <div class="row">
                                <div class="form-group col-md-12 mb-3">
                                    <label for="name_of_patient">Name</label>
                                    <input type="text" name="name_of_patient" wire:model.defer="name_of_patient"
                                        placeholder="Full name of the patient" id="name_of_patient" class="form-control"
                                        autocomplete="off">
                                    @error('name_of_patient')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
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
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="address_of_patient">Address</label>
                            <textarea name="address_of_patient" id="address_of_patient"
                                class="form-control"
                                wire:model.defer="address_of_patient"
                                rows="3"></textarea>
                            @error('address_of_patient')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="dob_of_patient">Date of birth</label>
                            <div class="input-group" role="group">
                                <input type="date" name="dob_of_patient"
                                style="width: 80%"
                                wire:model.lazy="dob_of_patient" wire:change="getAge"
                                placeholder="Address of the patient" id="dob_of_patient" class="form-control"
                                autocomplete="off">
                                <input type="number" name="age_of_patient" readonly tabindex="-1"
                                style="width: 20%"
                                wire:model.defer="age_of_patient" placeholder="Age" id="age_of_patient" class="form-control"
                                autocomplete="off">
                            </div>
                            @error('dob_of_patient')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        @endif
                        <div class="form-group col-md-4">
                                    <label for="doc_for_appointment">Doctor</label>
                                    <select name="doc_for_appointment" wire:model.defer="doc_for_appointment" id="doc_for_appointment"
                                        class="form-control">
                                        @php
                                            $docs='App\Models\User'::where('role','2')->get();
                                        @endphp
                                        <option value="">Select</option>
                                        @if ($docs)
                                            @foreach ($docs as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('doc_for_appointment')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                        </div>
                        <div class="form-group col-md-8 mb-3">
                            <label for="date_of_appointment">Appointment Date And Time</label>
                            <div class="input-group" role="group">
                                <input type="datetime-local" name="date_of_appointment"
                                    wire:model.lazy="date_of_appointment"
                                    id="date_of_appointment" class="form-control"
                                    autocomplete="off">
                            </div>
                            @error('date_of_appointment')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click="newAppointment" data-dismiss="modal" class="btn btn-primary">Add Appointment</button>
                </div>
            </div>
        </div>
    </div>
</div>
