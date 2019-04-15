<li class="header" translate>User</li>
<li class="treeview">
    <a href="javascript:void(0);">
        <i class="fa fa-cogs"></i> <span translate> {{ Auth::user()->name }}</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li data-href-match="/settings/aria2/basic">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span translate>logout</span>
            </a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</li>