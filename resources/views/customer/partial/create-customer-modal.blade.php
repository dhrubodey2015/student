<?php
/**
 * Created by PhpStorm.
 * User: MahadyRumu
 * Date: 2/13/2021
 * Time: 8:31 PM
 */
?>
{{---------------customerCreate Modal---------------------}}
<div class="modal fade customerCreate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Create Customer</h5>
            </div>
            <form action="{{ route('admin.customer.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 border-right border-primary">
                            <div class="form-group">
                                <label>Customer Name</label>
                                <input type="text" class="form-control" placeholder="Customer Name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Customer Phone</label>
                                <input type="number" class="form-control" placeholder="Customer Phone" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label>Customer Address</label>
                                <textarea class="form-control" placeholder="Customer Address" name="address" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Customer Email</label>
                                <input type="email" class="form-control" placeholder="Customer Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Confirm Password" name="password" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                                <i class="fa fa-times"></i>
                                Close
                            </button>
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
{{---------------Modal---------------------}}