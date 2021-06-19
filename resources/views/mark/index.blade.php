@extends('layouts.master')
@section('pageTitle','Student Management | Subject')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Subject</h5>
                        </div>
                        <div class="col-md-2 text-right">
                            <!-- <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target=".customerCreate">
                                <i class="fa fa-plus"></i>
                                Create
                            </button> -->
                            <a href="{{ route('admin.marks.create') }}" type="button" class="btn btn-sm btn-success">
                                <i class="fa fa-plus"></i>
                                Create
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover datatable datatable-bordered datatable-head-custom"
                           id="markTable">
                        <thead>
                        <tr>
                            <td>Student Name</td>
                            <td>Semester</td>
                            <td>Subject</td>
                            <td>Marks</td>
                            <td>Status</td>
                            <td style="width: 100px;">Action</td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{---------------customerCreate Modal---------------------}}
    @include('customer.partial.create-customer-modal')
    {{---------------Modal---------------------}}
@endsection
@section('scripts')
    <script>
        let customerDataTable = function () {
            // $('#userTable').DataTable().destroy();
            let initTable1 = function () {
                let table = $('#markTable');

                // begin first table
                table.DataTable(
                    {
                        responsive: true,
                        searchDelay: 500,
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: '{{ route('admin.marks.get.list') }}',
                            type: 'POST',
                            data: {_token: "{{csrf_token()}}"},
                        },
                        columns: [
                            {"data": "student"},
                            {"data": "semster"},
                            {"data": "subject"},
                            {"data": "marks"},
                            {"data": "status"},
                            {"data": "action", sortable: false},
                        ]
                    }
                );
            };

            return {

                //main function to initiate the module
                init: function () {
                    initTable1();
                },

            };
        }();

        jQuery(document).ready(function () {
            customerDataTable.init();
        });

        function deleteSubject(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.subject.destroy') }}',
                        type: 'POST',
                        data: {
                            _token: '{{csrf_token()}}',
                            id: id
                        },
                        success: function (response) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            $('#markTable').DataTable().destroy();
                            customerDataTable.init();
                        }
                    });
                }
            })
        }
    </script>
    <script>

        $("#kt_sweetalert_demo_8").click(function (e) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then(function (result) {
                if (result.value) {
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    )
                }
            });
        });
    </script>
@endsection