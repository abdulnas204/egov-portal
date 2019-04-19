<header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar">
    <a class="navbar-brand mr-0 mr-md-2" href="/dashboard" aria-label="Bootstrap">
        <img src="http://lostisland.org/wp-content/uploads/2017/07/For-Favicon-4.png" width="50"><br>
    </a>
    <div class="navbar-nav-scroll">
        <ul class="navbar-nav bd-navbar-nav flex-row">
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/voting">Voting</a>
            </li>
        </ul>
    </div>
    <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
        <li class="nav-item text-white">
            {{Auth::user()->first_name}} {{Auth::user()->last_name}} ({{Auth::user()->identifier}})
        </li>
    </ul>
    <a class="btn btn-bd-download d-none d-lg-inline-block mb-3 mb-md-0 ml-md-3" href="/logout">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
</header>