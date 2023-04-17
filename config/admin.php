<?php

return [

    'sidebar' => [
        [
            'heading' => 'Ações',
            'actions' => [
                [
                    'label' => 'Home',
                    'icon' => 'home',
                    'route' => 'admin.home',
                    'role' => 'admin'
                ],
                [
                    'label' => 'Usuários',
                    'icon' => 'users',
                    'route' => 'admin.usuarios.index',
                    'role' => 'admin'
                ]
            ]
        ],


    ]

];
