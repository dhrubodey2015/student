@extends('layouts.master')
@section('pageTitle','Student Management | Customer')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Create Customer</h5>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="{{ route('admin.customer.index') }}" type="button" class="btn btn-sm btn-success">
                                <i class="fa fa-plus"></i>
                                Customer List
                            </a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('admin.customer.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 border-right border-primary">
                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" name="name"
                                           placeholder="Customer Name" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ old('phone') }}" name="phone" placeholder="Phone Number" required>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Bank Name</label>
                                    <input type="text" class="form-control @error('bank_name') is-invalid @enderror"
                                           value="{{ old('bank_name') }}" name="bank_name" placeholder="Bank Name"
                                           required>
                                    @error('bank_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Bank AC No</label>
                                            <input type="text"
                                                   class="form-control @error('bank_ac_no') is-invalid @enderror"
                                                   value="{{ old('bank_ac_no') }}" name="bank_ac_no"
                                                   placeholder="Bank AC No" required>
                                            @error('bank_ac_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label>Bank IFSC No</label>
                                            <input type="text"
                                                   class="form-control @error('bank_ifsc_no') is-invalid @enderror"
                                                   value="{{ old('bank_ifsc_no') }}" name="bank_ifsc_no"
                                                   placeholder="Bank IFSC No" required>
                                            @error('bank_ifsc_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}" placeholder="Email" name="email" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password" placeholder="Password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password_confirmation" placeholder="Confirm Password" required
                                           autocomplete="new-password">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address" placeholder="Address"
                                              required>{{ old('address') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fa fa-save"></i>
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection