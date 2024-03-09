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

const queryString = window.location.search;
const params = new URLSearchParams(queryString);
const saved = params.get('saved');
if(saved !== null) {
    navBtns[1].click();
}
