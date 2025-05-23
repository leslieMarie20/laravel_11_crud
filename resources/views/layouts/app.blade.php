<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Simple Laravel 11 CRUD Application Tutorial</title>
 <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.
min.css">
 <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
 @stack('styles')
</head>
<body> 
 @auth
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
 <div class="container">
 <a class="navbar-brand" href="#">Simple Laravel 11 CRUD Application Tutorial</a>
 <div class="ms-auto d-flex align-items-center">
 <span class="text-white me-3">Welcome, {{ Auth::user()->name }}</span>
 <form action="{{ route('logout') }}" method="POST" class="d-inline">
 @csrf
 <button type="submit" class="btn btn-outline-light">Logout</button>
 </form>
 </div>
 </div>
 </nav>
 @endauth

 <div class="container">
 @yield('content')
 <div class="row justify-content-center text-center mt-3">
 <div class="col-md-12">
<p>
Return to Website: <a
href="https://www.usjr.edu.ph/"><strong>University of San Jose -
Recoletos</strong></a>
</p>
 
 </div>
 </div>
 </div>
<script 
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bu
ndle.min.js"></script>
</body>
</html>