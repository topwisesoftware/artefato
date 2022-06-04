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
            'fechar' => 'Fechar',
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
        ],
        'mensagens' => [
            'salvar' => [
                'sucesso' => 'Registro salvo com sucesso!',
                'erro' => 'Erro ao salvar registro!',
                'semdados' => 'Não existem dados suficientes para salvar registro.',
                'erro_GERAL' => 'Erro geral! Reinicie o sistema e tente novamente!',
                'nada' => 'Nada foi alterado!'
            ],
            'editar' => [
                'erro_ID' => 'O campo ID precisa existir em uma edição.',
                'erro_HASH' => 'Os campos de verificação precisam existir em uma edição.',
                'erro_CRIPTO' => 'Problemas na verificação de segurança da edição.',
                'erro_SENHA' => 'A SENHA não atende aos requisios básicos de segurança solicitados. Verifique!',
            ],
            'incluir' => [
                'erro_ID' => 'O campo ID não pode existir em uma inclusão.',
            ],
            'excluir' => [
                'excluindo' => 'Excluindo',
                'sim' => 'Sim, excluir!',
                'nao' => 'NÃO, CANCELAR!',
                'erro' => 'Erro ao excluir!',
                'erromsg' => 'Não foi possível excluir o registro',
                'excluido' => 'Excluido',
                'sucesso' => 'excluído com sucesso!',
            ],
            'geral' => [
                'certeza' => 'Tem certeza?',
                'aviso' => 'Esta operação não poderá ser desfeita!',
                'registro' => 'Registro',
                'verifique' => 'Verifique!',
                'cancelar' => 'NÃO, CANCELAR!',
                'ok' => 'Tudo certo!',
                'erro' => 'Ocorreu um erro! Verifique!'
            ],
        ],
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