@extends('layouts.master')
@section('pageTitle','Student Management | Customer')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Student</h5>
                        </div>
                        <div class="col-md-2 text-right">
                            <!-- <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target=".customerCreate">
                                <i class="fa fa-plus"></i>
                                Create
                            </button> -->
                            <a href="{{ route('admin.customer.create') }}" type="button" class="btn btn-sm btn-success">
                                <i class="fa fa-plus"></i>
                                Create
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover datatable datatable-bordered datatable-head-custom"
                           id="customerTable">
                        <thead>
                        <tr>
                            <td>Name</td>
                            <td>Phone</td>
                            <td>Email</td>
                            <td>Address</td>
                            <td>Bank Name</td>
                            <td>Bank Ac No</td>
                            <td>Bank IFSC No</td>
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
            let initTable1 = function () {
                let table = $('#customerTable');

                // begin first table
                table.DataTable(
                    {
                        responsive: true,
                        searchDelay: 500,
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: '{{ route('admin.customer.get.list') }}',
                            type: 'POST',
                            data: {_token: "{{csrf_token()}}"},
                        },
                        columns: [
                            {"data": "name"},
                            {"data": "phone"},
                            {"data": "email"},
                            {"data": "address"},
                            {"data": "bank_name"},
                            {"data": "bank_ac_no"},
                            {"data": "bank_ifsc_code"},
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

        function deleteUser(id) {
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
                        url: '{{ route('admin.customer.destroy') }}',
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
                            $('#customerTable').DataTable().destroy();
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