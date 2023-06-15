<?php

namespace App\Models;

use App\Painel\Input;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['active', 'name', 'user_id', 'register_code', 'cpf', 'phone', 'birthdate', 'zip_code', 'street', 'number', 'neighborhood', 'city', 'state', 'complement'];

    public function getFields($obj = null)
    {
        $data = User::selectRaw('id as value, name as label')->get()->toArray();

        $fields =  [
            Input::name('label')->label('Dados do Usuário')->divisor(),
            Input::name('active')->label('Ativo')->checkbox(),
            Input::name('user_id')->label('Usuário')->readonly('edit')->placeholder('Selecione o Usuário')->select($data),
            Input::name('name')->label('Nome')->text(),
            Input::name('cpf')->label('CPF')->mask('999.999.999-99')->only_number()->text(),
            Input::name('birthdate')->label('Data de Nascimento')->mask('99/99/9999')->is_date()->text(),
            Input::name('phone')->label('Telefone')->mask('(99) 99999-9999')->only_number()->text(),
            Input::name('register_code')->label('Código de Registro')->text(),
            Input::name('label')->label('Endereço do Usuário')->divisor(),
            Input::name('zip_code')->label('CEP')->mask('99999-999')->only_number()->text(),
            Input::name('street')->label('Logradouro')->text(),
            Input::name('number')->label('Número')->text('number'),
            Input::name('neighborhood')->label('Bairro')->text(),
            Input::name('city')->label('Cidade')->text(),
            Input::name('state')->label('Estado')->text(),
            Input::name('complement')->label('Complemento')->text(),
        ];

        return $fields;
    }

    public function getValidation()
    {
        return [
            'rules' => [
                //'name' => 'required|string',
            ],
            'messages' => [
                //'name.required' => 'O campo nome é obrigatório'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBirthdateAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

}
