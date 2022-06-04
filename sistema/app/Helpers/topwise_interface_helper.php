<?php

// para ser usado com pequenas mensagens de erro
// usando FlashData principalmente
// usado no Login do sistema
function TOPWISE_artefato_msg_erro($mensagem = '')
{
    $conteudo = '';

    if ($mensagem != '')
    {
        $conteudo .= '<div class="msg alert alert-danger alert-dismissible mt-2">';
            //$conteudo .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
            //$conteudo .= '<h5><i class="icon fas fa-ban"></i> Atenção!</h5>';
            $conteudo .= $mensagem;
        $conteudo .= '</div>';

    }

    return $conteudo;
}

function TOPWISE_retornaNivelAcesso($regra, $cor) {

    $codigo = '<span class="badge bg-' . $cor . '">';
    $codigo .= $regra;
    $codigo .= '</span>';

    return $codigo;

}

function TOPWISE_retornaIdioma($idioma) {

    switch ($idioma) {
        case 'english':
            $codigo = 'EN';
            break;
        case 'portuguese-br':
            $codigo = 'PT-BR';
            break;
        default:
            $codigo = '??';
            break;
    }

    return '<span class="badge bg-gray" title="' . $idioma . '">' . $codigo . '</span>';
}

function TOPWISE_retornaFoto($cracha = '') {
    
    if ($cracha == '') {
        return '';
    } else {
        return '<span class="badge bg-warning mr-1"><i data-toggle="tooltip" title="Possui Foto" class="fas fa-portrait" style="font-size: 1.1em"></i></span>';
    }
}

function TOPWISE_retornaConfigTabela() {
    return 'table table-bordered table-striped table-hover text-nowrap table-sm';
}



//////////////////
/*

    <div class="form-group col-sm-6">
        <label for="LOGIN"><?= lang('Usuarios.geral.campos.login.nome') ?>:<i class="fas fa-star-of-life fa-sm ml-2 text-danger"></i></label>
        <input type="text" class="form-control" placeholder="<?= lang('Usuarios.geral.campos.login.descricao') ?>" id="LOGIN" name="LOGIN" autocomplete="off" style="text-transform:uppercase;" value="<?= ($exibir) ? $dadosUsuarios->LOGIN : $vazio ?>" autofocus <?= $consultar ?>>
    </div>

    <?= Componente(array([
        'componente' => 'input',
        'tipo' => 'text',
        'label' => lang('Usuarios.geral.campos.login.nome'),
        'dica' => lang('Usuarios.geral.campos.login.descricao'),
        'campo' => 'LOGIN',
        'dados' => $dadosUsuarios->LOGIN,
        'acao' => $acao,
        'config' => array (
            'class' => 'form-control',
            'autocomplete' => 'off',
            'style' => 'text-transform:uppercase;'
            'autofocus' => TRUE,
            'obrigatorio' => TRUE,
            'grade' => 'col-sm-6',
        ),
        'estado' => 'disabled',
    ])) ?>

*/

function Componente(array $info)
{
    if($info['componente'] == 'input') {
        $render = Componente_input($info);
    };

    return $render;
}

function Componente_input(array $info)
{
    // configurações
    $autofocus = ($info['config']['autofocus'] == TRUE ? ' autofocus ' : '');
    $require = ($info['config']['obrigatorio'] == TRUE ? ' required aria-required="true" ' : '');
    $pattern = ((isset($info['config']['pattern'])) ? ' pattern="' . $info['config']['pattern'] . '" ' : '');

    // preparando componente
    $label = Componente_label($info['campo'], $info["config"]["obrigatorio"], $info['label']);
    $input = '<input type="' . $info['tipo'] . '" class="' . $info['config']['class'] . '" placeholder="' . $info['config']['dica'] . '" id="' . $info['campo'] . '" name="' . $info['campo'] . '" autocomplete="' . $info['config']['autocomplete'] . '" style="' . $info['config']['style'] . '" value="' . $info['dados'] . '" ' . $autofocus . $require . $pattern . $info['config']['estado'] . '>';
    $mensagem = (isset($info['mensagem']) ? Componente_mensagem($info['mensagem']['cor'], $info['mensagem']['texto']) : '');
    $render  = Componente_div('form-group ' . $info['config']['grade'], $label . $input . $mensagem);

    return $render;    
}

function Componente_div(string $classe, string $conteudo)
{
    $render  = '<div class="' . $classe . '">';
        $render .= $conteudo;
    $render .= '</div>';

    return $render;
}

function Componente_label(string $campo, bool $obrigatorio, array $info)
{
    $render  = '<label for="' . $campo . '">';
        $render .= $info['texto'] . ':';
        if($obrigatorio == TRUE) {
            $render .= '<i class="fas fa-star-of-life fa-sm ml-2 text-danger"' . ((isset($info['icone']['id'])) ? ' id="' . $info['icone']['id'] . '"' : '') . ((isset($info['icone']['style'])) ? ' style="' . $info['icone']['style'] . '"' : '') . '></i>';
        }
    $render .= '</label>';

    return $render;
}

function Componente_mensagem(string $cor, string $texto)
{
    $render = '<p class="help-block ' . $cor . ' small">' . $texto . '</p>';

    return $render;
}