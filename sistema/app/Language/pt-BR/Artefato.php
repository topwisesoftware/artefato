<?php

// override core en language system validation or define your own en language validation message
return [
    'login' => [
        'titulo' => 'Acesso Restrito',
        'cabecalho' => 'Informe usuário e senha para iniciar.',
        'form' => [
            'usuario' => 'Usuário',
            'senha' => 'Senha',
            'botao' => 'Entrar',
        ],
        'mensagens' => [
            'incorreto' => 'Usuário/Senha incorretos.',
            'negado' => 'Acesso negado.',
        ]
    ],
    'crud' => [
        'botoes' => [
            'listagem' => 'Listagem',
            'incluir' => 'Incluir',
            'cancelar' => 'Cancelar',
            'salvar' => 'Salvar',
            'consultar' => 'Consultar',
            'editar' => 'Editar',
            'excluir' => 'Excluir',
        ],
        'campos' => [
            'status' => 'Status',
            'acoes' => 'Ações',
        ],
        'titulos' => [
            'listagem' => 'Listagem de',
        ],
        'listagens' => [
            'alfabetica' => 'por Ordem Alfabética ~ sem filtros',
        ]

    ],
    'relatorios' => [
        'mensagens' => [
            'sim' => 'Sim',
            'nao' => 'Não',
            'data' => 'Data',
            'emitidopor' => 'Emitido por',
        ]
    ],
    'sistema' => [
        'formatos' => [
            'data' => 'd/m/Y H:i:s',
        ]
    ]
];