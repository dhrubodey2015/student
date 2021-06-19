@extends('layouts.user_master')
@section('pageTitle','Student Management | Customer Profile')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row d-flex justify-content-center">
                <!-- <div class="col-md-3 col-12">
                    <img src="{{ asset('newTheme/media/users/300_21.jpg') }}" width="100%" alt="image"/>
                </div> -->
                <div class="col-md-4 col-12 pl-5">
                    <div class="row">
                        <div class="col-md-12 p-5">
                            <a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">Customer
                                Profile</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 p-2">
                            <a href="#"
                               class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                <i class="far fa-user"></i> &nbsp;{{ Auth::user()->name }}</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 p-2">
                            <a href="#"
                               class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                <i class="fas fa-phone"></i> {{ !empty($profile->phone) ? $profile->phone : '' }}
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 p-2">
                            <a href="#"
                               class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                <i class="fa fa-envelope"></i> {{ Auth::user()->email }}</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 p-2">
                            <a href="#"
                               class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                <i class="fa fa-home"></i> {{ !empty($profile->address) ? $profile->address : '' }}
                            </a>
                        </div>
                    </div>
                </div>
                 <div class="col-md-5 col-12 pl-1">

                    <div class="row">
                        <div class="col-md-12 p-5">
                            <a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">Bank
                                Details</a>
                        </div>
                        <div class="col-md-12 p-2">
                            <table class="table table-hover datatable datatable-bordered datatable-head-custom">

                                <tbody>
                                <tr>
                                    <th>Bank Name:</th>
                                    <td>{{ !empty($profile->bank_name) ? $profile->bank_name : '' }}</td>
                                </tr>
                                <tr>
                                    <th>Account Number:</th>
                                    <td>{{ !empty($profile->bank_ac_no) ? $profile->bank_ac_no : '' }}</td>
                                </tr>
                                <tr>
                                    <th>IFSC Code:</th>
                                    <td>{{ !empty($profile->bank_ifsc_code) ? $profile->bank_ifsc_code : '' }}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>Policies</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="accordion">
                        @if(!$policy->isEmpty())
                            @foreach($policy as $key => $item)
                                <div class="card">
                                    <div style="background-color: #1e1e2d; padding: 1rem 1rem;"
                                         class="card-header text-white" id="heading{{$key}}" data-toggle="collapse"
                                         data-target="#collapse{{$key}}" aria-expanded="true"
                                         aria-controls="collapseOne">
                                        <div class="row">
                                            <div class="col-md-11 col-10">
                                                <h5>{{$item->name}}</h5>
                                            </div>
                                            <div class="col-md-1 col-2 text-white text-right">
                                                <i class="fa fa-arrow-down"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="collapse{{$key}}" class="collapse show" aria-labelledby="heading{{$key}}"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <table class="table-responsive table table-hover datatable datatable-bordered datatable-head-custom"
                                                   id="profilePolicyTable">
                                                <thead>
                                                <tr>
                                                    <!-- <th>Identifier</th> -->
                                                    <th>Invested Amount</th>
                                                    <th>ROI</th>
                                                    <th>Maturity Amount</th>
                                                    <th>Interest Rate</th>
                                                    <th>Date of Invesment</th>
                                                    <th>Date of Payment</th>
                                                    <th>Maturity Date</th>
                                                    <th>Status</th>
                                                    <th>Certificate</th>
                                                    <th>Invoice</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <!-- <td>{{$item->identifier}}</td> -->
                                                    <td>{{$item->amount}}</td>
                                                    <td>{{$item->roi}}</td>
                                                    <td>{{$item->maturity_amount}}</td>
                                                    <td>{{$item->interest_rate}}</td>
                                                    <td>{{date('d-M-Y', strtotime($item->generation_date))}}</td>
                                                    <td>{{date('d-M-Y', strtotime($item->payment_date))}}</td>
                                                    <td>{{date('d-M-Y', strtotime($item->maturity_date))}}</td>
                                                    <td><?php echo($item->policy_status==0)? '<p class="badge badge-success">Open</p>' : '<p class="badge badge-danger">Closed</p>'; ?></td>
                                                    <td class="text-center">
                                                        <?php if(isset($item->certificate) && !empty($item->certificate)) { ?>
                                                            <a href="{{route('certificate.download', ['id' => $item->id])}}"
                                                               type="button" class="btn btn-sm btn-icon btn-warning">
                                                                <i class="la la-download"></i>
                                                            </a>
                                                        <?php } else { echo "NULL";} ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#"
                                                           type="button" class="btn btn-sm btn-icon btn-warning">
                                                            <i class="la la-download"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{--<script>--}}
    {{--let profilePolicyTable = function () {--}}
    {{--let initTable1 = function () {--}}
    {{--let table = $('#profilePolicyTable');--}}
    {{--// begin first table--}}
    {{--table.DataTable();--}}
    {{--};--}}

    {{--return {--}}

    {{--//main function to initiate the module--}}
    {{--init: function () {--}}
    {{--initTable1();--}}
    {{--},--}}

    {{--};--}}
    {{--}();--}}

    {{--jQuery(document).ready(function () {--}}
    {{--profilePolicyTable.init();--}}
    {{--});--}}
    {{--</script>--}}
@endsection




