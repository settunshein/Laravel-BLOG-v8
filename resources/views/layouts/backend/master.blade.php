<!DOCTYPE HTML>
<html lang="en">
@include('layouts.backend.partials.head')
<body>
    
    @include('layouts.backend.partials.nav')

    <div class="container-fluid">
        <div class="row">
            @if(Request::is('admin*'))
                @include('layouts.backend.partials.admin_sidebar')    
            @else
                @include('layouts.backend.partials.author_sidebar')
            @endif
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>
    
    @include('layouts.backend.partials.scripts')
</body>
</html>