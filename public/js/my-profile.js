let navBtns = document.querySelectorAll('.single-btn p');
let profileRecipesContent = document.querySelectorAll('.profile-recipes-content');
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
