let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
document.querySelectorAll('#posts-table tbody .delete-span').forEach((span) => {
    span.addEventListener('click', function(event) {
        let postId = span.parentElement.dataset.postId;
        fetch(`/delete-post/${postId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
            },
        }).then(response => {
            LaravelDataTables['posts-table'].ajax.reload();
        }).catch(error => {
            console.error('Error deleting post:', error);
        });
    });
});
