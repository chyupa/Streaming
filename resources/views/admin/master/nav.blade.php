<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li>
                <a class="navbar-brand" href="{{route('admin.show.dashboard')}}">Dashboard</a>
            </li>
            <li>
                <a href="{{route('admin.show.users')}}">Users</a>
            </li>
            <li>
                <a href="{{route('admin.show.studios')}}">Studios</a>
            </li>
            <li>
                <a href="{{route('admin.show.categories')}}">Categories</a>
            </li>
            <li>
                <a href="#">Something</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="{{route('auth.get.logout')}}">Logout</a>
            </li>
        </ul>
    </div>
</nav>