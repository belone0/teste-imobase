<div class="row p-2">
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
    <div class="col-12 py-1 ">
        <label>Proprietario</label>
        <input id="owner" class="form-control">
    </div>
    <button type="button" id="botao" class="mt-3 btn btn-primary">Enviar</button>
</div>

<script>
    botao = document.getElementById('botao')
    photo = document.getElementById('photo')
    title = document.getElementById('title')
    address = document.getElementById('address')
    type = document.getElementById('type')
    value = document.getElementById('value')
    owner = document.getElementById('owner')

    let data = new FormData()
    data.append('photo', photo.files[0])
    data.append('title',title.value)
    data.append('address',address.value)
    data.append('type',type.value)
    data.append('value',value.value)
    data.append('owner',owner.value)

    botao.addEventListener('click', function () {
        axios.post('{{route('imoveis.store')}}', data)
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
    })
</script>
