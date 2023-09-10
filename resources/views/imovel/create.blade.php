@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Anunciar Imovel') }}</div>
                    <div class="card-body">
                        <div class="row p-2">
                            <div class="col-12 py-1 d-flex justify-content-center">
                                <div class="d-none card img-fluid  justify-content-center" id="div-img-render"
                                     style="width:fit-content">
                                    <img class="card-img" id="img-render" src="{{ asset($imovel->photo ?? '') }}"
                                         style="min-width:50px; min-height:50px;max-width:450px; max-height:450px;"/>
                                </div>
                            </div>
                            <div class="col-12 py-1">
                                <label>Foto</label>
                                <input id="photo" type="file" class="form-control">
                            </div>
                            <div class="col-12 py-1 ">
                                <label>Titulo</label>
                                <input id="title" class="form-control">
                            </div>
                            <div class="col-12 py-1">
                                <label>Endereço</label>
                                <input id="address" class="form-control">
                            </div>
                            <div class="col-12 py-1 col-md-6">
                                <label>Tipo</label>
                                <select id="type" class="form-control">
                                    <option value="venda">Venda</option>
                                    <option value="locacao">Locação</option>
                                </select>
                            </div>
                            <div class="col-12 py-1 col-md-6">
                                <label>Valor</label>
                                <input id="value" class="form-control">
                            </div>
                            <button type="button" id="botao" class="mt-3 btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            data.append('user_id', 0)

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
@endsection
