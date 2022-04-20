@extends('layouts.main')
@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="iq-card">
                    <div class="card-body">
                        <h5><a href="{{ route('reports.report','Patient Fees Details') }}">Patient Fees Details</a></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="iq-card">
                    <div class="card-body">
                        <h5><a href="{{ route('reports.report','Patient History Report') }}">Patient History Report</a></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="iq-card">
                    <div class="card-body">
                        <h5><a href="{{ route('reports.report','Patient ID Report') }}">Patient ID Report</a></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="iq-card">
                    <div class="card-body">
                        <h5><a href="{{ route('reports.report','Patient Appointment Report') }}">Patient Appointment Report</a></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="iq-card">
                    <div class="card-body">
                        <h5><a href="{{ route('reports.report','Patient Phonebook') }}">Patient Phonebook</a></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="iq-card">
                    <div class="card-body">
                        <h5><a href="{{ route('reports.report','Daily Patient Checkups') }}">Daily Patient Checkups</a></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="iq-card">
                    <div class="card-body">
                        <h5><a href="{{ route('reports.report','Daily Income Report') }}">Daily Income Report</a></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="iq-card">
                    <div class="card-body">
                        <h5><a href="{{ route('reports.report','Patientwise Details Fees Report') }}">Patientwise Details Fees Report</a></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="iq-card">
                    <div class="card-body">
                        <h5><a href="{{ route('reports.report','Credit List Report') }}">Credit List Report</a></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="iq-card">
                    <div class="card-body">
                        <h5><a href="{{ route('reports.report','Medicine Profit Report') }}">Medicine Profit Report</a></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="iq-card">
                    <div class="card-body">
                        <h5><a href="{{ route('reports.report','Medicine Stock Report') }}">Medicine Stock Report</a></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="iq-card">
                    <div class="card-body">
                        <h5><a href="{{ route('reports.report','Added Appointment Report') }}">Added Appointment Report</a></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="iq-card">
                    <div class="card-body">
                        <h5><a href="{{ route('reports.report','Purchase Report') }}">Purchase Report</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
