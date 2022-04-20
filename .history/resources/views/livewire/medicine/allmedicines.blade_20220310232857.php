<div class="row">
    <div class="col-md-12">
        @include('include.messages')
    </div>

    <div class="col-md-4">
        <div class="iq-card">
            <div class="card-body">
                <h4>New medicine details</h4>
                <form wire:submit.prevent="create" class="row">
                    <input type="hidden" name="val_id" id="val_id" wire:model.defer="val_id">
                    <div class="form-group col-md-12 mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" wire:model.defer="name" placeholder="Name of the medicine" autocomplete="off" id="name" class="form-control">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="code">Code</label>
                        <input type="text" name="code" wire:model.defer="code" placeholder="Code of the medicine" autocomplete="off" id="code" class="form-control">
                        @error('code')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="potency">Potency</label>
                        <input type="text" name="potency" wire:model.defer="potency" placeholder="Potency of the medicine" autocomplete="off" id="potency" class="form-control">
                        @error('potency')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="medicine_type">Type</label>
                        <select name="medicine_type" wire:model.defer="medicine_type" id="medicine_type" class="form-control">
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
                    <div class="form-group col-md-12 mb-3">
                        <label for="stock">Stock</label>
                        <input type="number" step="0.01" name="stock" wire:model.defer="stock" placeholder="Available stock of the medicine" autocomplete="off" id="stock" class="form-control">
                        @error('stock')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="rate">Rate of purchase </label>
                        <input type="number" step="0.01" name="rate" wire:model.defer="rate" placeholder="Sell rate per unit" autocomplete="off" id="rate" class="form-control">
                        @error('rate')
                        <small class="text-danger">{{ $message }}</small><br>
                        @enderror
                        <span class="text-info">Sell rate will always change as per last purchase data.</span>
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="rate">Rate of selling</label>
                        <input type="number" step="0.01" name="rateselling" wire:model.defer="rateselling" placeholder="Sell rate per unit" autocomplete="off" id="rate" class="form-control">
                        @error('rateselling')
                        <small class="text-danger">{{ $message }}</small><br>
                        @enderror
                        <span class="text-info">Sell rate will always change as per last purchase data.</span>
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="ri-save-line"></i> Save</button>
                        @if ($val_id != null)
                        <button type="button" wire:click="cancel" class="btn btn-danger btn-lg"><i class="ri-close-line"></i> Cancel</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

   @if ($pageId==0)
    <div class="col-md-8">
        <div class="iq-card">
            <div class="card-body">
                <h4>Medicine dataset</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Potency</th>
                                <th>Type</th>
                                <th>Stock</th>
                                <th>Rate Purchase</th>
                                <th>Rate Of selling</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr class="text-center">
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->unit }}</td>
                                <td>{{ $item->med_type }}</td>
                                <td><a href="#" wire:click="medStock({{ $item->id }})">{{ $item->stock }}</a></td>
                                <td>₹{{ $item->price }}</td>
                                <td>{{}}</td>
                                <td>
                                    @if (Auth::user()->role == 1)
                                    <a href="#" wire:click.prevent="edit({{ $item->id }})" class="btn btn-info"><i class="ri-edit-line"></i> Edit</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-2">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
   @endif

   @if($pageId==1)
   <div class="col-md-8">
        <div class="iq-card">
            <div class="card-body">
                <button type="button" wire:click="goBack" class="btn btn-danger btn-lg"><i class="ri-arrow-go-back-line"></i> Back</button>
                <h4>Stock dataset</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Purchase Date</th>
                                <th>Purchase Rate</th>
                                <th>Open Stock</th>
                                <th>Sold Stock</th>
                                <th>Remain Stock</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medStockList as $item)
                            <tr class="text-center">
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->purchase_rate }}</td>
                                <td>{{ $item->open_stock }}</td>
                                <td>{{ $item->sold_stock }}</td>
                                <td>{{ $item->remain_stock }}</td>
                                @if ($item->status=='Sold')
                                <td>
                                    <h4><span class="badge badge-danger">{{ $item->status }}</span></h4>
                                </td>
                                @endif
                                @if ($item->status=='Pending')
                                <td>
                                    <h4><span class="badge badge-warning">{{ $item->status }}</span></h4>
                                </td>
                                @endif
                                @if ($item->status=='Active')
                                <td>
                                    <h4><span class="badge badge-success">{{ $item->status }}</span></h4>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-2">
                    {{ $medStockList->links() }}
                </div>
            </div>
        </div>
    </div>
   @endif
</div>
