@extends('layouts.master')
@section('pageTitle','Student Management | Marks')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Create Marks</h5>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="{{ route('admin.marks.index') }}" type="button" class="btn btn-sm btn-success">
                                <i class="fa fa-plus"></i>
                                Marks List
                            </a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('admin.marks.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 border-right border-primary">
                                <div class="form-group">
                                    <label>Student</label>
                                    <select class="form-control" name="user_id" required>
                                        <option value="">Select Student</option>
                                        @if(!$users->isEmpty())
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{ $user->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
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
                                    <select class="form-control" name="subject_id" required>
                                        <option value="">Select Subject</option>
                                        @if(!$subjects->isEmpty())
                                            @foreach($subjects as $subject)
                                                <option value="{{$subject->id}}">{{ $subject->subject }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label>Marks</label>
                                    <input type="number" class="form-control @error('marks') is-invalid @enderror"
                                           value="{{ old('marks') }}" name="marks" placeholder="Marks" required>
                                    @error('marks')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Marks Status</label>
                                    <input type="number" class="form-control @error('marks_status') is-invalid @enderror"
                                           value="{{ old('marks_status') }}" name="marks_status" placeholder="Passing Marks" required>
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