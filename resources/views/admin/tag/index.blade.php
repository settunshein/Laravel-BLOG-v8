@extends('layouts.backend.master')

@section('tag-active', 'sidebar-active')

@section('title', 'Tag List')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Tag Management</h6>
    <form action="" method="GET">
        <div class="input-group">
            <p class="mb-0 mr-2" style="font-size: 12.5px; margin-top: 7px;">
                Search Key : <span class="text-danger">{{ request('search') }}</span>
            </p>
            <input type="text" class="search-input form-control rounded-0 border-dark" placeholder="Search by Tag Name . . ." 
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
                    <div class=" d-flex justify-content-between align-items-center">
                        <p class="mb-0 py-1 card-ttl">
                            Tag List Table
                            <span>
                                <a href="javascript:;">
                                    ( <i class="fas fa-database mr-1"></i> {{ $tags->total() }} )
                                </a>
                            </span>
                        </p>
                        <a href="{{ route('admin.tag.create') }}" class="btn btn-sm btn-outline-dark rounded-0">
                            Create&nbsp;
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="categoryListTable">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tags as $tag)
                            <tr class="text-center">
                                <td>{{ ++$i }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.tag.edit', $tag->id) }}" 
                                    class="btn btn-sm btn-outline-dark rounded-0">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    
                                    <form action="{{ route('admin.tag.destroy', $tag->id) }}" method="POST"
                                    class="d-none deleteTagForm{{$tag->id}}">
                                    @csrf
                                    @method('DELETE')
                                    </form>
                                    <a href="javascript:;" class="btn btn-sm btn-outline-dark rounded-0 del-tag-btn"
                                    data-id="{{ $tag->id }}">
                                        <i class="fa fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="4" class="font-weight-bold text-danger">
                                    No Tag Found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        {{ $tags->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('backend/js/tag.js') }}"></script>
@endsection