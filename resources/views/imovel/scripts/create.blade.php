<script>
    botao = document.getElementById('botao')
    photo = document.getElementById('photo')
    title = document.getElementById('title')
    address = document.getElementById('address')
    type = document.getElementById('type')
    value = document.getElementById('value')

    botao.addEventListener('click', function () {
        let data = new FormData()
        data.append('photo', photo.files[0])
        data.append('title', title.value)
        data.append('address', address.value)
        data.append('type', type.value)
        data.append('value', value.value)
        data.append('user_id', {{auth()->user()->id}})

        axios.post('{{route('imoveis.store')}}', data)
            .then(function (response) {
                alert('Sucesso! Imovel cadastrado.')
                window.location.href = "{{route('imoveis.index')}}";
            })
            .catch(function (error) {
                alert('Erro! Verifique as informações do formulário')
            });
    })

    image_preview_div = document.getElementById('div-img-render')
    image_preview_img = document.getElementById('img-render')

    function readURL(input) {
        image_preview_div.classList.remove("d-none")
        image_preview_div.classList.add("d-flex")
        console.log(image_preview_div)

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
