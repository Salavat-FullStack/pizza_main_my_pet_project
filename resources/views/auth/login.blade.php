<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite([
        'resources/css/auth/login.css',
        'resources/js/auth/login.js',
    ])
    <title>Login</title>
</head>
<body>
    <div class="form_cont">
        <div class="register_input_box">
            <label for="email" class="input_label">Почта</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Почта">
        </div>
        <div class="register_input_box">
            <label for="password" class="input_label">Пароль</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Пароль">
        </div>

        <div class="btn_form">Отправить</div>
    </div>
</body>
</html>