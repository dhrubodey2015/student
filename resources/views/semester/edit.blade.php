@extends('layouts.master')
@section('pageTitle','Student Management | Semester')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Edit Semester <b>@if($semester != null)#{{$semester->id}}@endif</b></h5>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="{{ route('admin.semester.index') }}" type="button" class="btn btn-sm btn-success">
                                <i class="fa fa-plus"></i>
                                Semester List
                                
                            </a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('admin.semester.update') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Semester Name</label>
                                    <input type="hidden" name="id" value="@if($semester != null){{$semester->id}}@endif">
                                    <input type="text" class="form-control"
                                           value="@if($semester != null){{$semester->semester}}@endif" name="semester"
                                           placeholder="Semester" required>
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