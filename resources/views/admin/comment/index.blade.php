@extends('layouts.backend.master')

@section('comment-active', 'sidebar-active')

@section('title', 'Comment List')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Comment Management</h6>
</div>

<div class="row mb-5">
    <div class="table-responsive">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header">
                    <div class=" d-flex justify-content-between align-items-center">
                        <p class="mb-0 py-1 card-ttl">
                            Comment List
                            <span>
                                <a href="javascript:;">
                                    ( <i class="fas fa-database mr-1"></i>{{ $comments->total() }} )
                                </a>
                            </span>
                        </p>
                    </div>
                </div>

                <div class="card-body" id="contactMessageList">
                    <ul class="list-unstyled">
                        @foreach($comments as $comment)
                        <li class="media p-3 border mb-3 d-flex align-items-center shadow-sm rounded-0">
                            <div class="media-body px-2 py-1">
                                <h6 class="my-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="left-col">
                                            <p class="text-muted mb-0 custom-fs-13">
                                                {{ $comment->user->email }}
                                                <span class="text-danger custom-fs-12">
                                                    ( {{ $comment->user->name }} )
                                                </span> 
                                            </p>
                                        </div>

                                        <div class="right-col">
                                            <small class="mr-2">
                                                {{ $comment->created_at->toFormattedDateString() }}, 
                                                {{ $comment->created_at->format('H:i A') }}
                                            </small>
                                            <form action="{{ route('admin.comment.destroy', $comment->id) }}" 
                                            class="d-inline-block deleteCommentForm{{$comment->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <a href="javascript:;" class="text-danger del-comment-btn" data-id="{{ $comment->id }}">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                    <hr class="mt-2">

                                    <p class="custom-fs-12 mt-4">
                                        <a href="{{ url('post/'.$comment->post->slug) }}">
                                            <i class="fas fa-feather"></i>&nbsp;
                                            {{ $comment->post->title }}
                                        </a>
                                    </p>
                                    
                                    <p class="custom-fs-12 text-justify" style="line-height: 2;">
                                        {{ $comment->message }}
                                    </p>
                                </h6>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('backend/js/comment.js') }}"></script>
@endsection
