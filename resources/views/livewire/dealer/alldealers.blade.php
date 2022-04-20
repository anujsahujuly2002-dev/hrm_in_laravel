<div class="row">
    <div class="col-md-12">
        @include('include.messages')
    </div>

    <div class="col-md-4">
        <div class="iq-card">
            <div class="card-body">
                <h4>New dealer</h4>
                <form wire:submit.prevent="create">
                    <input type="hidden" name="val_id" id="val_id" wire:model.defer="val_id">
                    <div class="form-group mb-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" wire:model.defer="name" placeholder="Name of the dealer" id="name" autocomplete="off" class="form-control">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="contact">Contact</label>
                        <input type="number" name="contact" wire:model.defer="contact" placeholder="Contact of the dealer" id="contact" autocomplete="off" class="form-control">
                        @error('contact')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="address">Address</label>
                        <textarea name="address" wire:model.defer="address" placeholder="Address of the dealer" id="address" autocomplete="off" class="form-control"></textarea>
                        @error('address')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    @if ($val_id == null)
                    <div class="form-group mb-2">
                        <label for="open_balance">Open balance</label>
                        <input type="number" step="0.01" name="open_balance" wire:model.defer="open_balance" placeholder="Open balance of the dealer" id="open_balance" autocomplete="off" class="form-control">
                        @error('open_balance')
                        <small class="text-danger">{{ $message }}</small><br>
                        @enderror
                        <span class="text-info">0 if dealer is new. Place minus (-) if in DEBT.</span>
                    </div>
                    @endif
                    <div class="form-group mb-2">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="ri-save-line"></i> Save</button>
                        @if ($val_id != null)
                        <button type="button" wire:click="cancel" class="btn btn-danger btn-lg"><i class="ri-close-line"></i> Cancel</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="iq-card">
            <div class="card-body">
                <h4>Dealers dataset</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Balance</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->contact }}</td>
                                <td>{{ $item->address }}</td>
                                <td>₹{{ $item->current_balance }}</td>
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
</div>
