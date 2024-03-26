@extends('layouts.app')

@section('scriptsTop')
    <script src="https://cdn.tiny.cloud/1/eg30gqw9lg61bczsqkofco920n73zf4owqkx2rtz559xp9eb/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content',
            convert_urls: false,
            plugins: 'image',
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image',
            images_upload_url: '/upload-mce',
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
        });


    </script>
@endsection

@section('content')

    <section id="add-post">
        <div class="add-post-inner container-space">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" placeholder="Naslov">
                <textarea name="content" id="content" cols="30" rows="10"></textarea>
                <input type="submit" value="Submit">
            </form>
        </div>
    </section>

@endsection

@section('scriptsBottom')
    <script>
        let form = document.querySelector('#add-post form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            let title = form.querySelector('input[name="title"]').value;
            let content = tinymce.get("content").getContent();
            jQuery.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                url: window.origin + '/add-post',
                data: {
                    title: title,
                    html_content: content
                },
                method: 'POST',
                success: function(response) {
                    console.log(response)
                }
            });
        });
    </script>
@endsection
