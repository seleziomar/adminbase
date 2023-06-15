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

    public function getColumns()
    {
        return[
            ['name' => 'active', 'label' => 'Ativo'],
            ['name' => 'name', 'label' => 'Nome'],
            ['name' => 'name', 'label' => 'CPF'],
            ['name' => 'birthdate', 'label' => 'Data de Nascimento']
        ];
    }


}
