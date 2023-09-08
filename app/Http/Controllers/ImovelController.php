<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImovelRequest;
use App\Models\Imovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImovelController extends Controller
{
    public function index()
    {
        $imoveis = Imovel::all();
        return view('imovel.index', compact('imoveis'));
    }

    public function create()
    {
        return view('imovel.create');
    }

    public function store(ImovelRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $imovel = Imovel::create($data);

            $extension = $request->file('photo')->extension();
            $file_name = "foto-imovel.".$extension;
            $upload = $request->file('photo')->storeAs('public/images/foto-imovel/'.$imovel->id.'/', $file_name);

            $img_path = 'storage/images/foto-imovel/'.$imovel->id.'/'.$file_name;
            $imovel->photo = $img_path;
            $imovel->save();

            DB::commit();
            return 'ok';
        }catch (\Throwable $th){
            DB::rollBack();
            return 'erro';
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
