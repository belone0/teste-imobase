@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-center">
                            <span class="display-6" id="title">{{$imovel->title}}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mt-3 d-flex justify-content-center">
                            <img class="img-fluid rounded" width="400" height="400" src="{{ asset($imovel->photo)}}">
                        </div>
                        <div class="d-flex justify-content-center">
                            <span class="fs-3" id="address">Endereço: {{$imovel->address}}</span>
                        </div>
                        <div class="d-flex justify-content-center">
                            <span class="fs-3" id="type">Tipo do anúncio: {{$imovel->type}}</span>
                        </div>
                        <div class="d-flex justify-content-center">
                            <span class="fs-3" id="value">Valor: R$ {{$imovel->value}}</span>
                        </div>
                        <div class="d-flex justify-content-center">
                            <span class="fs-3"
                                  id="value">Proprietário: {{\App\Models\User::find($imovel->user_id)->name ?? 'Não identificado' }}</span>
                        </div>
                        <div class="d-flex justify-content-center">
                            <span class="fs-3"
                                  id="value">Cadastrado em: {{$imovel->created_at }}</span>
                        </div>
                        @if($imovel->user_id == auth()->user()->id)
                            <div class="d-flex justify-content-center mt-3">
                                <form action="{{route('imoveis.destroy', $imovel->id)}}">
                                    <button class="btn btn-danger">Excluir Anúncio</button>
                                </form>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
