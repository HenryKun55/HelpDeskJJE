<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emitente;
use App\Serial;
use App\CRT;
use DB;

class EmitenteController extends Controller
{

    public function getBySerial($serialNum) {
        $serial = Serial::where('numero', $serialNum)->get()->first();

        $json = json_encode($serial);
        $json = json_decode($json, true);

        $crt = $serial->emitente->crt;

        $json['emitente'] = $serial->emitente;

        return $json;
    }

    public function assignToHd($serialNum, $hdNum) {
        $serial = Serial::where('numero', $serialNum)->get()->first();
        $serial->num_serie_hd = $hdNum;
        $serial->save();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Emitente::orderBy('id','DESC')->paginate();
        return view('emitentes.index',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $crt = CRT::pluck('descricao', 'id');
        return view('emitentes.create', compact('crt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
    
          'nome' => 'required',
          'cpf_cnpj' => 'required',
          'crt_id' => 'required',
          'cep' => 'required',
          'logradouro' => 'required',
          'numero' => 'required',
          'bairro' => 'required',
          'uf' => 'required',
          'cod_municipio' => 'required',
          'cod_uf' => 'required'
        ]);
    
        $input = $request->all();

        //Remove máscaras
        $input['cpf_cnpj'] = preg_replace("/\D+/", "", $input['cpf_cnpj']);
        $input['insc_estadual'] = preg_replace("/\D+/", "", $input['insc_estadual']);
        $input['telefone'] = preg_replace("/\D+/", "", $input['telefone']);
        $input['celular'] = preg_replace("/\D+/", "", $input['cpf_cnpj']);
        $input['cep'] = preg_replace("/\D+/", "", $input['cep']);
    
        $emit = Emitente::create($input);

        for($i = 0; $i < $input['quant_lic']; $i++) {
            $serial = new Serial();
            $serial->numero = $this->geraNumSerial();
            $serial->emitente_id = $emit->id;
            $serial->save();
        }
    
        return redirect()->route('emitentes.index')
        ->with('success','Emitente criado com sucesso');
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $emit = Emitente::find($id);

        return view('emitentes.show',compact('emit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function serialStatus($id) {
        $serial = Serial::find($id);
        $serial->ativo == 0 ? $serial->ativo = 1 : $serial->ativo = 0;
        $serial->save();
        return redirect()->route('emitentes.show', $serial->emitente->id);
    }

    function geraNumSerial() 
    {
        $keys = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

        $key = '';
        for ($i = 0; $i < (40+10); $i++) 
        {
            $key .= $keys[array_rand($keys)];
        }

        return substr($key, 0, 40);
    }

    function alteraHd(Request $r) {
        $serial = Serial::find($r['serial_id']);
        $serial->num_serie_hd = $r['serial_num'];
        $serial->save();
        return redirect()->route('emitentes.show', $serial->emitente->id);
    }

}
