<!DOCTYPE html>
<html lang="en">

@include('layouts.frontend.partials.head')

<body>

	@include('layouts.frontend.partials.nav')

	@yield('content')

	@include('layouts.frontend.partials.footer')

	@include('layouts.frontend.partials.scripts')

</body>
</html>