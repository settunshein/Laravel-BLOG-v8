@extends('layouts.backend.master')

@section('user-active', 'sidebar-active')

@section('title', 'User Info')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>User Info</h6>
    <a href="javascript:;" class="btn btn-sm btn-outline-dark rounded-0" onclick="history.back()">
        <i class="fas fa-arrow-circle-left"></i>&nbsp;
        B A C K
    </a>
</div>

<div class="row">
    <div class="col-md-12 mb-5">
        <div class="card rounded-0">
            <div class="card-header">
                <div class=" d-flex justify-content-between align-items-center">
                    <p class="mb-0 py-1 card-ttl">
                        Personal Info
                    </p>
                    <span class="badge badge-success rounded-0 px-3 py-2 custom-fs-12">
                        <i class="fas fa-feather"></i>&nbsp;
                        Total Uploaded Post : {{ $user->posts->count() }} Posts
                    </span>
                </div>
            </div><!-- End of card-header -->

            <div class="card-body">
                <div class="form-row align-items-center">
                    <div class="col-3">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <img src="{{ $user->getProfilePhotoPath() }}" alt="{{ $user->name }}" class="rounded-circle"
                                width="135px">
                            </div>
                        </div>
                    </div>

                    <div class="col-9 border-left">
                        <div class="card border-0">
                            <div class="card-body">
                                <table class="table table-borderless personal-info-tbl">
                                    <tr>
                                        <td>
                                            <span class="text-center"><i class="far fa-user"></i></span>
                                            Username
                                        </td>
                                        <td>
                                            : <span>{{ $user->name }}</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="text-center"><i class="far fa-envelope"></i></span>
                                            Email Address
                                        </td>
                                        <td>
                                            : <span>{{ $user->email }}</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="text-center"><i class="fas fa-phone-alt"></i></span>
                                            Phone Number
                                        </td>
                                        <td>
                                            : <span>{{ $user->phone }}</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="text-center"><i class="far fa-map"></i></span>
                                            Address
                                        </td>
                                        <td>
                                            : <span>{{ $user->address }}</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span class="text-center"><i class="fas fa-history"></i></span>
                                            Joined Date
                                        </td>
                                        <td>
                                            : <span>{{ $user->created_at }}</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End of card-body -->
        </div>
    </div>
</div>
@endsection