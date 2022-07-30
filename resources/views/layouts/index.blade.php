<!DOCTYPE html>
<html class="no-js" lang="ru">
@include('partials.head.index')
<body>
<div class="wrapper bg-dark-white">
    @include('partials.header.index')
    @yield('content')
</div>
@include('partials.footer.index')
@include('partials.js.index')
</body>
</html>
