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
    @include('imovel.scripts.create')
@endsection
