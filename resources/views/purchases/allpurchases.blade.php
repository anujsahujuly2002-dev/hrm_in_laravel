@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('purchase.new') }}" class="btn btn-primary btn-lg"><i class="ri-add-line"></i> New purchase</a>
    </div>
</div>

@livewire('purchases.allpurchases')
@endsection
