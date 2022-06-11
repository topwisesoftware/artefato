<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $data['usuarioLogado'] = TOPWISE_seguranca_UsuarioLogado();
        $data['titulo'] = 'Artefato ' . TopWise_App_Versao();
        $data['pagina'] = 'admin';
        $data['cabecalho'] = FALSE;

        // breadcrumb
        $data['breadcrumb'] = '';

        //return view('welcome_message');
        return view('admin/principal.php', $data);
    }
}
