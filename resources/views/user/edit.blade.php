@extends('layouts.master')
@section('pageTitle','Student Management | User')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Edit User <b>@if($user != null)#{{$user->id}}@endif</b></h5>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="{{ route('admin.user.index') }}" type="button" class="btn btn-sm btn-success">
                                <i class="fa fa-plus"></i>
                                User List
                                
                            </a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('admin.user.update') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="hidden" name="id" value="@if($user != null){{$user->id}}@endif">
                                    <input type="text" class="form-control"
                                           value="@if($user != null){{$user->name}}@endif" name="name"
                                           placeholder="User Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" class="form-control"
                                           value="@if($user != null){{$user->mobile}}@endif"
                                           name="phone" placeholder="Phone Number" required>
                                </div>
                                 <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" disabled class="form-control"
                                           value="@if($user != null){{$user->email}}@endif" placeholder="Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control "
                                           name="password" placeholder="Password" autocomplete="password">
                        
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="1" @if($user != null)@if($user->gender == 1) selected @endif @endif>Male</option>
                                        <option value="2" @if($user != null)@if($user->gender == 2) selected @endif @endif>Female</option> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Semester</label>
                                    <select class="form-control" name="semester_id" required>
                                        <option value="">Select Semester</option>
                                        @if(!$semesters->isEmpty())
                                            @foreach($semesters as $semester)
                                                <option value="{{$semester->id}}" @if($user != null)@if($user->semester_id == $semester->id) selected @endif @endif>{{ $semester->semester }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

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