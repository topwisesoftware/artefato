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

// para ser usado ao chamar janelas modal
// usado em todo o sistema
function TOPWISE_artefato_modal($content='', $id='', $data='', $size='md') {
    //$_ci =& get_instance();
    //echo '>>>[' . print_r($data) . ']<<<';
    if ($content != '') {
        $view_content = view($content, $data); // $_ci->load->view($content, $data, TRUE);

        return '<div class="modal fade" id="' .$id .'" role="dialog">
                    <div class="modal-dialog modal-' .$size .'" role="document">
                    <div class="modal-content">
                        ' .$view_content .'
                    </div>
                    </div>
                </div>';
    }
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
