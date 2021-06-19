@extends('layouts.master')
@section('pageTitle','Student Management | Subject')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Create Subject</h5>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="{{ route('admin.subject.index') }}" type="button" class="btn btn-sm btn-success">
                                <i class="fa fa-plus"></i>
                                Subject List
                            </a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('admin.subject.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 border-right border-primary">
                                <div class="form-group">
                                    <label>Semester</label>
                                    <select class="form-control" name="semester_id" required>
                                        <option value="">Select Semester</option>
                                        @if(!$semesters->isEmpty())
                                            @foreach($semesters as $semester)
                                                <option value="{{$semester->id}}">{{ $semester->semester }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                           value="{{ old('subject') }}" name="subject"
                                           placeholder="Subject" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label>Full Marks</label>
                                    <input type="number" class="form-control @error('full_marks') is-invalid @enderror"
                                           value="{{ old('full_marks') }}" name="full_marks" placeholder="Full Marks" required>
                                    @error('full_marks')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Passing Marks</label>
                                    <input type="number" class="form-control @error('passing_marks') is-invalid @enderror"
                                           value="{{ old('passing_marks') }}" name="passing_marks" placeholder="Passing Marks" required>
                                    @error('passing_marks')
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