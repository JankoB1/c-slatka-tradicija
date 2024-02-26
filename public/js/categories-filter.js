let categoryBanners = document.querySelectorAll('.single-category-banner');
let subcategories = document.querySelectorAll('.single-category-subcategories');
let arrows = document.querySelectorAll('.arrow-col img');

categoryBanners.forEach((categoryBanner, i) => {
    categoryBanner.addEventListener('click', function() {
        subcategories[i].classList.toggle('active');
    });
});

arrows.forEach((arrow) => {
    arrow.addEventListener('click', function() {
        arrow.parentElement.parentElement.classList.remove('active');
    });
});
