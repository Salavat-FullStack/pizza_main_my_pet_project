@php
    if($loggedUser){
        $loginValue = 'Профиль';
        $route = 'profile';
    }else{
        $loginValue = 'Войти';
        $route = 'register';
    }
@endphp

@if ($type == 'default')
    <nav class="main_nav">
        <img class="main_logo" src="{{ asset('images/logo.png') }}" alt="Логотип">
        <div class="nav_search">
            <img class="search_icon" src="{{ asset('images/icons/search.png') }}" alt="search">
            <input class="input_search" type="text" placeholder="Поиск...">
        </div>

        <div class="nav_panel">
            <div class="account"><img class="account_logo" src="{{ asset('images/icons/account.png') }}" alt="account"><a class="auth_btn" href="{{ route($route) }}">{{ $loginValue }}</a></div>
            <a class="basket" href="{{ route('registr-pizza') }}"><img class="basket_logo" src="{{ asset('images/icons/basket.svg') }}" alt="basket"></a>
        </div>
    </nav>
@endif


@if ($type == 'register_pizza')
    <nav class="main_nav">
        <img class="main_logo" src="{{ asset('images/logo.png') }}" alt="Логотип">
        <div class="nav_search" style="display: none" >
            <img class="search_icon" src="{{ asset('images/icons/search.png') }}" alt="search">
            <input class="input_search" type="text" placeholder="Поиск...">
        </div>
        <div class="nav_panel">
            <div class="account"><img class="account_logo" src="{{ asset('images/icons/account.png') }}" alt="account"><a class="auth_btn" href="{{ route($route) }}">Профиль</a></div>
            <a style="display: none" class="basket" href="{{ route('registr-pizza') }}"><img class="basket_logo" src="{{ asset('images/icons/basket.svg') }}" alt="basket"></a>
        </div>
    </nav>
@endif