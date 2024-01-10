@extends('layouts.app')

@section('title', 'Svi recepti')

@section('content')
    <h2> Svi recepti </h2>

    @forelse($recipes as $recipe)
        <h3> {{$recipe->title}}</h3>
        <p> {{$recipe->description}}</p>
        @empty
        <h2> Trenutno ne postoji nijedan recept.</h2>
    @endforelse
@endsection
