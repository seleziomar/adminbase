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

}
