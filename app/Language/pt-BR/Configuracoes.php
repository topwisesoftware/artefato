<?php

// override core en language system validation or define your own en language validation message
return [
    'titulo' => 'Configurações',
    'singular' => 'Configuração',
    'plural' => 'Configurações',
    'campos' => [
        'impressao' => [
            'nome' => 'Tipo de Janela de Impressão',
            'descricao' => 'Como serão exibidos os relatórios',
            'opcoes' => [
                'aba' => 'Abas - Abas na mesma janela do navegador',
                'popup' => 'PopUps - Em uma janela flutuante',
            ],
        ],
        'idioma' => [
            'nome' => 'Idioma Padrão',
            'descricao' => 'Informe um Idioma Padrão',
        ],
        'modo' => [
            'nome' => 'Tema Padrão',
            'descricao' => 'Informe o Tema Padrão',
        ],
    ],
    'mensagens' => [
        'atencao' => 'Atenção!',
        'reiniciar' => ' Reinicie o sistema para que as alterações tenham efeito!',
        'aviso' => 'Qualquer alteração efetuada aqui só tem efeito ao sair e retornar do sistema.',
        'sucesso' => 'Configurações atualizadas com sucesso!',
    ],
    'abas' => [
        'relatorios' => 'Relatórios',
        'geral' => 'Geral',
    ],
    'botoes' => [
        'reiniciar' => 'Reiniciar Agora',
        'atualizar' => 'Atualizar Configurações',
    ]
];
