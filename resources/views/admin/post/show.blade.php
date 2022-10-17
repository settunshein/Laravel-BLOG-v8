@extends('layouts.backend.master')

@section('post-active', 'sidebar-active')

@section('title', 'Post List')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Post Management</h6>
    <a href="javascript:;" class="btn btn-sm btn-outline-dark rounded-0" onclick="history.back()">
        <i class="fas fa-arrow-circle-left"></i>&nbsp;
        B A C K
    </a>
</div>

<div class="row">
    <div class="col-md-8 mb-5">
        <div class="card rounded-0">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="mb-0 post-title">
                        {{ $post->title }}
                    </span>
                    <input class="statusToggle PostStatus" type="checkbox" data-onstyle="success" data-offstyle="danger"
                    data-style="android" data-on="Published" data-off="Draft" data-size="small"
                    @if($post->status == 1) checked @endif data-id="{{ $post->id }}">
                </div>
            </div>

            <div class="card-body">
                <p class="mb-0">
                    {{ $post->content }}
                </p>
            </div>

            <div class="card-footer d-flex justify-content-between align-items-center">
                <span class="mb-0">
                    Post by {{ ucwords($post->user->name) }} on {{ $post->created_at }}
                </span>
                <div>
                    <span class="mr-3">
                        <i class="far fa-comments mr-1"></i> {{ number_format(1000) }} Comments
                    </span>
                    <span>
                        <i class="far fa-eye mr-1"></i> {{ number_format($post->view_count) }} Views
                    </span>
                </div>
            </div>
        </div>
    </div><!-- End of col-md-8 -->

    <div class="col-md-4 mb-5">
        <div class="card mb-4 rounded-0">
            <div class="card-header d-flex align-items-center text-capitalize">
                <i class="pe-7s-menu pr-1" style="font-size: 17px;"></i>
                Categories
            </div>

            <div class="card-body">
                @foreach($post->categories as $category)
                <span class="badge badge-dark rounded-0 custom-fs-11 py-2 px-3">{{ $category->name }}</span>
                @endforeach
            </div>
        </div><!-- Categories Card Bx -->

        <div class="card mb-4 rounded-0">
            <div class="card-header d-flex align-items-center text-capitalize">
                <i class="pe-7s-photo-gallery pr-1" style="font-size: 17px;"></i>
                Tags
            </div>

            <div class="card-body">
                @foreach($post->tags as $tag)
                <span class="badge badge-dark rounded-0 custom-fs-11 py-2 px-3">{{ $tag->name }}</span>
                @endforeach
            </div>
        </div><!-- Tags Card Bx -->

        <div class="card mb-4 rounded-0">
            <div class="card-header d-flex align-items-center text-capitalize">
                <i class="pe-7s-photo pr-1" style="font-size: 17px;"></i>
                Post Image
            </div>

            <div class="card-body">
                @if(isset($post->image))
                    <img class="card-img-top img-fluid" src="{{ $post->getPostImage() }}">
                @else
            </div>
        </div><!-- Post Image Card Bx -->
    </div><!-- End of col-md-4 -->
</div>
@endsection