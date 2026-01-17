<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    @vite([
        'resources/js/profile/profile.js',
        'resources/js/nav.js',
        'resources/css/nav.css',
        'resources/css/main.css',
        'resources/css/profile/profile.css',
        'resources/css/profile/change_avatar_modal.css',
        'resources/css/profile/change_role_modal.css',
        'resources/js/profile/change_avatar.js',
        'resources/js/profile/change_role.js',

    ])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <title>Document</title>
</head>
<body>
    <div class="main_container">
        @include('partials.nav', ['type' => 'register_pizza'])

        <div class="profile_block">

            @if ($avatarUrl)
                <div class="avatar">
                    <img src="{{ 'http://localhost:1000' . $avatarUrl }}" alt="avatar">
                </div>
            @else  
                <div class="avatar avatar_no_url">
                    
                </div>           
                {{-- <div class="form_avatar">
                    <input class="file_input" type="file" name="avatar" id="avatar">
                </div>

                <button id="avatarFormBtn">Загрузить</button> --}}
            @endif

            <div class="profile_panel">
                <h1>{{ $userData['name'] }}</h1>
                <div class="profile_inform">
                    <div class="email_view line">
                        <h2>Почта :</h2>
                        <h3>{{ $userData['email'] }}</h3>
                    </div>
                    <div class="phone_view line">
                        <h2>Телефон :</h2>
                        <h3>{{ $userData['phone'] }}</h3>
                    </div>
                    <div class="role_view line">
                        <h2>Роль :</h2>
                        <h3>{{ $userData['role'] }}</h3>
                    </div>
                </div>

                <div class="change_panel">
                    <div class="change_avatar change_btn">поменять аватарку</div>
                    <div class="change_role change_btn">поменять роль</div>
                </div>

                <div class="avatar_modal display_none">
                    <div class="avatar_modal_cont">

                        <img src="{{ asset('images/icons/close_icons.png') }}" alt="close" class="close_modal">

                        <div class="avatar_modal_img avatar">
                            @if ($avatarUrl)
                                <img src="{{ 'http://localhost:1000' . $avatarUrl }}" alt="avatar" id="img_avatar">
                            @else  
                                <div class="avatar avatar_no_url"></div>  
                            @endif
                        </div>

                        <div class="modal_right">

                            <div class="modal_inform">
                                Файл должен иметь расширение jpeg, png, jpg, webp, gif; если ваш файл не соответствует размерам 350x350, то он будет автоматически изменен.
                            </div>

                            <div class="modal_panel">
                                <div class="form_avatar">
                                    <input class="file_input" type="file" name="avatar" id="avatar">
                                </div>

                                <button id="avatarFormBtn">Сохранить</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="change_role_modal">
                    <div class="change_role_cont">
                        <img src="{{ asset('images/icons/close_icons.png') }}" alt="close" class="close_modal_role">

                        <div class="profile_inform_cont">
                            <img src="{{ 'http://localhost:1000' . $avatarUrl }}" alt="profile_img" class="profile_img">

                            <div class="profile_inform">
                                <h2 class="user_name">{{ $userData['name'] }}</h2>
                                <div class="role_block">
                                    <h3 class="current_role">Текущая роль :</h3>
                                    <p class="profile_role">{{ $userData['role'] }}</p>
                                </div>
                                <div class="description">
                                    Чтобы изменить роль, нужно личное подтверждение создателя! Отправьте запрос — он будет обработан в ближайшее время.
                                </div>
                            </div>
                        </div>

                        <div class="panel_change_role">
                            <div class="comment">
                                <p>Комментарий :</p>
                                <textarea name="comment" id="" cols="30" rows="8" class="comment_input"></textarea>
                            </div>
                            <div class="role">
                                <p>Выберите роль :</p>
                                <div class="role_box">
                                    <div class="role_btn admin_btn">Админ</div>
                                    <div class="role_btn seller_btn">Продавец</div>
                                </div>

                                <div class="send_btn">Отправить</div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>
</body>
</html>