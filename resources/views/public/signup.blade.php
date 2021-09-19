<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{asset("template/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("template/css/signin.css")}}" rel="stylesheet">
</head>

<body class="text-center">
<form class="form-signin" method="POST">
    @csrf
    @method("POST")
    <h1 class="h3 mb-3 font-weight-normal">Kayıt Ol</h1>
    <input type="text" name="firstName" class="form-control" placeholder="First Name" required autofocus>
    <br>
    <input type="text" name="lastName" class="form-control" placeholder="Last Name" required >
    <br>
    <input type="email" name="email" class="form-control" placeholder="Email address" required >
    <br>
    <input type="password" name="password" class="form-control" placeholder="Password" required >
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Kayıt Ol</button>
</form>
</body>
</html>
