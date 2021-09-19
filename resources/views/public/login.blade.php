<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Giriş Yap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="{{asset("template/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("template/css/signin.css")}}" rel="stylesheet">
</head>

<body class="text-center">
<form class="form-signin" method="POST">
    @csrf
    <h1 class="h3 mb-3 font-weight-normal">Kullanıcı Girişi</h1>
    <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
    <input type="password" name="pwd" id="inputPassword" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş Yap</button>
</form>
</body>
</html>

