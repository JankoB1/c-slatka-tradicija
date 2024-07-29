<div class="admin-actions" data-recipe-id="{{ $recipe->id }}">
    @if($recipe->active == 'T')
        <span class="hide-recipe">Sakrij</span>
    @else
        <span class="show-recipe">Odobri</span>
    @endif
{{--    @if($recipe->old_recipe == 0 && $recipe->category != null)--}}
{{--        <a target="_blank" href="{{ route('show-edit-recipe', ['id' => $recipe->id]) }}">Izmeni</a>--}}
{{--    @endif--}}
    @if($recipe->contest_id == 0)
        <span class="winner">Proglasi pobednika</span>
    @else
        <span class="winner-del">Poništi pobednika</span>
    @endif
    @if($recipe->category != null)
        <a target="_blank" href="{{ route('show-single-recipe', ['category' => $recipe->category->slug, 'id' => $recipe->id, 'slug' => $recipe->slug]) }}">Pogledaj</a>
    @endif
        <a href="{{ route('show-edit-recipe', ['id' => $recipe->id]) }}" class="edit">Edit</a>
    <span class="delete-span" style="cursor: pointer; text-decoration: underline; color: red;">Izbriši</span>
</div>
