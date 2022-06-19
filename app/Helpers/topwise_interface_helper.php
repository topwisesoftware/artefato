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

    <?= Componente(array(
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
    )) ?>

    Componente(array(
        'componente' => 'img',
        'id' => 'tagID',
        'pasta' => '',
        'imagem' => '1',
        'classe' => '',
        'estilo' => '',
        'descricao' => '',
        'titulo' => '',
        'cripto' = FALSE,
    ));


    $campoIDIOMA = array(
        'componente' => 'select',
        'campo' => 'IDIOMA',
        'dados' => $dadosUsuarios->IDIOMA,
        'label' => array(
            'texto' => lang('Usuarios.geral.campos.idioma.nome'),
        ),
        'config' => array(
            'class' => 'custom-select form-control',
        ),
        'opcoes' => ['portuguese-br', 'english'],
    );




    <div class="form-group col-sm-7">
    <label><?= lang('Usuarios.geral.campos.idioma.nome') ?>:<i class="fas fa-star-of-life fa-sm ml-2 text-danger"></i></label>
    <select class="custom-select form-control" id="idioma" name="IDIOMA">
        <option value="portuguese-br" <?php if($dadosUsuarios->IDIOMA == 'portuguese-br'){echo "selected='selected'";} ?>>Português</option>
        <option value="english" <?php if($dadosUsuarios->IDIOMA == 'english'){echo "selected='selected'";} ?>>English</option>
    </select>

*/

function Componente(array $info)
{
    switch ($info['componente']):
        case 'input': 
            $render = Componente_input($info);
            break;

        case 'img':
            $render = Componente_img($info);
            break;

        case 'select':
            $render = Componente_select($info);
            break;

        case 'button':
            $render = Componente_button($info);
            break;

        case 'file':
            $render = Componente_file($info);
            break;

        case 'foto':
            $render = Componente_foto($info);
            break;

        default:
            $render = '';
            break;
    endswitch;    

    return $render;
}

function Componente_img(array $info)
{
    // configurações
    $semFoto = 'semfoto.jpg';
    $pastaAssets = 'assets/img/';
    $urlSemFoto = base_url($pastaAssets . $semFoto);
    $dirSemFoto = './' . $pastaAssets . $semFoto;
    $hashTempo = topwise_MD5(date('Y-m-d H:i'));
    $urlBaseImagem = base_url($pastaAssets . $info['pasta']);
    $dirBaseImagem = './' . $pastaAssets . $info['pasta'] . '/';

    // verificar criptografia
    // padrão é TRUE
    if(isset($info['cripto'])) {
        $criptografar = $info['cripto'];
    } else {
        $criptografar = TRUE;
    }

    // preparar o arquivo
    if($criptografar) {
        $arqImagemJPG = topwise_MD5($info['imagem']) . '.jpg';
        $arqImagemPNG = topwise_MD5($info['imagem']) . '.png';
    } else {
        $arqImagemJPG = $info['imagem'] . '.jpg';
        $arqImagemPNG = $info['imagem'] . '.png';
    }
    $urlImagemJPG = $urlBaseImagem . '/' . $arqImagemJPG;
    $arqImagemJPG = $dirBaseImagem . $arqImagemJPG;

    $urlImagemPNG = $urlBaseImagem . '/' . $arqImagemPNG;
    $arqImagemPNG = $dirBaseImagem . $arqImagemPNG;

    // verificando a existencia da imagem
    if (file_exists($arqImagemJPG)) {
        // achou JPG
        $urlFoto = $urlImagemJPG;
    } else {
        if (file_exists($arqImagemPNG)) {
            // achou PNG
            $urlFoto = $urlImagemPNG;
        } else {
            // não achou nada... exibir imagem padrão
            $urlFoto = $urlSemFoto;
        }        
    }

    // verificando id
    if(isset($info['id']) && $info['id'] != "") {
        $tagID = 'id="' . $info['id'] . '"';
    } else {
        $tagID = '';
    }

    // verificando classe
    if(isset($info['classe']) && $info['classe'] != "") {
        $tagClass = 'class="' . $info['classe'] . '"';
    } else {
        $tagClass = '';
    }

    // verificando estilo
    if(isset($info['estilo']) && $info['estilo'] != "") {
        $tagStyle = 'style="' . $info['estilo'] . '"';
    } else {
        $tagStyle = '';
    }

    // verificando descricao
    if(isset($info['descricao']) && $info['descricao'] != "") {
        $tagAlt = 'alt="' . $info['descricao'] . '"';
    } else {
        $tagAlt = '';
    }

    // verificando titulo
    if(isset($info['titulo']) && $info['titulo'] != "") {
        $tagTitle = 'title="' . $info['titulo'] . '"';
    } else {
        $tagTitle = '';
    }


    $render  = "<img {$tagID} {$tagClass} {$tagStyle} src='{$urlFoto}?{$hashTempo}' {$tagAlt} {$tagTitle}>";

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

function Componente_div(string $classe, string $conteudo, string $id = '')
{
    $id = (($id != '') ? " id='{$id}'" : '');
    $render  = "<div class='{$classe}'{$id}>{$conteudo}</div>";
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
    $render = '<p class="help-block ' . $cor . ' small pb-0 mb-0">' . $texto . '</p>';

    return $render;
}

function Componente_select(array $info)
{
     // preparando componente
    $label = Componente_label($info['campo'], $info["config"]["obrigatorio"], $info['label']);
    
    $select = "<select class='{$info['config']['class']}' id='{$info['campo']}' name='{$info['campo']}' {$info['config']['estado']}>";

    foreach ($info['opcoes'] as $opcao => $descricao) {

        $cor = ($descricao['cor'] != '') ? " class='text-{$descricao['cor']} ?>' " : '';
        
        $selected = (($info['dados'] != '') ? (($info['dados'] == $opcao) ? ' selected' : '') : (($descricao['padrao'] == 'S') ? ' selected' : ''));

        /*
        if($info['dados'] != '') {
            $selected = (($info['dados'] == $opcao) ? 'selected' : '');
        } else {
            $selected = (($descricao['padrao'] == 'S') ? 'selected' : '');            
        }*/


        $select .= "<option value='{$opcao}'{$cor}{$selected}>{$descricao['descricao']}</option>";
    }

    $select .= '</select>';
 
    $render  = Componente_div('form-group ' . $info['config']['grade'], $label . $select);

    return $render;    
}

function Componente_button(array $info)
{
    $classeBotao = "btn btn-{$info['cor']} {$info['classe']}";
    $iconeBotao = (($info['icone'] != '') ? " <i class='{$info['icone']}'></i></i> " : '');

    if($info['tipo'] == 'submit') {
        $render = "<button type='submit' class='{$classeBotao}'>{$iconeBotao}{$info['texto']}</button>";
    } else {
        $render = '';
    }

    return $render;    
}

function Componente_file(array $info)
{
    $input = "<input type='file' class='custom-file-input' id='{$info['campo']}' name='{$info['campo']}' accept='{$info['accept']}' placeholder='{$info['label']}' data-id='{$info['codigo']}'>";
    $mensagem = "<label class='custom-file-label' for='{$info['campo']}'>{$info['texto']}</label>";
    
    $render = Componente_div('form-group', 
                Componente_div('custom-file',
                    $input . $mensagem
                )
              );

    return $render;
}

function Componente_foto(array $info)
{
    $label = Componente_label($info['campo'], false, $info['label']);
    $foto = Componente_div('col-lg-3', Componente($info['imagem']), 'localfoto');
    $arquivo = Componente_div('col-lg-9', Componente($info['arquivo']) . $info['instrucoes']);
    $render = Componente_div('form-group col-lg-12', $label . Componente_div('row', $foto . $arquivo));

    return $render;
}