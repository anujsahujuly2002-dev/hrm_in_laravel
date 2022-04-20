@extends('layouts.main')
@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <a href="{{ route('doctor.create') }}" class="btn btn-primary btn-lg"><i class="ri-add-line"></i> Add doctor</a>
    </div>
</div>

@livewire('doctor.alldoctors')
@endsection
