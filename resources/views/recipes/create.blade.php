@extends('layouts.app')

@section('title', 'Create a New Recipe')

@section('content')
    <h2> Napravi novi recept</h2>

    <form action="{{ route('recipes.store') }}" method="post">
        @csrf
        <label> Email</label>
        <input type="text" name="userEmail">
        <br>

        <label> Ime ili nadimak</label>
        <input type="text" name="userName">
        <br>

        <label> Ne zelim da moje ime bude objavljeno uz naziv recepta </label>
        <input type="checkbox" name="publicName" value="0">
        <br>

        <label> Kategorija recepta</label>
        <select name="category">
            @forelse($categories as $category)
                <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
            @empty
                <option> Ne postoji nijedna kategorija. </option>
            @endforelse
        </select>
        <br>

        <label> Naziv recepta </label>
        <input type="text" name="title">
        <br>

        <label> Tezina pripreme </label>
        <select name="difficulty" size="3">
            <option> Lako </option>
            <option> Srednje </option>
            <option> Tesko </option>
        </select>
        <br>

        <label> Vreme pripreme </label>
        <select name="preparationTime" size="3">
            <option> 10 min </option>
            <option> 20 min </option>
            <option> 30 min </option>
        </select>
        <br>

        <label> Opis recepta </label>
        <textarea name="description" ></textarea>
        <br>

        <label> Sastojci </label>
        <textarea name="ingredients"></textarea>
        <br>

        <label> Kako se priprema?</label>
        <textarea name="preparationDescription"></textarea>
        <br>

        <label> Dodatan savet </label>
        <textarea name="additionalDescription"></textarea>
        <br>

        <button type="submit">Create Recipe</button>
    </form>
@endsection
