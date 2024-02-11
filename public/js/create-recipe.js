let steps = document.querySelectorAll('.create-recipe-step');
let continueBtn = document.querySelector('.continue');
let addStepBtn = document.querySelector('.add-step')
let addIngredientsBtn = document.querySelector('.ingridient-plus');
let createRecipeBtn = document.querySelector('.submit-recipe');
let currentStep = 1;
let prepStep = 1;
const srSteps = [
    'Prvi',
    'Drugi',
    'Treći',
    'Četvrti',
    'Peti',
    'Šesti',
    'Sedmi',
    'Osmi',
    'Deveti',
    'Deseti',
    'Jedanaesti'
];

continueBtn.addEventListener('click', function() {
    steps[currentStep-1].classList.remove('active');
    steps[currentStep].classList.add('active');
    if(currentStep === 2) {
        this.parentElement.classList.add('two-button');
    } else {
        this.parentElement.classList.remove('two-button');
    }
    currentStep++;
});

addStepBtn.addEventListener('click', function() {
    let newInput = document.createElement('input');
    newInput.type = 'text';
    newInput.name = 'single_step';
    newInput.placeholder = srSteps[prepStep] + ' korak';
    prepStep++;
    steps[2].querySelector('.col-md-7').appendChild(newInput);
});

addIngredientsBtn.addEventListener('click', function() {
    let newRow = steps[1].querySelector('.ingredients-cont').cloneNode(true);
    steps[1].querySelector('.col-md-7').appendChild(newRow);
});

createRecipeBtn.addEventListener('click', function() {

});
