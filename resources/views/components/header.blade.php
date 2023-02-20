<header class="header-footer">
    <div class="header__container">
        <a href="{{ route('index.index') }}" class="header__logo">Логотип</a>
        <nav class="header__nav">
            <ul class="header__menu">
                <li class="header__item"><a href="{{ route('index.index') }}" class="header__link">Главная</a></li>
                <li class="header__item"><a href="{{ route('books.create.view') }}" class="header__link">Добавить</a></li>
            </ul>
        </nav>
        <div class="header__buttons">
            @guest
                <a href="{{ route('index.login') }}" class="button">Авторизация</a>
                <a href="{{ route('index.register') }}" class="button">Регистрация</a>
            @endguest
            @auth
                <a href="{{ route('logout') }}" class="button">Выход</a>
            @endauth
        </div>
    </div>
</header>
