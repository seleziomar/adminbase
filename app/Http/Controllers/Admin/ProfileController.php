<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ResourceController;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    use ResourceController;

    public function __construct(Profile $model)
    {
        //set your configs
        $this->model = $model;
        $this->route = 'admin.profiles';
        $this->label = 'Profiles';
    }

    protected function getColumns()
    {
        return[
            ['name' => 'active', 'label' => 'Ativo'],
            ['name' => 'name', 'label' => 'Nome'],
            ['name' => 'name', 'label' => 'CPF'],
            ['name' => 'birthdate', 'label' => 'Data de Nascimento']
        ];
    }

    protected function getFields()
    {
        $data = User::selectRaw('id as value, email as label')->get()->toArray();

        return [
            ['type' => 'checkbox', 'name' => 'active', 'label' => 'Ativo'],
            ['type' => 'select', 'name' => 'user_id', 'label' => 'Usuário', 'data' => $data, 'placeholder' => 'Selecione um usuário'],
            ['type' => 'text', 'name' => 'register_code', 'label' => 'Matrícula'],
            ['type' => 'text', 'name' => 'name', 'label' => 'Nome'],
            ['type' => 'text', 'name' => 'cpf', 'label' => 'CPF', 'input_mask' => '999.999.999-99', 'only_number' => true],
            ['type' => 'text', 'name' => 'phone', 'label' => 'Telefone', 'input_mask' => '(99) 99999-9999', 'only_number' => true],
            ['type' => 'text', 'name' => 'birthdate', 'label' => 'Date de Nascimento', 'input_mask' => '99/99/9999', 'is_date' => true],
        ];
    }

    protected function getValidation()
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

}
