<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emitente extends Model
{
    protected $fillable = [
        'nome',
        'nome_fantasia',
        'cpf_cnpj',
        'insc_estadual',
        'email',
        'telefone',
        'celular',
        'crt_id',
        'cep',
        'logradouro',
        'numero',
        'bairro',
        'municipio',
        'complemento',
        'uf',
        'cod_municipio',
        'cod_uf',
    ];

    public function serials() {
        return $this->hasMany('App\Serial');
    }

    public function crt() {
        return $this->belongsTo('App\CRT');
    }
}
