<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>LGTBCREVILLENT</title>
	<link rel="icon" href="{{ asset('imagenes/LOGO.png') }}" type="image/gif" sizes="16x16">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link href="{{ asset('favicon/css/all.css') }}" rel="stylesheet"> <!--load all styles -->
</head> 
<body class="container-fluid pl-5" style="background-color: #DDDDDD;">
  <section id="app">
    <header class="mt-5">
      <h3> Error al acceder a la página </h3>
    </header>

    <main class="pt-4">
      <figure class="figure">
        <img src="/imagenes/LOGO.png" class="figure-img img-fluid rounded" alt="LgtbCrevillent" width="40%">
        <figcaption class="figure-caption">LgtbCrevillent</figcaption>
      </figure>
    </main>

    <footer class="pt-4">
      <a class="btn btn-outline-dark" role="button" href="{{ route('home') }}">Volver a inicio</a>
    </footer>
  </section>
</body>
</html>
