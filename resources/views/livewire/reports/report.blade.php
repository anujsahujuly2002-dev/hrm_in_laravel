<div class="row">
    <div class="col-md-12">
        @include('include.messages')
    </div>
    <div class="col-md-12">
        <div class="iq-card">
            <div class="card-body">
{{ $url }}
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
                            <tr>
                                <td class="text-center" colspan="9">No data found.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{-- {{ $data->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
