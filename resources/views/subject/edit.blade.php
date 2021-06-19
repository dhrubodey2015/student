@extends('layouts.master')
@section('pageTitle','Student Management | Subject')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Edit Subject <b>@if($subject != null)#{{$subject->id}}@endif</b></h5>
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="{{ route('admin.subject.index') }}" type="button" class="btn btn-sm btn-success">
                                <i class="fa fa-plus"></i>
                                Subject List
                                
                            </a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('admin.subject.update') }}" method="POST">
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
                                                <option value="{{$semester->id}}" @if($subject != null)@if($subject->semester_id == $semester->id) selected @endif @endif>{{ $semester->semester }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Subject Name</label>
                                    <input type="hidden" name="id" value="@if($subject != null){{$subject->id}}@endif">
                                    <input type="text" class="form-control"
                                           value="@if($subject != null){{$subject->subject}}@endif" name="subject"
                                           placeholder="Subject" required>
                                </div>
                                @error('subject')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Full Marks</label>
                                    <input type="number" class="form-control @error('full_marks') is-invalid @enderror"
                                           value="@if($subject != null){{$subject->full_marks}}@endif" name="full_marks" placeholder="Full Marks" required>
                                    @error('full_marks')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Passing Marks</label>
                                    <input type="number" class="form-control @error('passing_marks') is-invalid @enderror"
                                           value="@if($subject != null){{$subject->passing_marks}}@endif" name="passing_marks" placeholder="Passing Marks" required>
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