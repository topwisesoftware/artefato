<?php

// override core en language system validation or define your own en language validation message
return [
    'geral' => [
        'singular' => 'Usuário',
        'plural' => 'Usuários',
        'campos' => [
            'id' => [
                'nome' => '#',
                'descricao' => 'ID do Usuário',
            ],
            'login' => [
                'nome' => 'Login',
                'descricao' => 'Nome de Login do Usuário',
            ],
            'email' => [
                'nome' => 'Email',
                'descricao' => 'Endereço de email do usuário',
            ],
            'nome' => [
                'nome' => 'Nome',
                'descricao' => 'Nome do Usuário',
            ],
            'telefone' => [
                'nome' => 'Telefone',
                'descricao' => 'Telefone',
            ],
            'permissao' => [
                'nome' => 'Nível de Acesso',
                'descricao' => 'Nível de Acesso',
            ],
            'senha' => [
                'nome' => 'Senha',
                'descricao' => 'Informe uma Senha',
                'info' => 'A senha deve conter no mínimo: 6 caracteres, 1 letra maiúscula,<br>1 letra minúscula, 1 número, 1 símbolo - EXEMPLO: Senh4#0rt3',
            ],
            'idioma' => [
                'nome' => 'Idioma',
                'descricao' => 'Informe uma Idioma Padrão',
            ],
            'foto' => [
                'nome' => 'Foto',
                'descricao' => 'Foto do Usuário',
            ]
        ],
        'abas' => [
            'info' => 'Informação Pessoal',
            'acesso' => 'Acesso ao Software',
        ]
    ],
];
