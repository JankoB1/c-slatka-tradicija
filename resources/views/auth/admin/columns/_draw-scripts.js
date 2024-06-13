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
            LaravelDataTables['recipes-table'].ajax.reload();
        }).catch(error => {
            console.error('Error deleting recipe:', error);
        });
    });
});

document.querySelectorAll('#recipes-table tbody .hide-recipe').forEach((span) => {
    span.addEventListener('click', function(event) {
        let recipeId = span.parentElement.dataset.recipeId;
        fetch(`/recipes/hide-recipe/${recipeId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
            },
        }).then(response => {
            LaravelDataTables['recipes-table'].ajax.reload();
        }).catch(error => {
            console.error('Error hiding recipe:', error);
        });
    });
});

document.querySelectorAll('#recipes-table tbody .show-recipe').forEach((span) => {
    span.addEventListener('click', function(event) {
        let recipeId = span.parentElement.dataset.recipeId;
        fetch(`/recipes/show-recipe/${recipeId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
            },
        }).then(response => {
            LaravelDataTables['recipes-table'].ajax.reload();
        }).catch(error => {
            console.error('Error showing recipe:', error);
        });
    });
});

document.querySelectorAll('#recipes-table tbody .winner').forEach((span) => {
    span.addEventListener('click', function(event) {
        let recipeId = span.parentElement.dataset.recipeId;
        fetch(`/recipes/win-recipe/${recipeId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
            },
        }).then(response => {
            LaravelDataTables['recipes-table'].ajax.reload();
        }).catch(error => {
            console.error('Error showing recipe:', error);
        });
    });
});

document.querySelectorAll('#recipes-table tbody .winner-del').forEach((span) => {
    span.addEventListener('click', function(event) {
        let recipeId = span.parentElement.dataset.recipeId;
        fetch(`/recipes/win-recipe-del/${recipeId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
            },
        }).then(response => {
            LaravelDataTables['recipes-table'].ajax.reload();
        }).catch(error => {
            console.error('Error showing recipe:', error);
        });
    });
});
