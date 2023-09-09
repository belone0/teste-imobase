@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-body mb-4">
                    <div class="d-flex row p-2 justify-content-around">
                        <div class="col-9">
                            <input id="search-box" class=" form-control" type="text"
                                   placeholder="Buscar por nome ou endereço">
                        </div>
                        <button id="search-btn" type="button" class="col-2 btn btn-primary">Buscar</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">{{ __('Index') }}</div>
                    <div class="card-body">
                        <div id="imoveis-div" class="row d-flex justify-content-center gap-4 p-3">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var imoveis_div = document.getElementById('imoveis-div');
        var search = document.getElementById('search-btn');

        addEventListener("load", async (event) => {
            await getImoveis();
        });

        async function getImoveis() {
            await axios.get('/get-imoveis')
                .then(function (response) {
                    //data.data
                    response.data.forEach((imovel) => loadImoveis(imovel));
                    console.log(response.data.data);
                })
                .catch(function (error) {
                    console.log(error);
                })
        }

        function loadImoveis(imovel) {

            let url = "{{ route('imoveis.show', ['imovei' => '__replace']) }}";
            show_url = url.replace('__replace', imovel.id);

            imoveis_div.innerHTML += `
                <a id="imovel_link" class=" border text-black col-12 col-md-6 col-lg-3 text-decoration-none rounded p-2 " href="${show_url}">
                    <div class="mt-3 d-flex justify-content-center">
                         <img class=" rounded" width="150" height="150" src=" ${imovel.photo}" alt="">
                    </div>
                    <div class="d-flex justify-content-center">
                         <span class="fs-4" id="title">${imovel.title}</span>
                    </div>
                    <div class="d-flex justify-content-center">
                        <span id="address">${imovel.address}</span>
                    </div>
                        <div class="d-flex justify-content-center">
                        <span id="type">${imovel.type}</span>
                        </div>
                    <div class="d-flex justify-content-center">
                        <span id="value">R$ ${imovel.value}</span>
                    </div>
                </a>
            `;
        }

        search.addEventListener('click', async function () {
            await searchImoveis();
        })

        async function searchImoveis() {
            let box = document.getElementById('search-box');
            let search_param = box.value;

            if (!search_param) {
                resetDivContent();
                await getImoveis()
                return;
            }

            await axios.post('/search-imoveis/' + search_param)
                .then(function (response) {
                    resetDivContent();
                    response.data.forEach((imovel) => loadImoveis(imovel));
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                })
        }

        function resetDivContent() {
            imoveis_div.innerHTML = '';
        }

    </script>
@endsection
