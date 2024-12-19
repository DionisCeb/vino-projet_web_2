@extends('layouts.app')
@section('title', 'Liste des Bouteiilles')
@section('content')

<x-header 
    image="{{ asset('img/header/header.jpg') }}" 
    title="Découvrez notre collection" 
    subtitle="C'est ce dont nous sommes fiers" 
/>

<main class="flex-center">
    <section class="structure flex-col gap20">
        <header class="filters-container">
        <!--Filtres-->
        <div class="custom-select-container">
            <div class="custom-select">
                <span class="select-text">Filtres</span>
                <span class="select-icon">
                    <i class="fa-solid fa-filter"></i>
                </span>
            </div>
            <select class="hidden-select">
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
            </select>
        </div>
        <!--Options-->
        <div class="custom-select-container">
            <div class="custom-select">
                <span class="select-text">Options</span>
                <span class="select-icon">
                    <i class="fa-solid fa-gear"></i>
                </span>
            </div>
            <select class="hidden-select">
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
            </select>
        </div>
        </header>
        
        <section class="grid">
            @if ($bottles->isEmpty())
                <p>Aucune bouteille disponible.</p>
            @else
            @foreach ($bottles as $bottle)
                    <article class="card_bottle">
                        <picture>
                            <img src="{{ $bottle->image_src ?? asset('img/gallery/bottle_1.webp') }}" alt="{{ $bottle->title }}">
                        </picture>
                        <div class="card-title">
                            <h2>
                                {{ $bottle->title }}
                            </h2>
                        </div>
                        <div class="card-category">
                            <p>{{ $bottle->color }}</p>
                            <div class="line"></div>
                            <p>{{ $bottle->size }}</p>
                            <div class="line"></div>
                            <p>{{ $bottle->country }}</p>
                        </div>
                        <div class="price">
                            {{ $bottle->price }}
                        </div>
                        <a href="" class="btn-border">Ajouter au cellier</a>
                    </article>
                @endforeach
            </div>
        @endif
        </section>

    </section>
</main>

@endsection