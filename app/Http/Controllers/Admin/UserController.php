<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ResourceController;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ResourceController;

    public function __construct(User $model)
    {
        $this->model = $model;
        $this->route = 'admin.usuarios';
        $this->label = 'Usuários';
    }

    protected function getColumns()
    {
        return[
            ['name' => 'name', 'label' => 'Nome'],
            ['name' => 'email', 'label' => 'Email']
        ];
    }

    protected function getFields()
    {
        return [
            ['type' => 'text', 'name' => 'name', 'label' => 'Nome'],
            ['type' => 'text', 'name' => 'email', 'label' => 'Email'],
            ['type' => 'password', 'name' => 'password', 'label' => 'Senha'],
        ];
    }

    protected function getValidation()
    {
        return [
            'rules' => [
                'name' => 'required|string',
                'email' => 'required|email'
            ],
            'messages' => [
                'name.required' => 'O campo nome é obrigatório'
            ]
        ];
    }

}
