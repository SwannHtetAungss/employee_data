@extends('layouts.backendtemplate')

@section('title','Employee Insert')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h2 class="card-title d-inline"> Employee Insert Form </h2>
                    <a href="{{route('employee.index')}}" class="btn btn-fill btn-primary float-right"><i
                            class="tim-icons icon-minimal-left"></i></a>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('employee.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="inputName">
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPhoto" class="col-sm-2 col-form-label">Photo</label>
                            <div class="col-sm-10">
                                <input type="file" name="photo" class="form-control" id="inputPhoto">
                                @if ($errors->has('photo'))
                                <span class="text-danger">{{ $errors->first('photo') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="inputEmail">
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPhoneNumber" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone_number" class="form-control" id="inputPhoneNumber">
                                @if ($errors->has('phone_number'))
                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputHireDate" class="col-sm-2 col-form-label">Hire Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="hire_date" class="form-control" id="inputHireDate">
                                @if ($errors->has('hire_date'))
                                <span class="text-danger">{{ $errors->first('hire_date') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDateOfBirth" class="col-sm-2 col-form-label">Date of Birth</label>
                            <div class="col-sm-10">
                                <input type="date" name="date_of_birth" class="form-control" id="inputDateOfBirth">
                                @if ($errors->has('date_of_birth'))
                                <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPosition" class="col-sm-2 col-form-label">Position</label>
                            <div class="col-sm-10">
                                <input type="text" name="position" class="form-control" id="inputPosition">
                                @if ($errors->has('position'))
                                <span class="text-danger">{{ $errors->first('position') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDepartment" class="col-sm-2 col-form-label">Department</label>
                            <div class="col-sm-10">
                                <input type="text" name="department" class="form-control" id="inputDepartment">
                                @if ($errors->has('department'))
                                <span class="text-danger">{{ $errors->first('department') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection