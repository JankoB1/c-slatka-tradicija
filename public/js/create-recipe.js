let steps = document.querySelectorAll('.create-recipe-step');
let continueBtn = document.querySelector('.continue');
let previousBtn = document.querySelector('.previous');
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
const smallStepsElement = document.querySelector('.small-steps');
const scrollPosition = smallStepsElement.getBoundingClientRect().top + window.scrollY - 100;
let editRecipeId = document.querySelector('#recipe-form').dataset.edit;

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

let loginPopup = document.querySelector('#login-popup');
if(loginPopup) {
    document.querySelector('.create-recipe-step .col-md-7').addEventListener('click', function(e) {
        e.preventDefault();
        let modal = new bootstrap.Modal(loginPopup);
        modal.show();
    });
}

document.body.addEventListener('click', function (event) {
    if (!productsIngredients.contains(event.target)) {
        productsIngredients.classList.remove('active');
    }
});

const imageControls = `<div class="row image-controls-row">
    <div class="col-3">
        <img class="delete-img" src="${window.origin + '/images/delete-img.png'}" alt="delete img">
    </div>
    <div class="col-6" style="display: flex; justify-content: center; column-gap: 10px; visibility: hidden;">
        <img class="plus-img" src="${window.origin + '/images/zoom-plus-img.png'}" alt="zoom img">
        <img class="minus-img" src="${window.origin + '/images/zoom-minus-img.png'}" alt="zoom img">
        <img class="left-img" src="${window.origin + '/images/left-img.png'}" alt="left img">
        <img class="right-img" src="${window.origin + '/images/right-img.png'}" alt="right img">
        <img class="top-img" src="${window.origin + '/images/left-img.png'}" alt="top img">
        <img class="bottom-img" src="${window.origin + '/images/left-img.png'}" alt="bottom img">
    </div>
    <div class="col-md-3">
        <button class="finish-btn" type="button">Završeno</button>
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

if(editRecipeId) {
    let catId = document.querySelector('input[name="cat_id"]').value;
    const subarrayIndex = subcategories.findIndex(subarray =>
        subarray.some(obj => Object.values(obj).includes(parseInt(catId)))
    );
    console.log(subarrayIndex)
    category.value = subarrayIndex;
    let event = new Event('change');
    category.dispatchEvent(event);
    subcategory.value = parseInt(catId);
    subcategory.dispatchEvent(event);
}

const newIngredientHtml = `<div class="row ingredients-cont">
                                    <input type="hidden" name="ingredient_product" value="">
                                    <div class="col-md-6 col-10">
                                        <textarea type="text" name="ingredient_name" placeholder="Naziv sastojka"></textarea>
                                    </div>
                                    <div class="col-md-6 col-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" name="ingredient_quantity" placeholder="Količina">
                                            </div>
                                            <div class="col-md-6">
                                                <select name="ingredient_measure">
                                                    <option value="">Jedinica mere</option>
                                                    <option value="g">g</option>
                                                    <option value="kg">kg</option>
                                                    <option value="ml">ml</option>
                                                    <option value="malo">malo</option>
                                                    <option value="prstohvat">prstohvat</option>
                                                    <option value="kašika">kašika</option>
                                                    <option value="kesica">kesica</option>
                                                    <option value="čaša">čaša</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <i class="fa-solid fa-minus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;

const newIngredientHtmlNoAdd = `<div class="row ingredients-cont">
                                    <input type="hidden" name="ingredient_product" value="">
                                    <div class="col-md-6 col-10">
                                        <textarea type="text" name="ingredient_name" placeholder="Naziv sastojka"></textarea>
                                    </div>
                                    <div class="col-md-6 col-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" name="ingredient_quantity" placeholder="Količina">
                                            </div>
                                            <div class="col-md-6">
                                                <select name="ingredient_measure">
                                                    <option value="">Jedinica mere</option>
                                                    <option value="g">g</option>
                                                    <option value="kg">kg</option>
                                                    <option value="ml">ml</option>
                                                    <option value="malo">malo</option>
                                                    <option value="prstohvat">prstohvat</option>
                                                    <option value="kašika">kašika</option>
                                                    <option value="kesica">kesica</option>
                                                    <option value="čaša">čaša</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <i class="fa-solid fa-minus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;

continueBtn.addEventListener('click', function() {
    if(currentStep === 1) {
        if(!validateFirstStep()) {
            return;
        }
    } else if(currentStep === 2) {
        if(!validateSecondStep()) {
            return;
        }
    } else if(currentStep === 3) {
        if(!validateThirdStep()) {
            return;
        }
        this.classList.add('hidden');
    }
    steps[currentStep-1].classList.remove('active');
    steps[currentStep].classList.add('active');
    smallSteps[currentStep-1].classList.add('passed');
    smallSteps[currentStep].classList.add('current');
    currentStep++;
    if(currentStep === 2) {
        document.querySelector('.buttons-cont').classList.remove('one-btn');
    }
    window.scrollTo({
        top: scrollPosition,
        behavior: 'smooth'
    });

    console.log(scrollPosition);

});

previousBtn.addEventListener('click', function() {
    steps[currentStep-1].classList.remove('active');
    steps[currentStep-2].classList.add('active');
    smallSteps[currentStep-1].classList.remove('active');
    smallSteps[currentStep-1].classList.remove('current');
    smallSteps[currentStep-2].classList.remove('passed');
    smallSteps[currentStep-2].classList.add('current');
    currentStep--;
    if(currentStep === 1) {
        document.querySelector('.buttons-cont').classList.add('one-btn');
    } else if(currentStep === 3) {
        continueBtn.classList.remove('hidden');
    }
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
    newGroupCont.classList.add('row');
    let newGroupContCol = document.createElement('div');
    newGroupContCol.classList.add('col-md-11');
    newGroupContCol.classList.add('col-10');
    let newGroupContColDel = document.createElement('div');
    newGroupContColDel.classList.add('col-md-1');
    newGroupContColDel.classList.add('col-2');
    let deleteIcon = document.createElement('span');
    deleteIcon.classList.add('ingredient-plus');
    deleteIcon.innerHTML = `<img src="${window.origin + '/images/ingridient-plus.svg'}" alt="dodaj sastojak"></span>`;
    newGroupContColDel.appendChild(deleteIcon);
    let groupName = document.createElement('input');
    groupName.type = 'text';
    groupName.name = 'ingredient_group_name';
    groupName.placeholder = 'Naziv grupe sastojaka';
    newGroupContCol.appendChild(groupName);
    newGroupCont.appendChild(newGroupContCol);
    newGroupCont.appendChild(newGroupContColDel);
    let newIngredient = document.createElement('div');
    newIngredient.innerHTML = newIngredientHtml;
    let inEl = newIngredient.querySelector('textarea[name="ingredient_name"]');
    inEl.addEventListener('input', function() {
        searchProducts(this);
    });
    deleteIcon.addEventListener('click', function() {
        let newGroupIngredient = document.createElement('div');
        newGroupIngredient.innerHTML = newIngredientHtmlNoAdd;
        let ingredientName = newGroupIngredient.querySelector('textarea[name="ingredient_name"]');
        ingredientName.addEventListener('input', function() {
            searchProducts(this);
        });
        let deleteSingleIngredient = newGroupIngredient.querySelector('i');
        deleteSingleIngredient.addEventListener('click', function() {
            let num = this.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.querySelectorAll('.ingredients-cont').length;
            if(num !== 1) {
                this.parentElement.parentElement.parentElement.parentElement.remove();
            } else {
                this.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.remove();
            }
        });
        newGroupCont.appendChild(newGroupIngredient);
    });
    newGroupCont.appendChild(newIngredient);
    let deleteIconSingle = newIngredient.querySelector('i');
    deleteIconSingle.addEventListener('click', function() {
        let num = this.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.querySelectorAll('.ingredients-cont').length;
        if(num !== 1) {
            this.parentElement.parentElement.parentElement.parentElement.remove();
        } else {
            this.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.remove();
        }
    });
    // let addIngredientInGroup = newIngredient.querySelector('span');
    // addIngredientInGroup.addEventListener('click', function() {
    //     let newGroupIngredient = document.createElement('div');
    //     newGroupIngredient.innerHTML = newIngredientHtmlNoAdd;
    //     let ingredientName = newGroupIngredient.querySelector('input[name="ingredient_name"]');
    //     ingredientName.addEventListener('input', function() {
    //         searchProducts(this);
    //     });
    //     let deleteSingleIngredient = newGroupIngredient.querySelector('i');
    //     deleteSingleIngredient.addEventListener('click', function() {
    //         this.parentElement.parentElement.parentElement.parentElement.remove();
    //     });
    //     newGroupCont.appendChild(newGroupIngredient);
    // });
    ingredientsInner.appendChild(newGroupCont);
});

addGroupStep.addEventListener('click', function() {
    let newGroupCont = document.createElement('div');
    newGroupCont.classList.add('single-step-group');
    let groupName = document.createElement('input');
    groupName.type = 'text';
    groupName.name = 'step_group_name';
    groupName.placeholder = 'Naziv koraka pripreme'
    newGroupCont.appendChild(groupName);
    let newRowStep = document.createElement('div');
    newRowStep.classList.add('row');
    let newStep = document.createElement('textarea');
    newStep.type = 'text';
    newStep.name = 'single_step';
    newStep.placeholder = 'Opiši korak pripreme';
    newGroupCont.appendChild(newStep);
    let deleteStep = document.createElement('i');
    deleteStep.classList.add('fa-solid');
    deleteStep.classList.add('fa-minus');
    newGroupCont.appendChild(deleteStep);
    deleteStep.addEventListener('click', function() {
        this.parentElement.remove();
    });
    stepsInner.appendChild(newGroupCont);
});

addIngredient.addEventListener('click', function() {
    let newRow = document.createElement('div');
    newRow.innerHTML = newIngredientHtmlNoAdd;
    let ingredientName = newRow.querySelector('textarea[name="ingredient_name"]');
    ingredientName.addEventListener('input', function() {
        searchProducts(this);
    });
    let deleteSingleIngredient = newRow.querySelector('i');
    deleteSingleIngredient.addEventListener('click', function() {
        this.parentElement.parentElement.parentElement.parentElement.remove();
    });
    singleIngredientsInner.appendChild(newRow);
});

// addStep.addEventListener('click', function() {
//     let newStep = document.createElement('input');
//     newStep.type = 'text';
//     newStep.name = 'single_step';
//     newStep.placeholder = 'Opiši korak';
//     singleStepsInner.appendChild(newStep);
// });

function processImages(imageDivs) {
    let promises = [];

    document.querySelectorAll('.single-img div').forEach((grid) => {
        grid.style.display = 'none';
        grid.parentElement.style.border = 'none';
    });

    imageDivs.forEach((imageDiv, i) => {
        let promise = new Promise((resolve, reject) => {
            domtoimage.toPng(imageDiv.querySelector('.single-img'), { quality: 0.99, height: 356,  width: 734 })
                .then(dataUrl => {
                    domtoimage.toPng(imageDiv.querySelector('.single-img'), {quality: 0.99, height: 356, width: 734})
                        .then(dataUrl => {
                            let currentTimeSeconds = Math.floor(Date.now() / 1000);
                            let imageName = currentTimeSeconds + i + '.png';
                            saveMaskImage(dataUrl, 0, imageName)
                                .then(() => {
                                    imagesUploaded.push(imageName);
                                    imagesFinal.push(imageName);
                                    resolve(); // Resolve the promise when the AJAX request is completed
                                })
                                .catch(reject); // Reject the promise if there's an error
                        })
                })
                .catch(reject); // Reject the promise if there's an error
        });

        promises.push(promise);
    });

    return Promise.all(promises);
}

createRecipeBtn.addEventListener('click', function(e) {
    e.preventDefault();
    let loadingPopup = document.querySelector('#loading-popup');
    let loadingModal = new bootstrap.Modal(loadingPopup);
    loadingModal.show();

    let imageDivs = document.querySelectorAll('.single-image-div');
    // processImages(imageDivs)
    //     .then(() => {
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
            let independentSteps = document.querySelectorAll('.single-steps-inner textarea[name="single_step"]');
            let stepGroupsParsed = [];
            let independentStepsParsed = [];

            ingredientGroups.forEach((singleGroup) => {
                let groupName = singleGroup.querySelector('input[name="ingredient_group_name"]').value;
                let groupIngredients = singleGroup.querySelectorAll('.ingredients-cont');
                let ingredients = [];
                groupIngredients.forEach((single) => {
                    let name = single.querySelector('textarea[name="ingredient_name"]').value;
                    let qty = single.querySelector('input[name="ingredient_quantity"]').value;
                    let measure = single.querySelector('select[name="ingredient_measure"]').value;
                    let product = single.querySelector('textarea[name="ingredient_name"]').dataset.productId;
                    ingredients.push({
                        title: name,
                        quantity: qty,
                        measure: measure,
                        product: product === null? null: product
                    });
                });
                let group = {
                    name: groupName,
                    ingredients: ingredients
                }
                ingredientGroupsParsed.push(group);
            });

            independentIngredients.forEach((single) => {
                let name = single.querySelector('textarea[name="ingredient_name"]').value;
                let qty = single.querySelector('input[name="ingredient_quantity"]').value;
                let measure = single.querySelector('select[name="ingredient_measure"]').value;
                let product = single.querySelector('textarea[name="ingredient_name"]').dataset.productId;
                independentIngredientsParsed.push({
                    title: name,
                    quantity: qty,
                    measure: measure,
                    product: product === null? null: product
                });
            });

            stepGroups.forEach((singleGroup) => {
                let groupName = singleGroup.querySelector('input[name="step_group_name"]').value;
                let groupSteps = singleGroup.querySelectorAll('textarea[name="single_step"]');
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
                imagesFinal: imagesUploaded,
                imagesToDelete: []
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
                    window.location.href = window.origin + '/recepti/' + response.category_slug + '/' + response.recipe_slug + '/' + response.recipe_id;
                }
            });

            // console.log('All images processed successfully');
            // console.log('Uploaded images:', imagesUploaded);
            // console.log('Final images:', imagesFinal);
        // })
        // .catch(error => {
        //     // Handle errors if any of the Promises are rejected
        //     console.error('Error processing images:', error);
        // });
});

function searchProducts(target) {
    target.removeAttribute('data-product-id');
    productsIngredients.innerHTML = '';
    let searched = products.filter((p) => {
       return p.name.toLowerCase().includes(target.value.toLowerCase());
    });
    console.log(searched);
    if(searched.length > 0) {
        productsIngredients.classList.add('active');
        let top = target.getBoundingClientRect().top - ingredientsSection.getBoundingClientRect().top + 65;
        productsIngredients.style.top = top + 10 + 'px';
        searched.forEach((product) => {
            let newProduct = document.createElement('p');
            newProduct.dataset.productId = product.id;
            newProduct.innerText = 'C ' + product.name;
            newProduct.addEventListener('click', function() {
                productsIngredients.classList.remove('active');
                target.value = 'C ' + product.name;
                target.dataset.productId = product.id;
            });
            productsIngredients.appendChild(newProduct);
        });
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
            processData: false,
            contentType: false,
            method: 'POST',
            success: function(response) {
                imagesUploaded.push(response);
                let imagePath = window.origin + '/storage/upload/' + response;
                let newImg = document.createElement('div');
                newImg.classList.add('single-img');
                newImg.style.backgroundImage = 'url("' + imagePath + '")';
                let newImgGrid = document.createElement('div');
                newImg.appendChild(newImgGrid);
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
                        newImg.style.backgroundSize = 'auto 120%';
                    } else {
                        let num = parseInt(backgroundSize.match(/\d+/)) + 20;
                        newImg.style.backgroundSize = 'auto ' + num + '%';
                    }
                });

                let minusImg = newImagesRow.querySelector('.minus-img');
                minusImg.addEventListener('click', function() {
                    let backgroundSize = newImg.style.backgroundSize;
                    if(backgroundSize === '') {
                        newImg.style.backgroundSize = 'auto 80%';
                    } else {
                        let num = parseInt(backgroundSize.match(/\d+/)) - 20;
                        newImg.style.backgroundSize = 'auto ' + num - 20 + '%';
                    }
                });

                let deleteImg = newImagesRow.querySelector('.delete-img');
                deleteImg.addEventListener('click', function() {
                    newImagesRow.parentElement.remove();

                });

                let leftImg = newImagesRow.querySelector('.left-img');
                leftImg.addEventListener('click', function() {
                    let backgroundPositionX = newImg.style.backgroundPositionX;
                    if(backgroundPositionX === '') {
                        newImg.style.backgroundPositionX = '-20px';
                    } else {
                        newImg.style.backgroundPositionX = parseInt(backgroundPositionX.slice(0, -2)) - 20 + 'px';
                    }
                });

                let rightImg = newImagesRow.querySelector('.right-img');
                rightImg.addEventListener('click', function() {
                    let backgroundPositionX = newImg.style.backgroundPositionX;
                    if(backgroundPositionX === '') {
                        newImg.style.backgroundPositionX = '20px';
                    } else {
                        newImg.style.backgroundPositionX = parseInt(backgroundPositionX.slice(0, -2)) + 20 + 'px';
                    }
                });

                let topImg = newImagesRow.querySelector('.top-img');
                topImg.addEventListener('click', function() {
                    let backgroundPositionY = newImg.style.backgroundPositionY;
                    if(backgroundPositionY === '') {
                        newImg.style.backgroundPositionY = '-20px';
                    } else {
                        newImg.style.backgroundPositionY = parseInt(backgroundPositionY.slice(0, -2)) - 20 + 'px';
                    }
                });

                let bottomImg = newImagesRow.querySelector('.bottom-img');
                bottomImg.addEventListener('click', function() {
                    let backgroundPositionY = newImg.style.backgroundPositionY;
                    if(backgroundPositionY === '') {
                        newImg.style.backgroundPositionY = '+20px';
                    } else {
                        newImg.style.backgroundPositionY = parseInt(backgroundPositionY.slice(0, -2)) + 20 + 'px';
                    }
                });

                let doneBtn = newImagesRow.querySelector('button');
                doneBtn.addEventListener('click', function() {
                    newImagesRow.classList.add('done');
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
    return new Promise((resolve, reject) => {
        jQuery.ajax({
            url: window.location.origin + '/recipes/add-image',
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                'imageData': dataUrl,
                'xOffset': xOffset,
                'imageName': imageName
            },
            success: function (result) {
                // Resolve the promise when the AJAX request is successful
                resolve(result);
            },
            error: function (error) {
                // Reject the promise if there's an error
                reject(error);
            }
        });
    });
}

function validateFirstStep() {
    let title = document.querySelector('input[name="title"]').value;
    let category = document.querySelector('select[name="category"]').value;
    let subCategory = document.querySelector('select[name="subcategory"]').value;
    let difficulty = document.querySelector('select[name="difficulty"]').value;
    let preparationTime = document.querySelector('select[name="preparation_time"]').value;
    let portionNumber = document.querySelector('input[name="portion_number"]').value;
    if(title === '') {
        document.querySelector('input[name="title"]').focus();
        Swal.fire({
            title: 'Polje \'Naziv\' je obavezno i potrebno je da ga popunite da biste nastavili dalje.',
            confirmButtonText: 'Nastavi'
        });
        return false;
    }
    if(category === '') {
        document.querySelector('select[name="category"]').focus();
        Swal.fire({
            title: 'Polje \'Kategorija recepta\' je obavezno i potrebno je da ga popunite da biste nastavili dalje.',
            confirmButtonText: 'Nastavi'
        });
        return false;
    }
    if(subCategory === '') {
        document.querySelector('select[name="subcategory"]').focus();
        Swal.fire({
            title: 'Polje \'Podkategorija recepta\' je obavezno i potrebno je da ga popunite da biste nastavili dalje.',
            confirmButtonText: 'Nastavi'
        });
        return false;
    }
    if(difficulty === '') {
        document.querySelector('select[name="difficulty"]').focus();
        Swal.fire({
            title: 'Polje \'Težina pripreme\' je obavezno i potrebno je da ga popunite da biste nastavili dalje.',
            confirmButtonText: 'Nastavi'
        });
        return false;
    }
    if(preparationTime === '') {
        document.querySelector('select[name="preparation_time"]').focus();
        Swal.fire({
            title: 'Polje \'Vreme pripreme\' je obavezno i potrebno je da ga popunite da biste nastavili dalje.',
            confirmButtonText: 'Nastavi'
        });
        return false;
    }
    if(portionNumber === '') {
        document.querySelector('input[name="portion_number"]').focus();
        Swal.fire({
            title: 'Polje \'Broj porcija\' je obavezno i potrebno je da ga popunite da biste nastavili dalje.',
            confirmButtonText: 'Nastavi'
        });
        return false;
    }
    return true;
}

function validateSecondStep() {
    let ingredientGroups = document.querySelectorAll('.single-ingredient-group');
    let independentIngredients = document.querySelectorAll('.single-ingredients-inner .ingredients-cont');
    let result = true;

    ingredientGroups.forEach((singleGroup) => {
        let groupName = singleGroup.querySelector('input[name="ingredient_group_name"]').value;
        if(groupName === '') {
            singleGroup.querySelector('input[name="ingredient_group_name"]').focus();
            Swal.fire({
                title: 'Polje \'Naziv grupe sastojaka\' je obavezno i potrebno je da ga popunite da biste nastavili dalje.',
                confirmButtonText: 'Nastavi'
            });
            result = false;
            return;
        }
        let groupIngredients = singleGroup.querySelectorAll('.ingredients-cont');
        groupIngredients.forEach((single) => {
            let name = single.querySelector('textarea[name="ingredient_name"]').value;
            let qty = single.querySelector('input[name="ingredient_quantity"]').value;
            if(name === '') {
                single.querySelector('textarea[name="ingredient_name"]').focus();
                Swal.fire({
                    title: 'Polje \'Naziv sastojka\' je obavezno i potrebno je da ga popunite da biste nastavili dalje.',
                    confirmButtonText: 'Nastavi'
                });
                result = false;
                return;
            }
            if(qty === '') {
                single.querySelector('input[name="ingredient_quantity"]').focus();
                Swal.fire({
                    title: 'Polje \'Količina sastojka\' je obavezno i potrebno je da ga popunite da biste nastavili dalje.',
                    confirmButtonText: 'Nastavi'
                });
                result = false;
                return;
            }
        });
    });

    independentIngredients.forEach((single) => {
        let name = single.querySelector('textarea[name="ingredient_name"]').value;
        let qty = single.querySelector('input[name="ingredient_quantity"]').value;
        if(name === '') {
            single.querySelector('textarea[name="ingredient_name"]').focus();
            Swal.fire({
                title: 'Polje \'Naziv sastojka\' je obavezno i potrebno je da ga popunite da biste nastavili dalje.',
                confirmButtonText: 'Nastavi'
            });
            result = false;
            return;
        }
        if(qty === '') {
            single.querySelector('input[name="ingredient_quantity"]').focus();
            Swal.fire({
                title: 'Polje \'Količina sastojka\' je obavezno i potrebno je da ga popunite da biste nastavili dalje.',
                confirmButtonText: 'Nastavi'
            });
            result = false;
            return;
        }
    });

    return result;
}

function validateThirdStep() {
    let stepGroups = document.querySelectorAll('.single-step-group');
    let independentSteps = document.querySelectorAll('.single-steps-inner textarea[name="single_step"]');
    let result = true;

    stepGroups.forEach((singleGroup) => {
        let groupName = singleGroup.querySelector('input[name="step_group_name"]').value;
        let groupSteps = singleGroup.querySelectorAll('textarea[name="single_step"]');
        if(groupName === '') {
            singleGroup.querySelector('input[name="step_group_name"]').focus();
            Swal.fire({
                title: 'Polje \'Naziv koraka pripreme\' je obavezno i potrebno je da ga popunite da biste nastavili dalje.',
                confirmButtonText: 'Nastavi'
            });
            result = false;
            return;
        }
        groupSteps.forEach((single) => {
            if(single.value === '') {
                single.focus();
                Swal.fire({
                    title: 'Polje \'Opis koraka pripreme\' je obavezno i potrebno je da ga popunite da biste nastavili dalje.',
                    confirmButtonText: 'Nastavi'
                });
                result = false;
                return;
            }
        });
    });

    independentSteps.forEach((single) => {
        if(single.value === '') {
            single.focus();
            result = false;
            return;
        }
    });

    return result;
}
