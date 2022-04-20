<div class="row">
    <div class="col-md-3">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Today</h4>
                </div>
            </div>
            <div class="iq-card-body">
               @if ($todaysApo)
                    @foreach ($todaysApo as $item)
                    <ul class="list-inline m-0 p-0">
                    <li>
                        <h5 class="float-left mb-1">{{ $item->patients->name }}</h5>
                        <div class="d-inline-block w-100">
                            <p>
                                <span class="text-muted">Last visit:</span> <span class="badge badge-primary">{{ $item->checkups->date }} </span>
                            </p>
                        </div>
                    </li>
                    </ul>
                    @endforeach
               @endif
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Tomorrow</h4>
                </div>
            </div>
            <div class="iq-card-body">
                @if ($tomorrowApo)
                @foreach ($tomorrowApo as $item)
                    <ul class="list-inline m-0 p-0">
                    <li>
                        <h5 class="float-left mb-1">{{ $item->patients->name }}</h5>
                        <div class="d-inline-block w-100">
                            <p>
                                <span class="text-muted">Last visit:</span> <span class="badge badge-primary">{{ $item->checkups->date }} </span>
                            </p>
                        </div>
                    </li>
                </ul>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">The day after</h4>
                </div>
            </div>
            <div class="iq-card-body">
                @if ($dayafterApo)
                @foreach ($dayafterApo as $item)
                    <ul class="list-inline m-0 p-0">
                    <li>
                        <h5 class="float-left mb-1">{{ $item->patients->name }}</h5>
                        <div class="d-inline-block w-100">
                            <p>
                                <span class="text-muted">Last visit:</span> <span class="badge badge-primary">{{ $item->checkups->date }} </span>
                            </p>
                        </div>
                    </li>
                </ul>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
