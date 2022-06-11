<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ConfiguracoesModel;

class Configuracoes extends BaseController
{
    public function index()
    {
        $configuracoesModel = new ConfiguracoesModel();
        $data['usuarioLogado'] = TOPWISE_seguranca_UsuarioLogado();
        $data['dadosConfiguracoes'] = $configuracoesModel->first();
        $data['titulo'] = 'Gerenciar Configurações';
        $data['pagina'] = 'configuracoes';
        $data['tipo_janela_impressao'] = $configuracoesModel->tipo_janela_impressao();
        //$data['cabecalho'] = FALSE;

        // breadcrumb
        $this->breadcrumb->add('Início', '/');
        $this->breadcrumb->add('Configuracoes', '/configuracoes');
        $data['breadcrumb'] = $this->breadcrumb->render();

        return view('admin/configuracoes', $data);

    }
}
