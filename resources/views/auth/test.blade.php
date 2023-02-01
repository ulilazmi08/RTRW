<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Lupa Password</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
   
<main class="form-signin">
    <form action="/reset-password-submit" method="POST">
        @csrf
    <input type="hidden" name="token" value="{{ $token }}">
  <h1 class="h3 mb-3 fw-normal text-center">Lupa Password</h1>
  <div class="form-floating">
    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
    <input type="text" id="email" class="form-control" name="email" required autofocus>
    @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif
  </div>
  <div class="form-floating">
    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
    <input type="password" id="password" class="form-control" name="password" required autofocus>
    @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
    @endif
  </div>
  <div class="form-floating">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required autofocus>
    @if ($errors->has('password_confirmation'))
        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
    @endif
  </div>

  <div class="checkbox mb-3">
  </div>
  <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Kirim Password</button>
</form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
  </body>
</html>
