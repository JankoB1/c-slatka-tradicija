let steps = document.querySelectorAll('.create-recipe-step');
let continueBtn = document.querySelector('.continue');
// let addStepBtn = document.querySelector('.add-step')
// let addIngredientsBtn = document.querySelector('.ingridient-plus');
let createRecipeBtn = document.querySelector('.submit-recipe');
let currentStep = 1;
let prepStep = 1;
let addGroupIngredient = document.querySelector('.add-group-ingredient');
let addIngredient = document.querySelector('.add-ingredient');
let ingredientsInner = document.querySelector('.ingredients-inner');
let singleIngredientsInner = document.querySelector('.single-ingredients-inner');
let singleStepsInner = document.querySelector('.single-steps-inner');
let stepsInner = document.querySelector('.steps-inner');
let addGroupStep = document.querySelector('.add-group-step');
let addStep = document.querySelector('.add-single-step');
let category = document.querySelector('select[name="category"]');
let subcategory = document.querySelector('select[name="subcategory"]');
let products = [];
let productsIngredients = document.querySelector('.products-ingredients');
let ingredientsSection = document.querySelector('.ingredients-section');
let addImageBtn = document.querySelector('.add-image');
let smallSteps = document.querySelectorAll('.single-small-step');
let imagesUploaded = [];
let imagesFinal = [];

jQuery.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    url: window.origin + '/get-all-products',
    method: 'GET',
    success: function(response) {
        products = response;
    }
});

const imageControls = `<div class="row image-controls-row">
    <div class="col-md-4">
        <img class="delete-img" src="${window.origin + '/images/delete-img.png'}" alt="delete img">
    </div>
    <div class="col-md-4" style="display: flex; justify-content: center; column-gap: 10px;">
        <img class="plus-img" src="${window.origin + '/images/zoom-plus-img.png'}" alt="zoom img">
        <img class="minus-img" src="${window.origin + '/images/zoom-minus-img.png'}" alt="zoom img">
        <img src="${window.origin + '/images/left-img.png'}" alt="left img">
        <img src="${window.origin + '/images/right-img.png'}" alt="right img">
    </div>
    <div class="col-md-4">
        <button type="button">Završeno</button>
    </div>
</div>`;

// const srSteps = [
//     'Prvi',
//     'Drugi',
//     'Treći',
//     'Četvrti',
//     'Peti',
//     'Šesti',
//     'Sedmi',
//     'Osmi',
//     'Deveti',
//     'Deseti',
//     'Jedanaesti'
// ];

const subcategories = [
    [
        {'Čokoladne torte': 25},
        {'Voćne torte': 26},
        {'Kremaste torte': 27}
    ],
    [
        {'Sitni kolači': 28},
        {'Voćni kolači': 29},
        {'Čokoladni kolači': 30},
        {'Kremasti kolači': 31},
        {'Oblande': 21},
        {'Biskvitni kolači': 33}
    ],
    [
        {'Hleb i pogače': 34},
        {'Slatka peciva': 35},
        {'Slana peciva': 36},
        {'Predjela': 37}
    ],
    [
        {'Slatka zimnica': 38},
        {'Kisela zimnica': 39}
    ],
    [
        {'Sladoled': 41},
        {'Voćne salate i kupovi': 42},
        {'Deserti u čaši': 43}
    ]
];

category.addEventListener('change', function() {
    subcategory.innerHTML = '';
    let subArr = subcategories[parseInt(this.value)];
    subArr.forEach((el) => {
        Object.entries(el).forEach(([key, value]) => {
            subcategory.innerHTML += `<option value="${value}">${key}</option>`;
        });
    });
});

const newIngredientHtml = `<div class="row ingredients-cont">
                                    <input type="hidden" name="ingredient_product" value="">
                                    <div class="col-md-6">
                                        <input type="text" name="ingredient_name" placeholder="Naziv sastojka">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="text" name="ingredient_quantity" placeholder="Količina (izaberi)">
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="ingredient_measure" placeholder="Jedinica mere (izaberi)">
                                            </div>
                                            <div class="col-md-2">
                                                <span class="ingridient-plus"><img src="${window.origin + '/images/ingridient-plus.svg'}" alt="dodaj sastojak"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;

const newIngredientHtmlNoAdd = `<div class="row ingredients-cont">
                                    <input type="hidden" name="ingredient_product" value="">
                                    <div class="col-md-6">
                                        <input type="text" name="ingredient_name" placeholder="Naziv sastojka">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="text" name="ingredient_quantity" placeholder="Količina (izaberi)">
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="ingredient_measure" placeholder="Jedinica mere (izaberi)">
                                            </div>
                                        </div>
                                    </div>
                                </div>`;

continueBtn.addEventListener('click', function() {
    steps[currentStep-1].classList.remove('active');
    steps[currentStep].classList.add('active');
    smallSteps[currentStep-1].classList.add('passed');
    smallSteps[currentStep].classList.add('current');
    currentStep++;
});

// addStepBtn.addEventListener('click', function() {
//     let newInput = document.createElement('input');
//     newInput.type = 'text';
//     newInput.name = 'single_step';
//     newInput.placeholder = srSteps[prepStep] + ' korak';
//     prepStep++;
//     steps[2].querySelector('.col-md-7').appendChild(newInput);
// });

addGroupIngredient.addEventListener('click', function() {
    let newGroupCont = document.createElement('div');
    newGroupCont.classList.add('single-ingredient-group');
    let groupName = document.createElement('input');
    groupName.type = 'text';
    groupName.name = 'ingredient_group_name';
    groupName.placeholder = 'Naziv grupe sastojaka'
    newGroupCont.appendChild(groupName);
    let newIngredient = document.createElement('div');
    newIngredient.innerHTML = newIngredientHtml;
    let inEl = newIngredient.querySelector('input[name="ingredient_name"]');
    inEl.addEventListener('input', function() {
        searchProducts(this);
    });
    newGroupCont.appendChild(newIngredient);
    let addIngredientInGroup = newIngredient.querySelector('span');
    addIngredientInGroup.addEventListener('click', function() {
        let newGroupIngredient = document.createElement('div');
        newGroupIngredient.innerHTML = newIngredientHtmlNoAdd;
        let ingredientName = newGroupIngredient.querySelector('input[name="ingredient_name"]');
        ingredientName.addEventListener('input', function() {
            searchProducts(this);
        });
        newGroupCont.appendChild(newGroupIngredient);
    });
    ingredientsInner.appendChild(newGroupCont);
});

addGroupStep.addEventListener('click', function() {
    let newGroupCont = document.createElement('div');
    newGroupCont.classList.add('single-step-group');
    let groupName = document.createElement('input');
    groupName.type = 'text';
    groupName.name = 'step_group_name';
    groupName.placeholder = 'Naziv grupe koraka'
    newGroupCont.appendChild(groupName);
    let newRowStep = document.createElement('div');
    newRowStep.classList.add('row');
    let newStep = document.createElement('input');
    newStep.type = 'text';
    newStep.name = 'single_step';
    newStep.placeholder = 'Opiši korak';
    newGroupCont.appendChild(newStep);
    let addNewStepBtn = document.createElement('span');
    addNewStepBtn.classList.add('ingridient-plus');
    addNewStepBtn.innerHTML = `<img src="${window.origin + '/images/ingridient-plus.svg'}" alt="dodaj sastojak">`;
    addNewStepBtn.addEventListener('click', function() {
        let newStepInGroup = document.createElement('input');
        newStepInGroup.type = 'text';
        newStepInGroup.name = 'single_step';
        newStepInGroup.placeholder = 'Opiši korak';
        newGroupCont.appendChild(newStepInGroup);
    });
    newGroupCont.appendChild(addNewStepBtn);
    stepsInner.appendChild(newGroupCont);
});

addIngredient.addEventListener('click', function() {
    let newRow = document.createElement('div');
    newRow.innerHTML = newIngredientHtmlNoAdd;
    singleIngredientsInner.appendChild(newRow);
});

addStep.addEventListener('click', function() {
    let newStep = document.createElement('input');
    newStep.type = 'text';
    newStep.name = 'single_step';
    newStep.placeholder = 'Opiši korak';
    singleStepsInner.appendChild(newStep);
});

createRecipeBtn.addEventListener('click', function(e) {
    e.preventDefault();

    let title = document.querySelector('form input[name="title"]').value;
    let cat = category.value;
    let subCat = subcategory.value;
    let difficulty = document.querySelector('form select[name="difficulty"]').value;
    let preparationTime = document.querySelector('form select[name="preparation_time"]').value;
    let portionNum = document.querySelector('form input[name="portion_number"]').value;
    let description = document.querySelector('textarea[name="description"]').value;

    let ingredientGroups = document.querySelectorAll('.single-ingredient-group');
    let independentIngredients = document.querySelectorAll('.single-ingredients-inner .ingredients-cont');
    let ingredientGroupsParsed = [];
    let independentIngredientsParsed = [];

    let stepGroups = document.querySelectorAll('.single-step-group');
    let independentSteps = document.querySelectorAll('.single-steps-inner input[name="single_step"]');
    let stepGroupsParsed = [];
    let independentStepsParsed = [];

    ingredientGroups.forEach((singleGroup) => {
        let groupName = singleGroup.querySelector('input[name="ingredient_group_name"]').value;
        let groupIngredients = singleGroup.querySelectorAll('.ingredients-cont');
        let ingredients = [];
        groupIngredients.forEach((single) => {
            let name = single.querySelector('input[name="ingredient_name"]').value;
            let qty = single.querySelector('input[name="ingredient_quantity"]').value;
            let measure = single.querySelector('input[name="ingredient_measure"]').value;
            let product = single.querySelector('input[type="hidden"]').value;
            ingredients.push({
                title: name + ' ' + qty + ' ' + measure,
                product: product === ''? null: product
            });
        });
        let group = {
            name: groupName,
            ingredients: ingredients
        }
        ingredientGroupsParsed.push(group);
    });

    independentIngredients.forEach((single) => {
        let name = single.querySelector('input[name="ingredient_name"]').value;
        let qty = single.querySelector('input[name="ingredient_quantity"]').value;
        let measure = single.querySelector('input[name="ingredient_measure"]').value;
        let product = single.querySelector('input[type="hidden"]').value;
        independentIngredientsParsed.push({
            title: name + ' ' + qty + ' ' + measure,
            product: product === ''? null: product
        });
    });

    stepGroups.forEach((singleGroup) => {
        let groupName = singleGroup.querySelector('input[name="step_group_name"]').value;
        let groupSteps = singleGroup.querySelectorAll('input[name="single_step"]');
        let gSteps = [];
        groupSteps.forEach((single) => {
            gSteps.push(single.value);
        });
        let group = {
            name: groupName,
            steps: gSteps
        }
        stepGroupsParsed.push(group);
    });

    independentSteps.forEach((single) => {
        independentStepsParsed.push(single.value);
    });

    let ingredients = {
        ingredientGroups: ingredientGroupsParsed,
        ingredients: independentIngredientsParsed
    }

    let stepsForm = {
        stepGroups: stepGroupsParsed,
        steps: independentStepsParsed
    }

    let imagesToDelete = [];
    imagesUploaded.forEach((image) => {
        if(!imagesFinal.includes(image)) {
            imagesToDelete.push(image);
        }
    });

    let data = {
        title: title,
        cat: cat,
        subCat: subCat,
        difficulty: difficulty,
        preparationTime: preparationTime,
        portionNum: portionNum,
        description: description,
        ingredients: ingredients,
        steps: stepsForm,
        imagesFinal: imagesFinal,
        imagesToDelete: imagesToDelete
    }

    jQuery.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: window.origin + '/recipes/store',
        data: JSON.stringify(data),
        contentType: 'application/json',
        method: 'POST',
        success: function(response) {
            console.log(response);
        }
    });
});

function searchProducts(target) {
    let searched = products.filter((p) => {
       return p.name.toLowerCase().includes(target.value.toLowerCase());
    });
    if(searched.length > 0) {
        productsIngredients.classList.add('active');
        let top = target.getBoundingClientRect().top - ingredientsSection.getBoundingClientRect().top + 65;
        productsIngredients.style.top = top + 'px';
    } else {
        productsIngredients.classList.remove('active');
    }
}

addImageBtn.addEventListener('click', function() {
    let addImageInput = document.createElement('input');
    addImageInput.type = 'file';
    addImageInput.style.display = 'none';
    addImageInput.addEventListener('change', function() {
        let formData = new FormData();
        formData.append('image', addImageInput.files[0]);

        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: window.origin + '/recipes/upload-image',
            data: formData,
            processData: false, // Important: prevents jQuery from automatically processing the FormData object
            contentType: false, // Important: prevents jQuery from automatically setting the content type
            method: 'POST',
            success: function(response) {
                imagesUploaded.push(response);
                let imagePath = window.origin + '/storage/' + response;
                let newImg = document.createElement('div');
                newImg.classList.add('single-img');
                newImg.style.backgroundImage = 'url("' + imagePath + '")';
                let newDiv = document.createElement('div');
                newDiv.classList.add('single-image-div');
                newDiv.appendChild(newImg)
                let newImagesRow = document.createElement('div');
                newImagesRow.innerHTML = imageControls;
                newDiv.appendChild(newImagesRow);
                document.querySelector('.images').appendChild(newDiv);

                let plusImg = newImagesRow.querySelector('.plus-img');
                plusImg.addEventListener('click', function() {
                    let backgroundSize = newImg.style.backgroundSize;
                    if(backgroundSize === '') {
                        newImg.style.backgroundSize = '110%';
                    } else {
                        newImg.style.backgroundSize = parseInt(backgroundSize.slice(0, -1)) + 10 + '%';
                    }
                });

                let minusImg = newImagesRow.querySelector('.minus-img');
                minusImg.addEventListener('click', function() {
                    let backgroundSize = newImg.style.backgroundSize;
                    if(backgroundSize === '') {
                        newImg.style.backgroundSize = '90%';
                    } else {
                        newImg.style.backgroundSize = parseInt(backgroundSize.slice(0, -1)) - 10 + '%';
                    }
                });

                let deleteImg = newImagesRow.querySelector('.delete-img');
                deleteImg.addEventListener('click', function() {
                    newImagesRow.parentElement.remove();

                });

                let doneBtn = newImagesRow.querySelector('button');
                doneBtn.addEventListener('click', function() {
                    domtoimage.toPng(newDiv.querySelector('.single-img'), { quality: 0.99, height: 356,  width: 734 })
                        .then(dUrl => {
                            domtoimage.toPng(newDiv.querySelector('.single-img'), { quality: 0.99, height: 356,  width: 734 })
                                .then(dataUrl => {
                                    let imageElement = new Image();
                                    imageElement.src = dataUrl;
                                    let currentTimeSeconds = Math.floor(Date.now() / 1000);
                                    let imageName = currentTimeSeconds + '.png';
                                    saveMaskImage(dataUrl, 0, imageName);
                                    imagesUploaded.push(imageName);
                                    imagesFinal.push(imageName);
                                    newImagesRow.classList.add('done');
                                });
                        });
                });

            },
            error: function(xhr, status, error) {
                console.error('Error uploading image:', error);
            }
        });

    });
    document.querySelector('.create-recipe-step[data-step="4"]').appendChild(addImageInput);
    addImageInput.click();
});

function saveMaskImage(dataUrl, xOffset, imageName) {
    jQuery.ajax({
        url: window.location.origin + '/recipes/add-image', method: 'post', headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }, data: {
            'imageData': dataUrl,
            'xOffset': xOffset,
            'imageName': imageName
        },  success: function (result) {
        }
    });
}
