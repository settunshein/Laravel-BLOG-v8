@extends('layouts.backend.master')

@section('user-active', 'sidebar-active')

@section('title', 'User List')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>User Management</h6>
    <form action="" method="GET">
        <div class="input-group">
            <p class="mb-0 mr-2" style="font-size: 12.5px; margin-top: 7px;">
                Search Key : <span class="text-danger">{{ request('search') }}</span>
            </p>
            <input type="text" class="search-input form-control rounded-0 border-dark" placeholder="Search by Username . . ." 
            style="width: 250px" name="search" value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-dark btn-sm rounded-0" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>

<div class="row">
    <div class="table-responsive">
        <div class="col-md-12">
            
            <div class="card rounded-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0 py-1 card-ttl">
                            User List Table
                            <span>
                                <a href="javascript:;">
                                    ( <i class="fas fa-database mr-1"></i> {{ $users->total() }} )
                                </a>
                            </span>
                        </p>
                        <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-outline-dark rounded-0">
                            Create&nbsp;
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="userListTable">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Address</th>
                                <th>Joined Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr class="text-center">
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <span class="badge badge-{{$user->role == 'admin' ? 'success' : 'warning'}} 
                                    rounded-0 px-3 py-2 custom-fs-11">
                                        {{ ucwords($user->role) }}
                                    </span>
                                </td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-sm btn-outline-dark rounded-0" 
                                    data-id="{{ $user->id }}">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    @if( $user->id == auth()->id() )
                                        <a type="button" class="btn btn-sm btn-outline-dark rounded-0 disabled" 
                                        data-id="{{ $user->id }}">
                                            <i class="fa fa-trash-alt"></i>
                                        </a>
                                    @else
                                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST"
                                        class="d-none deleteUserForm{{$user->id}}">
                                        @csrf
                                        @method('DELETE')
                                        </form>
                                        <a href="javascript:;" class="btn btn-sm btn-outline-dark rounded-0 del-user-btn"
                                        data-id="{{ $user->id }}">
                                            <i class="fa fa-trash-alt"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="4" class="font-weight-bold text-danger">
                                    No User Found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('backend/js/user.js') }}"></script>
@endsection