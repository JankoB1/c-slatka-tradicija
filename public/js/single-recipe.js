let likeBtn = document.querySelector('.like');
let saveBtn = document.querySelector('.save');

likeBtn.addEventListener('click', function() {
    let data = {
        action: true,
        recipe_id: parseInt(document.querySelector('#recipe-gallery').dataset.recipeId)
    };

    jQuery.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: window.origin + '/handle-like',
        data: JSON.stringify(data),
        contentType: 'application/json',
        method: 'POST',
        success: function(response) {
            console.log(response);
        }
    });
});

saveBtn.addEventListener('click', function() {
    let data = {
        action: true,
        recipe_id: parseInt(document.querySelector('#recipe-gallery').dataset.recipeId)
    };

    jQuery.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: window.origin + '/handle-save',
        data: JSON.stringify(data),
        contentType: 'application/json',
        method: 'POST',
        success: function(response) {
            console.log(response);
        }
    });
});
