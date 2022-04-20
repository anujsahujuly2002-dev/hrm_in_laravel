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
                        <input type="text" class="form-control mb-0" id="username" name="username"
                            wire:model.defer="username" placeholder="Create a username">
                        @error('username')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control mb-0" id="name" name="name" wire:model.defer="name"
                            placeholder="Full name of user">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 mb-3">
                        <label for="role">Role</label>
                        <select name="role" id="role" wire:model.defer="role" class="form-control">
                            <option value="">Select</option>
                            <option value="1">Admin</option>
                            <option value="2">Doctor</option>
                            <option value="6">Front Desk</option>
                        </select>
                        @error('role')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 mb-3">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control mb-0" id="email" name="email" wire:model.defer="email"
                            placeholder="Enter email">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control mb-0" id="password" name="password"
                            wire:model.defer="password" placeholder="Password">
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        @if ($userData)
                            <a href="#" wire:click="update" class="btn btn-warning btn-lg"><i class="ri-arrow-up-line"></i> Update</a>
                            <a href="#" wire:click="goBack" class="btn btn-danger btn-lg"><i class="ri-arrow-left-line"></i> Clear</a>
                        @else
                            <button type="submit" class="btn btn-primary btn-lg"><i class="ri-add-line"></i> Add</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="iq-card">
            <div class="card-body">
                <h4>Users</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Name</th>
                                <th>User name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr class="text-center">
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->roles->name }}</td>
                                <td>
                                    <a href="#" wire:click.prevent="edit({{ $item->id }})" class="btn btn-info"><i
                                            class="ri-edit-line"></i> Edit</a>
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
