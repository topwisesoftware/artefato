<?php

// override core en language system validation or define your own en language validation message
return [
    'geral' => [
        'singular' => 'Usuário',
        'plural' => 'Usuários',
        'campos' => [
            'login' => [
                'nome' => 'Login',
                'descricao' => 'Nome de Login do Usuário',
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
                'info' => 'A senha deve ter no mínimo 6 caracteres.',
            ],
            'idioma' => [
                'nome' => 'Idioma',
                'descricao' => 'Informe uma Idioma Padrão',
            ],            
        ],
        'abas' => [
            'info' => 'Informação Pessoal',
            'acesso' => 'Acesso ao Software',
        ]
    ],
];