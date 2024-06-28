let navBtns = document.querySelectorAll('.single-btn p');
let profileRecipesContent = document.querySelectorAll('.profile-recipes-content');
let profileImg = document.querySelector('.profile-img');
let imageInput = document.querySelector('.image-input');
let deleteRecipeBtns = document.querySelectorAll('.del-recipe');
navBtns.forEach((btn, i) => {
    btn.addEventListener('click', function() {
        let activeBtn = document.querySelector('.single-btn p.active');
        if(activeBtn) {
            activeBtn.classList.remove('active');
        }
        let activeContent = document.querySelector('.profile-recipes-content.active');
        if(activeContent) {
            activeContent.classList.remove('active');
        }
        this.classList.add('active');
        profileRecipesContent[i].classList.add('active');
    });
});

profileImg.addEventListener('click', function() {
    imageInput.click();
});

imageInput.addEventListener('change', function(e) {
    let file = e.target.files[0];
    let formData = new FormData();
    formData.append('image', file);

    let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

    jQuery.ajax({
        url: '/upload-image-profile',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(data) {
            profileImg.style.backgroundImage = "url('" + window.origin +  "/storage/" + data + "')";
        },
        error: function(error) {
            console.error('Error uploading image:', error);
        }
    });
});

deleteRecipeBtns.forEach((deleteRecipeBtn) => {
    deleteRecipeBtn.addEventListener('click', function() {
        let recipeId = this.dataset.recipeId;
        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        Swal.fire({
            title: 'Da li siguran/na da želiš da izbrišeš recept?',
            showDenyButton: true,
            confirmButtonText: 'Da',
            denyButtonText: 'Ne',
            showCancelButton: false,
            customClass: {
                confirmButton: 'del-recipe-sw',
                denyButton: 'nodel-recipe-sw',
            },
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/recipes/remove-recipe/${recipeId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json'
                    },
                }).then(response => {
                    this.parentElement.parentElement.remove();
                }).catch(error => {
                    console.error('Error deleting recipe:', error);
                });
            }
        })
    });
});

const queryString = window.location.search;
const params = new URLSearchParams(queryString);
const saved = params.get('saved');
if(saved !== null) {
    navBtns[1].click();
}
