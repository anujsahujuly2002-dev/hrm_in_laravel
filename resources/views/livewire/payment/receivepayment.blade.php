<div>
    <div class="row">
        <div class="col-sm-8">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Operations</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table mb-0 table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Patient Name </th>
                            <th scope="col">Amount</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->patients->name }}</td>
                            <td>₹{{ $item->total_charges }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="#" wire:click="meds({{ $item->id }})" class="btn btn-outline-primary"><i class="ri-capsule-line"></i> Meds</a>
                                    <a href="#" wire:click="pay({{ $item->id }})" class="btn btn-outline-danger"><i class="ri-wallet-3-line"></i> Payment</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">{{ $header }}</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <h4>{{ $pname }}</h4>
                @if ($header=='Meds')
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>Medicine</td>
                            <td>Qty</td>
                            <td>Doses</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($medList)
                            @foreach ($medList as $item)
                                <tr>
                                    <td>{{ $item->meds->code }}</td>
                                    <td>{{ $item->qty }} {{ $item->unit }}</td>
                                    <td>{{ $item->doses }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                @endif

                @if ($header=='Payment')
                    <div class="form-group mb-3">
                        <label for="conCH">Consulting Charges</label>
                        <input type="text" class="form-control mb-0" wire:defer="conCH" readonly id="conCH" name="conCH"
                            wire:model.defer="conCH">
                    </div>
                    <div class="form-group mb-3">
                        <label for="medCH">Medicine Charges</label>
                        <input type="text" class="form-control mb-0" wire:defer="medCH" readonly id="medCH" name="medCH"
                            wire:model.defer="medCH">
                    </div>
                    <div class="form-group mb-3">
                        <label for="amount">Amount Received</label>
                        <input type="text" class="form-control mb-0" wire:defer="amount" id="amount" name="amount"
                            wire:model.defer="amount">
                    </div>
                    <a href="#" wire:click="savePay" class="btn btn-primary d-block mt-3"><i class="ri-money-dollar-box-line"></i> Receive Payment </a>
                @endif
            </div>
            </div>
        </div>
    </div>
</div>
