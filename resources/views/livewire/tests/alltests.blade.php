<div class="row">
    <div class="col-md-12">
        @include('include.messages')
    </div>

    <div class="col-md-4">
        <div class="iq-card">
            <div class="card-body">
                <h4>New test's details</h4>
                <form wire:submit.prevent="create" class="row">
                    <input type="hidden" name="val_id" id="val_id" wire:model.defer="val_id">
                    <div class="form-group col-md-12 mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" wire:model.defer="name" placeholder="Name of the test" autocomplete="off" id="name" class="form-control">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
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

    <div class="col-md-8">
        <div class="iq-card">
            <div class="card-body">
                <h4>Tests dataset</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
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
