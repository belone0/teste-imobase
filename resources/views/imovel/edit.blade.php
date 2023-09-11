@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" enctype="multipart/form-data" action="{{route('imoveis.update',$imovel)}}">
                    {{ method_field('PATCH') }}
                    @csrf
                <div class="card">
                    <div class="card-header">{{ __('Anunciar Imovel') }}</div>
                    <div class="card-body">
                        <div class="row p-2">
                            <div class="col-12 py-1 d-flex justify-content-center">
                                <div class="card img-fluid justify-content-center" id="div-img-render"
                                     style="width:fit-content">
                                    <img class="card-img" id="img-render" src="{{ asset($imovel->photo ?? '') }}"
                                         style="min-width:50px; min-height:50px;max-width:450px; max-height:450px;"/>
                                </div>
                            </div>
                            <div class="col-12 py-1">
                                <label>Foto</label>
                                <input id="photo" name="photo" value="{{ asset($imovel->photo )?? ''}}" type="file" class="form-control">
                            </div>
                            <div class="col-12 py-1 ">
                                <label>Titulo</label>
                                <input id="title" name="title" value="{{$imovel->title ?? ''}}" class="form-control">
                            </div>
                            <div class="col-12 py-1">
                                <label>Endereço </label>
                                <input id="address" name="address" value="{{$imovel->address ?? ''}}" class="form-control">
                            </div>
                            <div class="col-12 py-1 col-md-6">
                                <label>Tipo</label>
                                <select id="type" name="type"  class="form-control">
                                    <option value="venda">Venda</option>
                                    <option value="locacao">Locação</option>
                                </select>
                            </div>
                            <div class="col-12 py-1 col-md-6">
                                <label>Valor</label>
                                <input id="value" name="value" value="{{$imovel->value ?? ''}}" class="form-control">
                            </div>
                            <input type="hidden" id="user_id" name="user_id" value="{{auth()->user()->id}}">
                            <button type="submit" id="botao" class="mt-3 btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
                   </form>
            </div>
        </div>
    </div>
    @include('imovel.scripts.edit')
@endsection
