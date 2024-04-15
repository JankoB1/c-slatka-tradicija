@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
@endsection

@section('scriptsTop')
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
@endsection

@section('content')
    <table id="recipes-table">
        <thead>
            <tr>
                <th>Naziv recepta</th>
                <th>Akcije</th>
                <th>Email</th>
                <th>Datum kreiranja</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->title }}</td>
                    <td data-recipe-id="{{ $recipe->id }}">
                        <span class="delete-span" style="cursor: pointer; text-decoration: underline; color: red;">Izbriši</span>
                        @if($recipe->category != null)
                            <a target="_blank" href="{{ route('show-single-recipe', ['category' => $recipe->category->slug, 'slug' => $recipe->slug]) }}">Pogledaj</a>
                        @endif
                    </td>
                    <td>{{ $recipe->created_at }}</td>
                    <td>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scriptsBottom')
    <script>
        let table = new DataTable('#recipes-table', {
            responsive: true,
            pagingType: 'simple_numbers',
            columnDefs: [{
                targets: 3,
                orderable: true
            }],
            order: [[3, 'desc']]
        });

        document.addEventListener('DOMContentLoaded', function() {
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            document.querySelectorAll('#recipes-table tbody .delete-span').forEach((span) => {
                span.addEventListener('click', function(event) {
                    let recipeId = span.parentElement.dataset.recipeId;
                    fetch(`/recipes/remove-recipe/${recipeId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Content-Type': 'application/json'
                        },
                    }).then(response => {
                        span.parentElement.parentElement.remove();
                    }).catch(error => {
                        console.error('Error deleting recipe:', error);
                    });
                });
            })
        });
    </script>
@endsection
