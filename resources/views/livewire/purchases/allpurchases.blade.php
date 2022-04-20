<div class="row mt-3">
    <div class="col-md-12">
        @include('include.messages')
    </div>

    <div class="col-md-12">
        <div class="iq-card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Dealer</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Remain</th>
                                <th>Items</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->dealers->name }}</td>
                                <td>₹{{ $item->total }}</td>
                                <td>₹{{ $item->paid }}</td>
                                <td>₹{{ $item->remain }}</td>
                                <td>
                                    @foreach ($item->pitems as $itemp)
                                    {{ $itemp->medicines->name }} - Qty. {{ $itemp->qty }}<br>
                                    @endforeach
                                </td>
                                <td>{{ "Carbon\Carbon"::parse($item->date)->format('d-m-Y') }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
