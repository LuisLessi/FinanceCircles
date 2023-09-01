<nav id="main">
    <ul>
        <li>
        <a href="{{ route('user.index') }}">
                <i class="fa fa-address-book"></i>
                <h3>Users</h3>
            </a>
        </li>
        <li>
            <a href="{{ route('institution.index') }}">
                <i class="fa fa-building"></i>
                <h3>Institutions</h3>
            </a>
        </li>
        <li>
            <a href="{{ route('group.index') }}">
                <i class="fa fa-users"></i>
                <h3>Groups</h3>
            </a>
        </li>
        <li>
            <a href="{{ route('moviment.application') }}">
                <i class="fa fa-money"></i>
                <h3>Invest</h3>
            </a>
        </li>
        <li>
            <a href="{{ route('moviment.index') }}">
                <i class="fa fa-dollar"></i>
                <h3>Applications</h3>
            </a>
        </li>
    </ul>
</nav>