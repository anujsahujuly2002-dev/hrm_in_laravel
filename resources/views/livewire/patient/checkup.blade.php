<div class="row">
    <div class="col-md-12">
        @include('include.messages')
    </div>

    @if ($pageid == 0)
    <form wire:submit.prevent="saveCheckup" class="col-md-12">
        <div class="iq-card">
            <ul class="nav nav-tabs" id="myTab-1" role="tablist">
                <li class="nav-item">
                    <a class="nav-link @if($active_tab == 1) active @endif" id="patient-tab" data-toggle="tab" href="#"
                        role="tab" aria-controls="patient" aria-selected="true">Patient details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($active_tab == 2) active @endif" id="case-tab" data-toggle="tab" href="#"
                        role="tab" aria-controls="case" aria-selected="false">Case paper & history</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($active_tab == 3) active @endif" id="dm-tab" data-toggle="tab" href="#"
                        role="tab" aria-controls="dm" aria-selected="false">Disease & medicine</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent-2" wire:ignore.self>
                <div class="tab-pane fade @if($active_tab == 1) show active @endif" id="patient" role="tabpanel"
                    aria-labelledby="patient-tab">
                    <div class="iq-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-2 form-group">
                                    <label for="patient_name">Name</label>
                                    <div class="input-group">
                                        <select name="patient_name" wire:model="patient_name"
                                            wire:change="getPatientAge" id="patient_name" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($patients as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn-sm" tabindex="-1"
                                                wire:click.prevent="changePage(1)"><i class="ri-add-line"></i></button>
                                                <a href="{{ route('patient.receipt') }}">Receipt</a>
                                        </div>
                                    </div>
                                    @error('patient_name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-2 form-group">
                                    <label for="age">Age</label>
                                    <input type="number" name="age" tabindex="-1" wire:model.defer="age" readonly
                                        step="0.1" placeholder="Age" autocomplete="off" id="age" class="form-control">
                                    @error('age')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2 form-group">
                                    <label for="checkup_date">Date</label>
                                    <input type="date" name="checkup_date" wire:model.defer="checkup_date"
                                        autocomplete="off" id="checkup_date" class="form-control">
                                    @error('checkup_date')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2 form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" tabindex="-1" wire:model.defer="address" readonly
                                        placeholder="Address" autocomplete="off" id="address" class="form-control">
                                    @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2 form-group">
                                    <label for="patient_allergy">Allergy</label>
                                    <input type="text" name="patient_allergy" tabindex="-1"
                                        wire:model.defer="patient_allergy" readonly placeholder="If any"
                                        autocomplete="off" id="patient_allergy" class="form-control">
                                    @error('patient_allergy')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2 form-group">
                                    <button class="btn btn-primary btn-lg" type="button"
                                        wire:click="caseTab">@if($checkupData) Next @else Create @endif</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade @if($active_tab == 2) show active @endif" id="case" role="tabpanel"
                    aria-labelledby="case-tab">
                    <div class="iq-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="case_paper_no">Case Paper No.</label>
                                        <input type="text" name="case_paper_no" wire:model.defer="case_paper_no"
                                            id="case_paper_no" class="form-control w-50" autocomplete="off" readonly
                                            placeholder="Case Paper No.">
                                        @error('case_paper_no')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="symptoms">Symptopms</label>
                                        <textarea name="symptoms" wire:model.defer="symptoms" id="symptoms"
                                            class="form-control" autocomplete="off" placeholder="Enter symptoms"
                                            rows="7"></textarea>
                                        @error('symptoms')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="history">History</label>
                                        <select name="history" wire:model.defer="history" id="history"
                                            class="form-control w-50">
                                            <option value="">Select</option>
                                            <option value="New">New History</option>
                                            <option value="Previous">Previous History</option>
                                        </select>
                                        @error('history')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="history_details">History details</label>
                                        <textarea name="history_details" wire:model.defer="history_details"
                                            id="history_details" class="form-control" autocomplete="off"
                                            placeholder="Enter history detail" rows="7"></textarea>
                                        @error('history_details')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-2 form-group">
                                    <button class="btn btn-primary btn-lg" type="button"
                                        wire:click="medTab">Next</button>
                                    <button class="btn btn-dark btn-lg" type="button"
                                        wire:click="patTab">Previous</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade @if($active_tab == 3) show active @endif" id="dm" role="tabpanel"
                    aria-labelledby="dm-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="iq-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3 mb-2">
                                            <label for="disease">Disease</label>
                                            <select name="disease" wire:model.lazy="disease" id="disease"
                                                wire:change="getMeds" class="form-control">
                                                <option value="">Select</option>
                                                @foreach ($diseases as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('disease')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-7 mb-2">
                                            <div class="form-control" placeholder="Medicine" style="height: 80px;overflow: auto;" onclick="myFunction()">
                                                @foreach ($medList as $key =>$item)
                                                <span class="badge badge-primary">{{ $item['name'] }} <a href="#" wire:click.prevent="delMed({{ $key }})"><i class="ri-close-line text-danger lead"></i></a></span>
                                                @endforeach
                                            </div>
                                            <div class="dropdown">
                                                {{-- <button onclick="myFunction()" type="button" class="btn btn-success">Dropdown</button> --}}
                                                <div id="myDropdown" class="dropdown-content">
                                                    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                                                        <a href="#">----Related----</a>
                                                        @foreach ($medicines as $item)
                                                            <a href="#" onclick="callMed({{ $item->medicines->id }})">{{ $item->medicines->name }} {{ $item->medicines->unit }}</a>
                                                        @endforeach
                                                        <a href="#">----All----</a>
                                                        @php
                                                            $allMed='App\Models\Medicine'::all()->sortBy('name');
                                                        @endphp
                                                        @foreach ($allMed as $item)
                                                            <a href="#" onclick="callMed({{ $item->id }})">{{ $item->name }} {{ $item->unit }}</a>
                                                        @endforeach
                                                </div>
                                            </div>
                            
                                        </div>
                                        <div class="form-group mb-2 col-md-2">
                                            <label for="">&nbsp;</label><br>
                                            <button class="btn btn-info btn-lg" type="button" wire:click="addMedList"><i class="ri-add-line"></i> Add</button>
                                            {{-- <button class="btn btn-info btn-lg" type="button" wire:click="checkdata"><i class="ri-add-line"></i> Checkdata</button> --}}
                                        </div>
                                        <div class="form-group mb-3 col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Disease</th>
                                                            <th>Medicine</th>
                                                            <th>Quantity</th>
                                                            <th>Unit</th>
                                                            <th>Rate/Unit</th>
                                                            <th>Total Doses</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($checkupItemList!=null)
                                                            @foreach ($checkupItemList as $item)
                                                            <tr>
                                                                <td>{{ $item->diseases->name}}</td>
                                                                <td>{{ $item->meds->name}}</td>
                                                                <td contenteditable="true" onkeyup="getqty(this.innerText,{{ $item->id }})">{{ $item->qty}}</td>

                                                                <td>{{ $item->unit}}</td>
                                                                <td>{{ $item->meds->price}}</td>
                                                                <td contenteditable="true" onkeyup="getdoses(this.innerText,{{ $item->id }})">{{ $item->doses}}</td>
                                                                <td><a href="#" wire:click.prevent="delMedItem({{ $item->id }})"><i class="ri-delete-bin-2-line text-danger lead text-center" ></i></a></td>
                                                            </tr>
                                                        @endforeach
                                                        @include('include.messages')
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2 mb-2">
                                            <label for="consulting_charges">Consulting</label>
                                            <input step="1" type="number" wire:change="saveconCharge" name="consulting_charges"
                                                id="consulting_charges" wire:model.defer="consulting_charges"
                                                placeholder="Charges" class="form-control">
                                            @error('consulting_charges')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-2 mb-2">
                                            <label for="medicine_charges">Medicine</label>
                                            <input step="0.01" readonly type="number" name="medicine_charges"
                                                id="medicine_charges" wire:model.defer="medicine_charges"
                                                placeholder="Charges" class="form-control">
                                            @error('medicine_charges')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-2 mb-2">
                                            <label for="total_charges">Total</label>
                                            <input step="0.01" readonly type="number" name="total_charges" id="total_charges"
                                                wire:model.defer="total_charges" placeholder="Charges"
                                                class="form-control">
                                            @error('total_charges')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-2 mb-2">
                                            <label for="medicine_for_days">Medicine for days</label>
                                            <input step="0.01" type="number" wire:change="saveMFD" name="medicine_for_days"
                                                id="medicine_for_days" wire:model.lazy="medicine_for_days"
                                                placeholder="For days" class="form-control">
                                            @error('medicine_for_days')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label for="next_appointment">Next Appointment</label>
                                            <input type="date" name="next_appointment" id="next_appointment"
                                                wire:model.defer="next_appointment" placeholder="Charges"
                                                class="form-control">
                                            @error('next_appointment')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <label for="test">Test to be done</label>
                                            <div class="form-control" onclick="myFunction2()" style="height: 50px;overflow: auto;">
                                                @foreach ($checkupTestList as $item)
                                                    <span class="badge badge-primary">{{ $item->tests->name }} <a href="#" wire:click.prevent="delTest({{ $item->id }})"><i class="ri-close-line text-danger lead"></i></a></span>
                                                @endforeach
                                            </div>
                                            <div class="dropdown">
                                                <div id="myDropdown2" class="dropdown-content">
                                                    <input type="text" placeholder="Search.." id="myInput2" onkeyup="filterFunction2()">
                                                        @foreach ($tests as $item)
                                                        <a href="#" wire:click.prevent="addTest({{ $item->id }})">{{ $item->name }}</a>
                                                        @endforeach
                                                </div>
                                            </div>
                                            {{-- <select name="test" wire:model.defer="test" id="test" class="form-control">
                                                <option value="">Select</option>
                                                @foreach ($tests as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select> --}}
                                            @error('test')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-2 mb-2">
                                            <label for="payment_mode">Payment mode</label>
                                            <select name="payment_mode" wire:model.defer="payment_mode"
                                                id="payment_mode" class="form-control">
                                                <option value="">Select</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Credit">Credit</option>
                                            </select>
                                            @error('payment_mode')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label for="attach_report">Attach report</label>
                                            <input type="file" name="attach_report" id="attach_report"
                                                wire:model.defer="attach_report" multiple
                                                class="form-control-file">
                                            @error('attach_report')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12 mb-3">
                                            <button type="submit" class="btn btn-primary btn-lg"><i
                                                    class="ri-save-line"></i> Save</button>
                                            <button class="btn btn-dark btn-lg" type="button"
                                                wire:click="caseTab">Previous</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-md-4">
                        <div class="iq-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="consulting_charges">Consulting</label>
                                        <input step="0.01" type="number" name="consulting_charges" id="consulting_charges" wire:model.defer="consulting_charges" placeholder="Charges" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="medicine_charges">Medicine</label>
                                        <input step="0.01" type="number" name="medicine_charges" id="medicine_charges" wire:model.defer="medicine_charges" placeholder="Charges" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endif

    @if ($pageid == 1)
    <div class="col-md-12">
        <div class="iq-card">
            <div class="card-body">
                <h4><a href="#" class="text-danger" wire:click.prevent="changePage(0)"><small><i
                                class="ri-arrow-left-line"></i> Go back</a></small><br>New patient</h4>
                <form wire:submit.prevent="createPatient" class="row">
                    <div class="form-group col-md-3 mb-2">
                        <label for="name_of_patient">Name</label>
                        <input type="text" name="name_of_patient" wire:model.defer="name_of_patient"
                            placeholder="Full name of the patient" id="name_of_patient" class="form-control"
                            autocomplete="off">
                        @error('name_of_patient')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-9 mb-2">
                        <label for="address_of_patient">Address</label>
                        <input type="text" name="address_of_patient" wire:model.defer="address_of_patient"
                            placeholder="Address of the patient" id="address_of_patient" class="form-control"
                            autocomplete="off">
                        @error('address_of_patient')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-2 mb-2">
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
                    <div class="form-group col-md-3 mb-2">
                        <label for="contact_of_patient">Contact</label>
                        <input type="text" name="contact_of_patient" wire:model.defer="contact_of_patient"
                            placeholder="Contact of the patient" id="contact_of_patient" class="form-control"
                            autocomplete="off">
                        @error('contact_of_patient')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <label for="email_of_patient">Email (Optional)</label>
                        <input type="email" name="email_of_patient" wire:model.defer="email_of_patient"
                            placeholder="Email of the patient" id="email_of_patient" class="form-control"
                            autocomplete="off">
                        @error('email_of_patient')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <label for="dob_of_patient">Date of birth</label>
                        <input type="date" name="dob_of_patient" wire:model.lazy="dob_of_patient" wire:change="getAge"
                            placeholder="Address of the patient" id="dob_of_patient" class="form-control"
                            autocomplete="off">
                        @error('dob_of_patient')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-1 mb-2">
                        <label for="age_of_patient">Age</label>
                        <input type="number" name="age_of_patient" readonly tabindex="-1"
                            wire:model.defer="age_of_patient" placeholder="Age" id="age_of_patient" class="form-control"
                            autocomplete="off">
                        @error('age_of_patient')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-9 mb-2">
                        <label for="allergy_of_patient">Allergy (If any)</label>
                        <input type="text" name="allergy_of_patient" wire:model.defer="allergy_of_patient"
                            placeholder="Allergy (If any)" id="allergy_of_patient" class="form-control"
                            autocomplete="off">
                        @error('allergy_of_patient')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-9 mb-2">
                        <label for="balance_of_patient">Balance</label>
                        <input type="text" name="balance_of_patient" wire:model.defer="balance_of_patient"
                            placeholder="Balance amount of patient" id="balance_of_patient" class="form-control"
                            autocomplete="off">
                        @error('balance_of_patient')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <label for="image_of_patient">Image (Optional)</label>
                        <input type="file" name="image_of_patient" wire:model.defer="image_of_patient"
                            id="image_of_patient" class="form-control-file" autocomplete="off">
                        @error('image_of_patient')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mb-2">
                        <button type="submit" class="btn btn-primary"><i class="ri-save-line"></i> Save</button>
                        <a href="#" class="btn btn-danger" wire:click.prevent="changePage(0)"><i
                                class="ri-arrow-left-line"></i> Go back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
