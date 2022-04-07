<header>
    <div class="logo">Atte</div>
    @if (Auth::check())
    <nav class="header-nav">

        <ul class="float">
            <li class="header-nav-item"><a href="/">ホーム</a></li>
            <li class="header-nav-item"><a href="/attendance/today">日付一覧</a></li>
            <li class="header-nav-item"><a href="/logout">ログアウト</a></li>
        </ul>
    </nav>
    @endif
</header>
