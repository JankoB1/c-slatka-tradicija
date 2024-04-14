let likeBtn = document.querySelector('.like');
let saveBtn = document.querySelector('.save');
let addToBook = document.querySelector('.add-to-book');
let recipeBooks = localStorage.getItem('recipeBooks');
let recipeId = parseInt(document.querySelector('#recipe-gallery').dataset.recipeId);
let print = document.querySelector('.print');
let share = document.querySelector('.share');
let loginPopup = document.querySelector('#login-popup');

recipeBooks = recipeBooks ? JSON.parse(recipeBooks) : [];
let index = recipeBooks.indexOf(recipeId);
if (index !== -1) {
    addToBook.classList.add('active');
}
likeBtn.addEventListener('click', function() {
    if(loginPopup) {
        let modal = new bootstrap.Modal(loginPopup);
        modal.show();
    } else {
        let data = {
            action: !this.classList.contains('active'),
            recipe_id: recipeId
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
                likeBtn.classList.toggle('active');
                let num = likeBtn.querySelector('p');
                if(data.action) {
                    num.innerText = parseInt(num.innerText.trim()) + 1;
                } else {
                    num.innerText = parseInt(num.innerText.trim()) - 1;
                }
            }
        });
    }
});

saveBtn.addEventListener('click', function() {
    if(loginPopup) {
        let modal = new bootstrap.Modal(loginPopup);
        modal.show();
    } else {
        let data = {
            action: !this.classList.contains('active'),
            recipe_id: recipeId
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
                saveBtn.classList.toggle('active');
            }
        });
    }
});

addToBook.addEventListener('click', function() {
    let index = recipeBooks.indexOf(recipeId);
    if (index !== -1) {
        recipeBooks.splice(index, 1);
        addToBook.classList.remove('active');
        document.querySelector('.books-popup p[data-recipe-id="' + recipeId + '"]').remove();
        document.querySelector('.books-popup-mobile p[data-recipe-id="' + recipeId + '"]').remove();
    } else {
        recipeBooks.push(recipeId);
        addToBook.classList.add('active');

        let newP = document.createElement('p');
        newP.dataset.recipeId = recipeId;
        newP.innerText = document.querySelector('h1').innerText;
        let newI = document.createElement('i');
        newI.classList.add('fa-solid', 'fa-xmark');
        newP.appendChild(newI);
        document.querySelector('.books-popup .inner').appendChild(newP);

        let newPClone = document.createElement('p');
        newPClone.dataset.recipeId = recipeId;
        newPClone.innerText = document.querySelector('h1').innerText;
        let newIClone = document.createElement('i');
        newIClone.classList.add('fa-solid', 'fa-xmark');
        newPClone.appendChild(newIClone);
        document.querySelector('.books-popup-mobile .books-recipes').appendChild(newPClone);

        newI.addEventListener('click', function() {
            addToBook.click();
        });

        newIClone.addEventListener('click', function() {
            addToBook.click();
        });
    }
    let updatedRecipeBooks = JSON.stringify(recipeBooks);
    localStorage.setItem('recipeBooks', updatedRecipeBooks);

    let recipeIds = localStorage.getItem('recipeBooks') ? JSON.parse(localStorage.getItem('recipeBooks')) : [];
    if(recipeIds.length !== 0) {
        document.querySelectorAll('span.num')[0].innerText = recipeIds.length;
        document.querySelectorAll('span.num')[0].classList.add('active');
        document.querySelectorAll('span.num')[1].innerText = recipeIds.length;
        document.querySelectorAll('span.num')[1].classList.add('active');
    }
});

print.addEventListener('click', function() {
    window.print();
});

share.addEventListener('click', function() {
    let shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(window.location.href)}&src=sdkpreparse`;
    window.open(shareUrl, '_blank');
});
