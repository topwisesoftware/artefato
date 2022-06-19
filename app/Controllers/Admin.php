<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    protected function infoGeral()
    {
        // configurações gerais
        $data['usuarioLogado'] = TOPWISE_seguranca_UsuarioLogado();

        // configurações gerais da página
        $data['titulo'] = 'Artefato ' . TopWise_App_Versao();
        $data['pagina'] = 'admin';
        $data['cabecalho'] = FALSE;

        // breadcrumb
        $data['breadcrumb'] = '';

        return $data;
    }

    public function index()
    {
        // configurações da página
        $data = $this->infoGeral();

        return view('admin/principal.php', $data);
    }
}
