@extends('layouts.backendtemplate')

@section('title','Employee Data')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h2 class="card-title d-inline"> Employee Info </h2>
                    <a href="{{route('employee.create')}}" class="btn btn-fill btn-primary float-right"><i
                            class="tim-icons icon-simple-add"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="sampleTable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        No.
                                    </th>
                                    <th>
                                        Photo
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach ($employees as $employee)

                                <tr>
                                    <td>
                                        {{$i++}}
                                    </td>
                                    <td>
                                        <div class="d-inline">
                                            <img src="{{asset('storage/'.$employee->photo)}}" alt="Employee Photo"
                                                width="100">
                                        </div>

                                    </td>
                                    <td>
                                        <div class="d-inline">
                                            <span>Name: &nbsp;&nbsp; {{$employee->name}}</span><br>
                                            <span>Email: &nbsp;&nbsp; {{$employee->email}}</span><br>
                                            <span>Ph: &nbsp;&nbsp; {{$employee->phone_number}}</span><br>
                                            <span>Hire Date: &nbsp;&nbsp;
                                                {{Carbon\Carbon::parse($employee->hire_date)->format('d-m-Y')}}</span><br>
                                            <span>Date of Birth: &nbsp;&nbsp;
                                                {{Carbon\Carbon::parse($employee->date_of_birth)->format('d-m-Y')}}</span><br>
                                            <span>Position: &nbsp;&nbsp; {{$employee->position}}</span><br>
                                            <span>Department: &nbsp;&nbsp; {{$employee->department}}</span><br>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('employee.edit',$employee->id)}}"
                                            class="btn btn-primary btn-sm mb-1">
                                            <i class="tim-icons icon-settings"></i>
                                        </a>
                                        <a href="#" data-id="{{route('employee.destroy',$employee->id)}}"
                                            class="btn btn-danger btn-sm deletebtn">
                                            <i class="tim-icons icon-trash-simple"></i>
                                        </a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal start --}}
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="" id="deleteModalForm">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Are you sure to delete?</h4>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="btnsubmit" class="btn btn-danger" value="Delete">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Modal End --}}
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
      $('.deletebtn').click(function(){
        var id = $(this).data('id');
        // console.log(id);
        $('#deleteModalForm').attr('action',id);
        $('#deleteModal').modal('show');
      })
    })
</script>
@endsection