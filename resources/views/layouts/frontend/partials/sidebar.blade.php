<div class="col-lg-4">
    <div class="sidebar">
        <div class="row">
            <div class="col-lg-12">
                <div class="sidebar-item search">
                    <form id="search_form" name="gs" method="GET" action="#">
                        <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                        <h2>Recent Posts</h2>
                    </div>
                    <div class="content">
                        <ul>
                            @foreach($recent_posts as $recent_post)
                            <li>
                                <a href="{{ url("post/$recent_post->slug") }}">
                                    <h5>{{ $recent_post->title }}</h5>
                                    <span>{{ $recent_post->created_at }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                        <h2>Categories</h2>
                    </div>
                    <div class="content">
                        <ul>
                            @foreach($categories as $category)
                            <li class="category-list">
                                <a href="{{ url("/category-posts/$category->slug") }}" class="d-flex align-items-center">
                                    <span style="width: 50px; text-align: center;">
                                        <i class="{{ $category->logo }}" style="color: {{ $category->color }}"></i>
                                    </span>
                                    {{ $category->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                        <h2>Tag Clouds</h2>
                    </div>
                    <div class="content">
                        <ul>
                            @foreach($tags as $tag)
                            <li>
                                <a href="{{ url("tag-posts/$tag->slug") }}">
                                    {{ $tag->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>