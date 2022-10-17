@extends('layouts.backend.master')

@section('password-active', 'sidebar-active')

@section('title') Edit Password @endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Password Management</h6>
    <a href="javascript:;" class="btn btn-sm btn-outline-dark rounded-0" onclick="history.back()">
        <i class="fas fa-arrow-circle-left"></i>&nbsp;
        B A C K
    </a>
</div>

<form action="{{ route('admin.password.update') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="row">
    <div class="col-md-12 mb-5">
        <div class="card rounded-0">
            <div class="card-header">
                <div class=" d-flex justify-content-between align-items-center">
                    <p class="mb-0 py-1 card-ttl">
                        Edit Password Form
                    </p>
                </div>
            </div><!-- End of card-header -->

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Current Password <b class="text-danger">*</b></label>
                        <input type="password" class="form-control form-control-sm rounded-0" placeholder="* * * * * * * *"
                        name="current_password">
                        <small class="text-danger">{{ $errors->first('current_password') }}</small>
                    </div>

                    <div class="form-group col-md-12">
                        <label>New Password <b class="text-danger">*</b></label>
                        <input type="password" class="form-control form-control-sm rounded-0" placeholder="* * * * * * * *"
                        name="new_password">
                        <small class="text-danger">{{ $errors->first('new_password') }}</small>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Confirm Your New Password <b class="text-danger">*</b></label>
                        <input type="password" class="form-control form-control-sm rounded-0" placeholder="* * * * * * * *"
                        name="confirm_password">
                        <small class="text-danger">{{ $errors->first('confirm_password') }}</small>
                    </div>
                </div>
            </div><!-- End of card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-outline-dark rounded-0 float-right">
                    <i class="fa fa-edit"></i>&nbsp;
                    Update Password
                </button>
            </div><!-- End of card-footer -->
        </div>
    </div>
</div>

</form>
@endsection