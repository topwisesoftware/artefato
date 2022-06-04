<?php

// override core en language system validation or define your own en language validation message
return [
    'geral' => [
        'singular' => 'Cliente',
        'plural' => 'Clientes',
        'campos' => [
            'id' => [
                'nome' => '#',
                'descricao' => 'ID do Cliente',
            ],
            'nome' => [
                'nome' => 'Nome',
                'descricao' => 'Nome do Cliente',
            ],
            'email' => [
                'nome' => 'Email',
                'descricao' => 'Endereço de email do cliente',
            ],
            'telefone' => [
                'nome' => 'Telefone',
                'descricao' => 'Telefone',
            ],
            'foto' => [
                'nome' => 'Foto',
                'descricao' => 'Foto do Cliente',
            ]
        ],
        'abas' => [
            'um' => 'Principal',
            'dois' => 'Outras',
        ]
    ],
];
