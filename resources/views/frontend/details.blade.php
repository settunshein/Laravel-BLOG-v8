@extends('layouts.frontend.master')

@section('content')
<section class="blog-posts grid-system">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">

                    <div class="row">
                        @include('layouts.frontend.partials.post-details')
                    </div>
                    
                </div>
            </div>
            @include('layouts.frontend.partials.sidebar')
        </div>
    </div>
</div>

@section('js')
<script>
    $('.login-first').on('click', function(){
        let action = $(this).data('action');
        action = action.charAt(0).toUpperCase() + action.slice(1);
        Swal.fire({
            title: 'INFO',
            text : `You Need to Login First to ${action} this Post`,
            icon : 'info',
        });
    })
</script>
@endsection
@endsection