<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Регистрация</title>
    <link rel="icon" href="{{asset('img/red-smoke.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{asset('css/registration.css')}}" rel="stylesheet">
</head>
<body class="text-center">
<main class="form-signin">
    <form method="post" action="{{route('web.registration.store')}}">
        @csrf
        <img class="mb-4" src="{{asset('img/red-smoke.png')}}" alt="" width="90" height="90">
        <h1 class="h3 mb-3 fw-normal text-white">Новый пользователь</h1>
        <div class="form-floating">
            <input name="username" type="text" class="form-control" id="nameInput" placeholder="Name">
            <label for="nameInput">Имя пользователя</label>
        </div>
        <div class="form-floating">
            <input name="phone" type="tel" class="form-control" id="phoneInput" placeholder="Phone">
            <label for="phoneInput">Телефон</label>
        </div>
        <div class="form-floating">
            <input name="email" type="email" class="form-control" id="emailInput" placeholder="name@example.com">
            <label for="emailInput">Email</label>
        </div>
        <div class="form-floating">
            <input name="password" type="password" class="form-control" id="passwordInput" placeholder="Password">
            <label name="passwordConfirm" for="passwordInput">Пароль</label>
        </div>
        <div class="form-floating mb-3">
            <input name="passwordConfirm" type="password" class="form-control" id="passwordConfirmInput" placeholder="Password">
            <label for="passwordConfirmInput">Пароль еще раз</label>
        </div>
        <button class="w-100 btn btn-lg btn-light" type="submit">Регистрация</button>
    </form>
</main>
</body>
</html>
