<div class="js_menu-toggle menu-toggle menu-toggle-2 hamburger hamburger--emphatic d-none d-md-block">
    <div class="hamburger-box">
        <div class="hamburger-inner"></div>
    </div>
</div>
<div class="js_main-menu main-menu d-none d-md-block">
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Главная</a>
            </li>
            @include('partials.main-menu.categories.index')
            <li><a href="">Статьи</a></li>
            <li><a href="">О нас</a></li>
            <li><a href="">Контакты</a></li>
        </ul>
    </nav>
</div>
