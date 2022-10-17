<div id="preloader">
	<div class="jumper">
		<div></div>
		<div></div>
		<div></div>
	</div>
</div> 

<header class="">
	<nav class="navbar navbar-expand-lg">
		<div class="container">
			<a class="navbar-brand" href="{{ url('/') }}">
				<h2>
					Laravel Blog<em>.</em>
				</h2>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link active" href="{{ url('/') }}">
							Home
						</a>
					</li>
					@guest
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">
							Register
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">
							Login
						</a>
					</li>
					@else
						@if(auth()->user()->role == 'admin')
						<a class="nav-link" href="{{ route('admin.dashboard') }}">
							Dashboard
						</a>
						@else
						<a class="nav-link" href="{{ route('author.dashboard') }}">
							Dashboard
						</a>
						@endif
					<li class="nav-item">
						<a class="nav-link" href="{{ url('logout') }}">
							Logout
						</a>
					</li>
					@endguest
				</ul>
			</div>
		</div>
	</nav>
</header>