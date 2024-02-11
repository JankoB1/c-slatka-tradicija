let dropdownTriggers = document.querySelectorAll('.dropdown-trigger');
dropdownTriggers.forEach((dropdownTrigger) => {
   dropdownTrigger.addEventListener('click', function() {
        this.parentElement.querySelector('.dropdown-links').classList.toggle('active');
        this.classList.toggle('active');
   });
});
