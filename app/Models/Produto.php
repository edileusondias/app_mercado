<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    
    protected $fillable = ['nome','preco','categoria','status_prod'];

    public function rules(){
        return [
            'nome' => 'required|unique:produtos,nome|min:3',//,'.$this->id.'
            'preco' => 'required|numeric|between:0,9999.99',
            'categoria' => 'required',
            'status_prod' => 'required'
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'unique' => 'O campo :attribute deve ser único',
            'nome.min' => 'O nome deve ter no minimo 3 caracteres'
        ];
    }
}
