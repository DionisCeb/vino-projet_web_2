@extends('layouts.app')
@section('title', 'Bienvenue')
@section('content')
<article class="intro-box flex-col-center gap20 height100">
    <header>
        <h1>Bienvenue sur l'application Vino</h1>
    </header>
    <p>Application de gestion de votre cellier</p>
    <div class="btn-container">
        <a href="{{ route('bottle.index') }}" class="btn btn-border">Afficher la liste des vins</a>
    </div>
</article>
@endsection