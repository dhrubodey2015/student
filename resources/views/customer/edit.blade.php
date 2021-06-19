@extends('layouts.master')
@section('pageTitle','Student Management | Customer')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Edit Customer <b>@if($customer != null)#{{$customer->id}}@endif</b></h5>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="{{ route('admin.customer.index') }}" type="button" class="btn btn-sm btn-success">
                                <i class="fa fa-plus"></i>
                                Customer List
                                
                            </a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('admin.customer.update') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <input type="hidden" name="id" value="@if($customer != null){{$customer->id}}@endif">
                                    <input type="text" class="form-control"
                                           value="@if($customer != null){{$customer->name}}@endif" name="name"
                                           placeholder="Customer Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" class="form-control"
                                           value="@if($customer != null){{$customer->phone}}@endif"
                                           name="phone" placeholder="Phone Number" required>
                                </div>
                                 <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" disabled class="form-control"
                                           value="@if($customer != null){{$customer->email}}@endif" placeholder="Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control "
                                           name="password" placeholder="Password" autocomplete="password">
                        
                                </div>
                                
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control"
                                           value="@if($customer != null){{$customer->address}}@endif"
                                           name="address" placeholder="Address"
                                           required>{{$customer->address}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Bank Name</label>
                                    <input type="text" class="form-control"
                                           value="@if($customer != null){{$customer->bank_name}}@endif"
                                           name="bank_name" placeholder="Bank Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Bank AC No</label>
                                    <input type="number" class="form-control"
                                           value="@if($customer != null){{$customer->bank_ac_no}}@endif"
                                           name="bank_ac_no" placeholder="Bank AC No" required>
                                </div>
                                <div class="form-group">
                                    <label>Bank IFSC Code</label>
                                    <input type="text" class="form-control"
                                           value="@if($customer != null){{$customer->bank_ifsc_code}}@endif"
                                           name="bank_ifsc_no" placeholder="Bank IFSC Code" required>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control"
                                           value=""
                                           placeholder="Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control"
                                           value="" name="password" placeholder="Password" >
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="confirm_password" class="form-control"
                                           value="" name="password" placeholder="Confirm Password" >
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fa fa-save"></i>
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{---------------customerCreate Modal---------------------}}
    @include('customer.partial.create-customer-modal')
    {{---------------Modal---------------------}}
@endsection