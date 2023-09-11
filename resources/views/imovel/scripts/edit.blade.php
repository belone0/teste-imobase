<script>
    image_preview_div = document.getElementById('div-img-render')
    image_preview_img = document.getElementById('img-render')
    photo = document.getElementById('photo')
    warning = document.getElementById('warning')

    function readURL(input) {
        image_preview_div.classList.remove("d-none")
        image_preview_div.classList.add("d-flex")
        warning.classList.add('d-none')

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                image_preview_img.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    photo.addEventListener('change', function () {
        readURL(this);
    })
</script>
