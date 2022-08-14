<div class="mobile-menu-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 d-block d-md-none">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul>
                            <li><a href="{{ route('home') }}">Главная</a>
                            </li>
                            @include('partials.menu.main.mobile.categories.index')
                            <li><a href="">Статьи</a></li>
                            <li><a href="">О нас</a></li>
                            <li><a href="">Контакты</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
