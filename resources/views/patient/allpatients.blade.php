@extends('layouts.main')
@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <a href="{{ route('patient.create') }}" class="btn btn-primary btn-lg"><i class="ri-add-line"></i> New patient</a>
    </div>
</div>
@livewire('patient.allpatients')
@endsection
