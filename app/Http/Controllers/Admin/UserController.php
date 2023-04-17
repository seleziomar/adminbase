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
            ['type' => 'text', 'name' => 'user', 'label' => 'Usuário'],
            ['type' => 'text', 'name' => 'email', 'label' => 'Email'],
        ];
    }

}
