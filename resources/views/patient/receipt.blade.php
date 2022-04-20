@extends('layouts.main')
@section('content')
<div>
    <div class="row">
        <div class="col-md-12">
            @include('include.messages')
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="iq-card">
                <div id="printDiv" >
                    <br>
                    <center>
                        <img src="{{ asset('assets/images/logo.png') }}" alt="" style="width: 100px">
                    </center>
                    <div class="col-md-12 align-self-center text-center">
                        <h4>Patient Manager</h4>
                        <h5>Patient Bill</h5>
                    </div>
                    <div class="text-dark">
                        <div class="row">
                            <div class="col-sm-1">
                            </div>
                            <div class="col-sm-10">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><b>Patient Name : </b></td>
                                            <td><b>Bill Date: </b> </td>
                                        </tr>
                                        <tr>
                                            <td><b>Age: </b></td>
                                            <td><b>Bill No: </b></td>
                                        </tr>
                                        <tr>
                                            <td><b>Sex: </b></td>
                                        </tr>
                                        <tr>
                                            <td><b>Doctor: </b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>Address: </b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px">Sr.No.</th>
                                            <th>Procedure</th>
                                            <th>Qty.</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Consultation</td>
                                            <td style="width: 100px">100</td>
                                            <td style="width: 100px">100</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Total Amount:</td>
                                            <td style="width: 100px">100</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="text-right">
                                                <b>Cashier</b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <center><button class="btn btn-primary btn-sm" onclick="printDiv('printDiv')" type="button">Print</button></center>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            document.body.style.fontSize = "x-large";
            window.print();
            document.body.style.fontSize = "14px";
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
