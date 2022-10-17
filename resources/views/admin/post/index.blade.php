@extends('layouts.backend.master')

@section('post-active', 'sidebar-active')

@section('title', 'Post List')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Post Management</h6>
    <form action="" method="GET">
        <div class="input-group">
            <p class="mb-0 mr-2" style="font-size: 12.5px; margin-top: 7px;">
                Search Key : <span class="text-danger">{{ request('search') }}</span>
            </p>
            <input type="text" class="search-input form-control rounded-0 border-dark" placeholder="Search by Post Name . . ." 
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
    <div class="col-md-12 mb-3 d-flex justify-content-between align-items-center">
        <p class="mb-0 py-1 card-ttl">
            Post List Table
            <span>
                <a href="javascript:;">
                    ( <i class="fas fa-database mr-1"></i> {{ $posts->total() }} )
                </a>
            </span>
        </p>
        <a href="{{ route('admin.post.create') }}" class="btn btn-outline-dark rounded-0 btn-sm">
            <i class="fa fa-plus"></i>&nbsp;
            Create
        </a>
    </div>
    
    @foreach($posts as $post)
    <div class="col-md-6">
        <div class="card custom-mb-30 shadow-sm rounded-0">
            <div class="card-header">
                <p class="mb-0">{{ $post->title }}</p>
            </div>
            <div class="card-body">
                <p class="mb-0 text-justify">
                    {{ Str::limit($post->content, 250) }}
                </p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <span>
                    <a href="{{ route('admin.post.show', $post->id) }}" class="btn btn-sm btn-outline-dark rounded-0">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-sm btn-outline-dark rounded-0">
                        <i class="fa fa-edit"></i>
                    </a>
                    
                    <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST"
                    class="d-none deletePostForm{{$post->id}}">
                    @csrf
                    @method('DELETE')
                    </form>
                    <a href="javascript:;" class="btn btn-sm btn-outline-dark rounded-0 del-post-btn"
                    data-id="{{ $post->id }}">
                        <i class="fa fa-trash-alt"></i>
                    </a>
                </span>

                <input class="statusToggle PostStatus" type="checkbox" data-style="android" 
                data-onstyle="success" data-offstyle="danger" data-size="small"
                data-on="Published" data-off="Draft" 
                @if($post->status == '1') checked @endif data-id="{{ $post->id }}">
            </div>
        </div>
    </div>
    @endforeach

    <div class="col-md-12">
        <div class="float-right">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('backend/js/post.js') }}"></script>
@endsection


