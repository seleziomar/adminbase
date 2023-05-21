<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ResourceController;
use App\Models\Address;
use App\Models\Profile;

class AddressController extends Controller
{
    use ResourceController;

    public function __construct(Address $model)
    {
        //set your configs
        $this->model = $model;
        $this->route = 'admin.enderecos';
        $this->label = 'Endereços';
    }

    protected function getColumns()
    {
        return[
            ['name' => 'id', 'label' => 'ID'],
            ['name' => 'zip_code', 'label' => 'CEP'],
            ['name' => 'street', 'label' => 'Rua'],
            ['name' => 'number', 'label' => 'Número'],
            ['name' => 'city', 'label' => 'Cidade'],
            ['name' => 'state', 'label' => 'Estado'],
        ];
    }

    protected function getFields()
    {
        $data = Profile::selectRaw('name as label, id as value')->get()->toArray();

        return [
            ['type' => 'select', 'name' => 'profile_id', 'label' => 'Perfil', 'data' => $data],
            ['type' => 'text', 'name' => 'zip_code', 'label' => 'CEP', 'input_mask' => '99999-999', 'only_number' => true],
            ['type' => 'text', 'name' => 'street', 'label' => 'Rua'],
            ['type' => 'number', 'name' => 'number', 'label' => 'Número'],
            ['type' => 'text', 'name' => 'neighborhood', 'label' => 'Bairro'],
            ['type' => 'text', 'name' => 'city', 'label' => 'Cidade'],
            ['type' => 'text', 'name' => 'state', 'label' => 'Estado'],
            ['type' => 'text', 'name' => 'complement', 'label' => 'Complemento'],
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
