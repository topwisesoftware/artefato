<?php

// override core en language system validation or define your own en language validation message
return [
    'titulo' => 'Usuários',
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
            'cargo' => [
                'nome' => 'Cargo',
                'descricao' => 'Cargo do Usuário',
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
                'descricao' => 'Informe um Idioma Padrão',
            ],
            'modo' => [
                'nome' => 'Tema do Aplicativo',
                'descricao' => 'Informe um Tema Padrão para o Aplicativo',
            ],
            'foto' => [
                'nome' => 'Foto',
                'descricao' => 'Selecionar uma foto para o usuário...',
                'info' => '<b class="text-danger">ATENÇÃO!!</b> A imagem escolhida para a foto deve ser <b>JPG</b> no tamanho de <b>300px x 300px</b> com resolução de até <b>96 dpi</b>. Imagens muito grandes serão diminuidas/cortadas para estas configurações/proporções, mas dependendo do caso, podem gerar erros no sistema.',
            ],
            'senhaanterior' => [
                'nome' => 'Senha Anterior',
                'descricao' => 'Informe a Senha Antiga',
                'info' => 'A senha deve conter no mínimo: 6 caracteres, 1 letra maiúscula,<br>1 letra minúscula, 1 número, 1 símbolo - EXEMPLO: Senh4#0rt3',
            ],
            'novasenha' => [
                'nome' => 'Nova senha',
                'descricao' => 'Informe a Nova Senha',
                'info' => 'A senha deve conter no mínimo: 6 caracteres, 1 letra maiúscula,<br>1 letra minúscula, 1 número, 1 símbolo - EXEMPLO: Senh4#0rt3',
            ],
            'confirmarsenha' => [
                'nome' => 'Confirmar nova senha',
                'descricao' => 'Informe novamente a Nova Senha para confirmação',
                'info' => 'Deve ser exatamente igual a senha informada acima!',
            ],
        ],
        'abas' => [
            'info' => 'Informação Pessoal',
            'acesso' => 'Acesso ao Software',
            'configuracao' => 'Configurações',
            'foto' => 'Foto',
            'perfil' => 'Perfil',
            'senha' => 'Senha',
            'foto' => 'Foto',
        ]
    ],
];
