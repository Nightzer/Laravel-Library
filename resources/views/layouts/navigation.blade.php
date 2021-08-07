<form id="logout" method="POST" action="{{ route('logout') }}">
    @csrf
</form>
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    <li>
        <a class="red-text" href="#!" onclick="event.preventDefault(); $('#logout').submit();">
            {{ __('Logout') }}
        </a>
    </li>
</ul>
<ul id="dropdown2" class="dropdown-content">
    <li>
        <a class="red-text" href="#!" onclick="event.preventDefault(); $('#logout').submit();">
            {{ __('Logout') }}
        </a>
    </li>
</ul>
<nav>
    <div class="nav-wrapper">
        <a href="{{ route('dashboard') }}" class="brand-logo">Logo</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

        <ul class="right hide-on-med-and-down">
            <li><a href="{{ route('author.index') }}">Authors</a></li>
            <li><a href="{{ route('category.index') }}">Categories</a></li>
            <li><a href="{{ route('book.index') }}">Books</a></li>
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons">more_vert</i></a></li>
        </ul>
    </div>
</nav>
<ul class="sidenav" id="mobile-demo">
    <li><a href="{{ route('author.index') }}">Authors</a></li>
    <li><a href="badges.html">Categories</a></li>
    <li><a href="badges.html">Books</a></li>
    <!-- Dropdown Trigger -->
    <li><a class="dropdown-trigger" href="#!" data-target="dropdown2"><i class="material-icons">more_vert</i></a></li>
</ul>
