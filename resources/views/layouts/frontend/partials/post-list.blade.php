@foreach($posts as $post)
<div class="col-lg-6 blog-post-col">
    <div class="blog-post">
        <div class="blog-thumb">
            <img src="{{ $post->getPostImage() }}">
        </div>
        <div class="down-content">
            <a href="{{ url('post/'.$post->slug) }}">
                <h4 class="post-ttl">{{ $post->title }}</h4>
            </a>
            <ul class="post-info">
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
                {{ Str::limit($post->content, 150) }}    
            </p>
            <div class="post-options">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="post-tags custom-fs-13">
                            Post by {{ $post->user->name }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="col-lg-12">
    {{ $posts->links() }}
</div>