<?php

// override core en language system validation or define your own en language validation message
return [
    'titulo' => 'Perfil do Usuário',
    'singular' => 'Perfil',
    'plural' => 'Perfis',
    'mensagens' => [
        'dados' => 'Dados do Usuário',
        'ambiente' => 'Configurações do Ambiente',
        'senha' => [
            'ok' => 'Senha alterada com sucesso!',
            'erro' => [
                'geral' => 'Erro na alteração da senha!',
                'seguranca' => 'Nova senha não atende aos padrões mínimos de segurança! Tente novamente seguindo as instruções!',
                'diferente' => 'Senha de confirmação diferente da nova senha! Tente novamente!',
                'divergente' => 'Senha atual não confere! Tente novamente!',
                'incompleto' => 'Faltam informações obrigatórias!',
            ],
        ],
    ],
    'abas' => [
        'perfil' => 'Perfil',
        'senha' => 'Senha',
        'foto' => 'Foto',
    ],
    'botoes' => [
        'reiniciar' => 'Reiniciar Agora',
        'salvar' => 'Salvar Alterações',
        'senha' => 'Alterar Senha',
    ]
];
