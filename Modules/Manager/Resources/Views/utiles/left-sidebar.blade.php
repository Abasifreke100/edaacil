
<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="/manager"><img src="{{ URL::to('assets/images/logo.svg') }}" width="25" alt="Edaacil"><span class="m-l-10">Edaacil</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="profile.html"><img src="{{ URL::to('assets/images/profile_av.jpg') }}" alt="User"></a>
                    <div class="detail">
                        <h4>John Doe</h4>
                        <small>Super Admin</small>
                    </div>
                </div>
            </li>
            <li class="active open"><a href="/manager"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

            <li><a href="{{ route('manager.token.list') }}"><i class="zmdi zmdi-spinner"></i><span>Generate Token</span></a></li>

            <li><a href="{{ route('manager.account.list') }}"><i class="zmdi zmdi-accounts-list"></i><span>Manage Account</span></a>
            </li>

        </ul>
    </div>
</aside>