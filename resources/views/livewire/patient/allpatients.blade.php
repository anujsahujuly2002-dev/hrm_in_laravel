<div class="row">
    <div class="col-md-12">
        @include('include.messages')
    </div>

    <div class="col-md-12">
        <div class="iq-card">
            <div class="card-body">
                <div class="mb-3">
                    <input type="text" name="search" wire:model.debounce.300ms="search" placeholder="Search with name or contact" autocomplete="off" id="search" class="form-control w-25">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Gender</th>
                                <th>DOB</th>
                                <th>Address</th>
                                <th>Balance</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data) > 0)
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    @if ($item->image && $item->image != 'default.png')
                                        <img class="rounded-circle img-fluid avatar-40" src="{{ asset('storage/patients/') }}/{{ $item->image }}" alt="profile">
                                    @elseif($item->image == 'default.png')
                                        <img class="rounded-circle img-fluid avatar-40" src="{{ asset('assets/images/user/12.jpg') }}" alt="profile">
                                    @endif
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->contact }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>{{ "Carbon\Carbon"::parse($item->dob)->format('d-m-Y') }}<br><small class="text-muted">Age: {{ "Carbon\Carbon"::parse($item->dob)->age }} yrs</small></td>
                                <td>{{ $item->address }}</td>
                                <td>₹{{ $item->balance }}</td>
                                <td>
                                    @if (Auth::user()->role == 1)
                                    <a href="{{ route('patient.create') }}?patient_id={{ $item->id }}" class="btn btn-primary btn-sm"><i class="ri-edit-line"></i> Edit</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td class="text-center" colspan="9">No data found.</td>
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
