<?php

return [

    'sidebar' => [
        [
            'heading' => 'Ações',
            'actions' => [
                [
                    'label' => 'Usuários',
                    'icon' => 'users',
                    'route' => 'admin.usuarios',
                    'role' => 'admin'
                ],
                [
                    'label' => 'Perfis',
                    'icon' => 'users',
                    'route' => 'admin.profiles',
                    'role' => 'admin'
                ],
                [
                    'label' => 'Endereços',
                    'icon' => 'pin',
                    'route' => 'admin.enderecos',
                    'role' => 'admin'
                ]
            ]
        ],


    ]

];
