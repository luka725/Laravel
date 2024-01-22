<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @auth
                            <p>Welcome, {{ Auth::user()->name }}!</p>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">Logout</button>
                            </form>
                        @else
                            <p>You are not logged in.</p>
                            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
<div id="category-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($categories as $index => $category)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <h2>{{ $category->name }}</h2>
                <div class="row">
                    @foreach ($category->products as $product)
                        <div class="col-md-3">
                            <!-- Product Card -->
                            <div class="card">
                                <img src="{{ $product->images[0]->file_path . '/' . $product->images[0]->file_name }}" class="card-img-top" alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p class="card-text">${{ $product->price }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#category-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#category-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@endsection