@extends('layouts.master')
@section('pageTitle','Student Management | Semester')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Create Semester</h5>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="{{ route('admin.semester.index') }}" type="button" class="btn btn-sm btn-success">
                                <i class="fa fa-plus"></i>
                                Semester List
                            </a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('admin.semester.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label>Semester</label>
                                    <input type="text" class="form-control @error('semester') is-invalid @enderror"
                                           value="{{ old('semester') }}" name="semester"
                                           placeholder="Semester" required>
                                    @error('semester')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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