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
                            <a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">My
                                Account</a>
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
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>Semester</h3>
                </div>
            </div>
            <div class="form-group col-md-5 col-12 pl-1">
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
            
        </div>
    </div>
@endsection
@section('scripts')
    
@endsection




