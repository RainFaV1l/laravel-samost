<header class="header-footer">
    <div class="header__container">
        <div class="header__logo">Логотип</div>
        <nav class="header__nav">
            <ul class="header__menu">
                <li class="header__item"><a href="{{ route('index.index') }}" class="header__link">Главная</a></li>
                @auth
                    <li class="header__item"><a href="{{ route('logout') }}" class="header__link">Выход</a></li>
                @endauth
            </ul>
        </nav>
        <div class="header__buttons">
            @guest
                <a href="{{ route('index.login') }}" class="button">Авторизация</a>
                <a href="{{ route('index.register') }}" class="button">Регистрация</a>
            @endguest
            @auth
                <a href="{{ route('index.profile') }}" class="button">Профиль</a>
            @endauth
        </div>
    </div>
</header>
