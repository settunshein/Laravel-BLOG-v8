<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted">
            <span>GENERAL</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @yield('dashboard-active')" href="{{ route('admin.dashboard') }}">
                    <span data-feather="airplay"></span>
                    Dashboard
                </a>
            </li>   

            <li class="nav-item">
                <a class="nav-link @yield('category-active')" href="{{ route('admin.category.index') }}">
                    <span data-feather="align-left"></span>
                    Category
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link @yield('tag-active')" href="{{ route('admin.tag.index') }}">
                    <span data-feather="tag"></span>
                    Tag
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @yield('post-active')" href="{{ route('admin.post.index') }}">
                    <span data-feather="feather"></span>
                    Post
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @yield('comment-active')" href="">
                    <span data-feather="message-square"></span>
                    Comment
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @yield('user-active')" href="{{ route('admin.user.index') }}">
                    <span data-feather="users"></span>
                    Users
                </a>
            </li>
        </ul>
        
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>SETTINGS</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link @yield('profile-active')" href="{{ route('admin.profile') }}">
                    <span data-feather="user"></span>
                    Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('password-active')" href="{{ route('admin.password.edit') }}">
                    <span data-feather="lock"></span>
                    Change Password
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/logout') }}">
                    <span data-feather="log-out"></span>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>