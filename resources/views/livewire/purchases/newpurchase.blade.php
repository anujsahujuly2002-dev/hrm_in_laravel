<div class="row">
    <div class="col-md-12">
        @include('include.messages')
    </div>

    <div class="col-md-12">
        <div class="iq-card">
            <div class="card-body">
                <div class="row">
                    <div class="form-group mb-2 col-md-3">
                        <label for="purchase_id">Purchase ID</label>
                        <input type="purchase_id" name="purchase_id" readonly wire:model.defer="purchase_id" id="purchase_id" class="form-control">
                        @error('purchase_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-2 col-md-4">
                        <label for="dealer">Dealer</label>
                        <select name="dealer" wire:model="dealer" id="dealer" wire:change="getDealer" class="form-control">
                            <option value="">Select</option>
                            @foreach ($dealers as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('dealer')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        @if ($dealer_data)
                        <div>
                            <span class="text-info">{{ $dealer_data->address }}</span><br>
                            <span class="badge badge-info">₹{{ $dealer_data->current_balance }}</span>
                        </div>
                        @endif
                    </div>
                    <div class="form-group mb-2 col-md-3">
                        <label for="date">Date</label>
                        <input type="date" name="date" wire:model.defer="date" id="date" class="form-control">
                        @error('date')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="iq-card">
            <div class="card-body">
                <form wire:submit.prevent="addItems({{ $purchase_id }})" class="row">
                    <div class="form-group mb-2 col-md-2">
                        <label for="medicine_type">Type</label>
                        <select name="medicine_type" wire:model="medicine_type" wire:change="getMeds" id="medicine_type" class="form-control">
                            <option value="">Select</option>
                            <option value="Liquid">Liquid</option>
                            <option value="Tablet">Tablet</option>
                            <option value="Capsules">Capsules</option>
                            <option value="Topical">Topical (Creams, lotions or ointments)</option>
                            <option value="Suppositories">Suppositories</option>
                            <option value="Drops">Drops</option>
                            <option value="Inhalers">Inhalers</option>
                            <option value="Injections">Injections</option>
                            <option value="Implants or patches">Implants or patches</option>
                            <option value="Buccal">Buccal</option>
                            <option value="Sublingual">Sublingual</option>
                            <option value="Other">Other</option>
                        </select>
                        @error('medicine_type')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-2 mb-2">
                        <label for="medicine">Medicine</label>
                        <select name="medicine" wire:model.defer="medicine" id="medicine" class="form-control">
                            <option value="">Select</option>
                            @foreach ($meds as $item)
                            <option value="{{ $item->id }}">{{ $item->code }} </option>
                            @endforeach
                        </select>
                        @error('medicine')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-2 mb-2">
                        <label for="quantity">Quantity</label>
                        <input type="number" step="0.01" name="quantity" wire:model.defer="quantity" id="quantity" class="form-control" placeholder="Quantity" autocomplete="off">
                        @error('quantity')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-2 mb-2">
                        <label for="unit">Unit</label>
                        <input type="text" name="unit" wire:model.defer="unit" id="unit" class="form-control" placeholder="Unit" autocomplete="off">
                        @error('unit')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-2 mb-2">
                        <label for="total">Total</label>
                        <input type="number" step="0.01" name="total" wire:model.defer="total" id="total" class="form-control" placeholder="Total" autocomplete="off">
                        @error('total')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-2 col-md-2">
                        <label for="">&nbsp;</label><br>
                        <button class="btn btn-info btn-lg"><i class="ri-add-line"></i> Add</button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Medicine</th>
                                <th>Quantity</th>
                                <th>Unit</th>
                                <th>Total</th>
                                <th>Rate/Unit</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->medicines->med_type }}</td>
                                <td>{{ $item->medicines->name }} {{ $item->medicines->unit }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->unit }}</td>
                                <td>₹{{ $item->rate }}</td>
                                <td>₹{{ $item->price_per_unit }}</td>
                                <td>
                                    <a href="#" wire:click.prevent="delete({{ $item->id }})" class="btn btn-danger btn-sm"><i class="ri-delete-bin-line"></i> Remove</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="iq-card">
            <div class="card-body">
                <form wire:submit.prevent="submit({{ $purchase_id }})" class="row">
                    <div class="col-md-3 form-group mb-2">
                        <label for="total_amount">Total amount</label>
                        <input type="number" step="0.01" name="total_amount" readonly wire:model.defer="total_amount" id="total_amount" class="form-control" placeholder="Total amount" autocomplete="off">
                        @error('total_amount')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group mb-2">
                        <label for="paid_amount">Paid amount</label>
                        <input type="number" step="0.01" name="paid_amount" wire:model.lazy="paid_amount" wire:change="getBal" id="paid_amount" class="form-control" placeholder="Paid amount" autocomplete="off">
                        @error('paid_amount')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group mb-2">
                        <label for="balanced_amount">Balanced amount</label>
                        <input type="number" step="0.01" name="balanced_amount" readonly wire:model.defer="balanced_amount" id="balanced_amount" class="form-control" placeholder="Balanced amount" autocomplete="off">
                        @error('balanced_amount')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-2 col-md-2">
                        <label for="">&nbsp;</label><br>
                        <button class="btn btn-info btn-lg"><i class="ri-save-line"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
