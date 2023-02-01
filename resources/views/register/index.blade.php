<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>{{$tittle}}</title>
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
  <form action="/register" method="POST">
    {{-- csrf untuk generate token --}}
    @csrf
  <h1 class="h3 mb-3 fw-normal text-center">REGISTRASI RT RW</h1>
  <div class="form-floating">
      {{-- untuk atribut input> name="name" <untuk namenya --}}
    <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{old('name')}}">
    <label for="name">Name</label>
    @error('name')
    <div  class="invalid-feedback">
      {{$message}}.
    </div>
    @enderror

  </div>

  <div class="form-floating">
    <input type="number" name="no_ktp" class="form-control @error('no_ktp') is-invalid @enderror" id="no_ktp" placeholder="no_ktp" required value="{{old('no_ktp')}}">
    <label for="no_ktp">Nomor KTP</label>
    @error('no_ktp')
    <div  class="invalid-feedback">
      {{$message}}.
    </div>
    @enderror
  </div>
  
  <div class="form-floating">
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{old('email')}}">
    <label for="email">Email Adress</label>
    @error('email')
    <div  class="invalid-feedback">
      {{$message}}.
    </div>
    @enderror
  </div>

  <div class="form-floating">
    <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
    <label for="password">Password</label>
    @error('password')
    <div  class="invalid-feedback">
      {{$message}}.
    </div>
    @enderror
  </div>

  <div class="checkbox mb-3">
  </div>
  <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Register</button>
</form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
  </body>
</html>
