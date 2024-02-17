let likeBtn = document.querySelector('.like');
let saveBtn = document.querySelector('.save');

likeBtn.addEventListener('click', function() {
    jQuery.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: window.origin + '/izmeni-kontakt',
        data: JSON.stringify(data),
        contentType: 'application/json',
        method: 'POST',
        success: function(response) {
            console.log(response);
        }
    });
});
