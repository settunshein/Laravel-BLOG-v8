<div class="col-lg-12 blog-post-col mb-3">
    <div class="blog-post">
        <div class="blog-thumb">
            <img src="{{ $post->getPostImage() }}">
        </div>
        <div class="down-content">
            <span>
                {{ $post->categories ? $post->categories[0]->name : '' }}
            </span>
            <a href="{{ url('/'.$post->slug) }}">
                <h4>{{ $post->title }}</h4>
            </a>
            <ul class="post-info">
                <li>
                    <a href="#">
                        {{ $post->created_at }}
                    </a>
                </li>
                <li>
                    <a href="#">
                        {{ number_format($post->view_count) }} Views
                    </a>
                </li>
                <li>
                    <a href="#">
                        {{ rand(10, 100) }} Comments
                    </a>
                </li>
                <li>
                    <a href="#">
                        {{ number_format($post->like_count->count()) }} Likes
                    </a>
                </li>
            </ul>
            <p class="text-justify">
                {{ $post->content }}
            </p>
            <div class="post-options">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="post-tags">
                            <li class="d-flex justify-content-between align-items-center">
                                Post by {{ $post->user->name }}

                                @auth
                                <form action="{{ route('post.like', $post->id) }}" method="POST" id="likePost{{$post->id}}" class="d-inline">
                                    @csrf
                                    <button type="button" onclick="document.getElementById('likePost{{$post->id}}').submit()" class="{{ $post->isLikePost(auth()->user(), $post->id) }} rounded-0 custom-fs-13">
                                        <i class="far fa-thumbs-up mr-0"></i>
                                        Like
                                    </button>
                                </form>
                                @else
                                <button type="button" class="btn btn-like rounded-0 custom-fs-13 login-first" data-action="login">
                                    <i class="far fa-thumbs-up mr-0"></i>
                                    Like
                                </button>
                                @endauth
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if( count($post->comments) > 0 )
<div class="col-lg-12 mb-4">
    <div class="sidebar-item comments">
        <div class="sidebar-heading">
            <h2>
                {{ count($post->comments) }} Comments
            </h2>
        </div>
        <div class="content">
            <ul>
                @foreach($post->comments as $comment)
                <li>
                    <div class="author-thumb">
                        <img src="{{ $comment->user->getProfilePhotoPath() }}" class="rounded-circle">
                    </div>
                    <div class="right-content" style="margin-left: 100px;">
                        <h4>{{ $comment->user->name }}<span>May 16, 2020</span></h4>
                        <p>{{ $comment->message }}</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

<div class="col-lg-12">
    <div class="sidebar-item submit-comment">
        <div class="sidebar-heading">
            <h2>Your Comment</h2>
        </div>
        <div class="content">
            <form action="{{ route('comment.store') }}" method="POST" id="comment">
            @csrf
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="row">
                    <div class="col-lg-12">
                        <fieldset>
                            <textarea name="message" rows="3" id="message" placeholder="Leave Your Comment"></textarea>
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        @auth
                        <fieldset>
                            <button type="submit" id="form-submit" class="main-button">
                                Send Comment
                            </button>
                        </fieldset>
                        @else
                        <fieldset>
                            <button type="button" id="form-submit" class="main-button login-first" data-action="comment">
                                Send Comment
                            </button>
                        </fieldset>
                        @endauth
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>