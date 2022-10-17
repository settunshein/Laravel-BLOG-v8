@extends('layouts.frontend.master')

@section('content')
<section class="blog-posts grid-system">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">

                    <div class="row">
                        @include('layouts.frontend.partials.post-list')
                    </div>
                    
                </div>
            </div>

            @include('layouts.frontend.partials.sidebar')
        </div>
    </div>
</div>
@endsection