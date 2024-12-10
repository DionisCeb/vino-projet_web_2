@extends('layouts.app')
@section('title', 'Liste des Bouteiilles')
@section('content')

<x-header 
    image="{{ asset('img/header/cave.jpeg') }}" 
    title="Créez votre cellier" 
    subtitle="Votre collection est votre vie" 
/>

<main class="flex-center">
    <section class="structure flex-col-center height70">   
        <form class="form">
            <div class="form-control">
                <label for="name">Nom du Cellier</label>
                <input type="text" name="name" placeholder="Entrez le nom...">
            </div>
            <div class="form-control">
                <label for="description">Nom du Cellier</label>
                <textarea name="description"placeholder="Description de ce cellier...."></textarea>
            </div>
            <div class="form-control">
                <label for="type">Type du Cellier</label>
                <select name="type">
                    <option value="">Choisir le Type</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>
            </div>
            <button type="submit" class="btn-border">Créer le Cellier</button>
        </form>
    </section>
</main>

@endsection