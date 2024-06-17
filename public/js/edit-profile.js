let save1 = document.querySelector('.save-1');
let save2 = document.querySelector('.save-2');

let profileImg = document.querySelector('.profile-img');
let imageInput = document.querySelector('.image-input');

save1.addEventListener('click', function() {
    let about = document.querySelector('textarea').value;
    let birthdate = document.querySelector('input#birthdate').value;
    let city = document.querySelector('input#city').value;
    let fb = document.querySelector('input#fb').value;
    let ig = document.querySelector('input#ig').value;

    let data = {
        about: about,
        birthdate: birthdate,
        city: city,
        fb: fb,
        ig: ig
    }

    jQuery.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: window.origin + '/izmeni-profil',
        data: JSON.stringify(data),
        contentType: 'application/json',
        method: 'POST',
        success: function(response) {
            location.reload();
        }
    });
});

save2.addEventListener('click', function() {
    let name = document.querySelector('input[name="name"]').value;
    let surname = document.querySelector('input[name="surname"]').value;
    let phone = document.querySelector('input#phone').value;
    let city2 = document.querySelector('input#city_2').value;
    let address = document.querySelector('input#address').value;
    let zip = document.querySelector('input#zip').value;


    let data = {
        name: name,
        surname: surname,
        phone: phone,
        city_2: city2,
        address: address,
        zip: zip
    }

    jQuery.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: window.origin + '/izmeni-kontakt',
        data: JSON.stringify(data),
        contentType: 'application/json',
        method: 'POST',
        success: function(response) {
            location.reload();
        }
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
