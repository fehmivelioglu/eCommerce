<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container">
        @if(auth()->check())
            <p>Kullanıcı E-posta: {{ auth()->user()->email }}</p>
        @else
            <p>Kullanıcı giriş yapmamış.</p>
        @endif
        
        <button class="btn btn-primary">Bootstrap Buton</button>
    </div>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
