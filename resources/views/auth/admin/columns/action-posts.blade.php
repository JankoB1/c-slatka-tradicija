<div class="admin-actions" data-post-id="{{ $post->id }}">
    <a href="{{ route('show-edit-post', ['id' => $post->id]) }}" class="edit">Edit</a>
    <span class="delete-span" style="cursor: pointer; text-decoration: underline; color: red;">Izbriši</span>
</div>
