<header>
    <div class='logo'>Atte</div>
    @if (Auth::check())
        <nav class='header-nav'>
            <ul class='header-nav-ul'>
                <li class='header-nav-item'><a href='/'>ホーム</a></li>
                <li class='header-nav-item'><a href='/attendance/today'>日付一覧</a></li>
                <li class='header-nav-item'><a href='/logout'>ログアウト</a></li>
            </ul>
        </nav>
        <div class="nav-w480">
            <label for='nav-input'>
                <img src='{{ asset('img/hmbrgr_menu.png') }}' alt='menu' id='menubtn' >
            </label>
            <input id='nav-input' type='checkbox' class='nav-hidden'>
            <nav class='header-nav-w480'>
                <ul class='header-nav-ul'>
                    <li class='header-nav-item'><a href='/'>ホーム</a></li>
                    <li class='header-nav-item'><a href='/attendance/today'>日付一覧</a></li>
                    <li class='header-nav-item'><a href='/logout'>ログアウト</a></li>
                </ul>
            </nav>
        </div>
    @endif
</header>
