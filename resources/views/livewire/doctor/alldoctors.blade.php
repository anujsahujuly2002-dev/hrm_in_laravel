<div class="row">
    <div class="col-md-12 mt-2">
        @include('include.messages')
    </div>

    <div class="col-md-12">
        <div class="row">
            @foreach ($doctors as $item)
            <div class="col-md-3 mb-3">
                <div class="iq-card">
                    <div class="iq-card-body text-center">
                        <div class="doc-profile">
                            @if ($item->image)
                            <img class="rounded-circle img-fluid avatar-80" src="{{url('public/storage/doctor/'.$item->image)}}" alt="profile">
                            @else
                            <img class="rounded-circle img-fluid avatar-80" src="{{ asset('assets/images/user/12.jpg') }}" alt="profile">
                            @endif
                        </div>
                        <div class="iq-doc-info mt-3">
                            <h4>Dr. {{ $item->name }}</h4>
                            <p class="mb-0" >{{ $item->department }}</p>
                            <a href="tel:{{ $item->contact }}">{{ $item->contact }}</a>
                        </div>
                        <div class="iq-doc-description mt-2" style="height: 100px;overflow-y: scroll">
                            <p>
                                {{ $item->address }}
                            </p>
                        </div>
                        <hr>
                        {{-- <div class="iq-doc-social-info mt-3 mb-3">
                            <ul class="m-0 p-0 list-inline">
                                <li><a href="mailto:{{ $item->email }}" title="Email to {{ $item->email }}"><i class="ri-mail-fill"></i></a></li>
                            </ul>
                        </div> --}}
                        <a href="mailto:{{ $item->email }}" title="Email to {{ $item->email }}" class="btn btn-warning"><i class="ri-mail-fill"></i> Email</a>
                        @if (Auth::user()->role == 1)
                        <a href="{{ route('doctor.create') }}?doctor_id={{ $item->id }}" class="btn btn-primary"><i class="ri-edit-line"></i> Edit</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
