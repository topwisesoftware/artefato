<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\RegrasModel;
use App\Models\ConfiguracoesModel;

class Usuarios extends BaseController
{
    public function index()
    {
        $usuariosModel = new UsuariosModel();
        $regrasModel = new RegrasModel();
        $configuracoesModel = new ConfiguracoesModel();

        $data['usuarioLogado'] = TOPWISE_seguranca_UsuarioLogado();
        $data['dadosUsuarios'] = $usuariosModel->findAll();
        $data['dadosRegras'] = $regrasModel->findAll();

        $data['titulo'] = 'Gerenciar Usuários';
        $data['pagina'] = 'usuarios';
        $data['modal_inserir_usuarios'] = TOPWISE_artefato_modal('admin/usuarios/modal_inserir_usuarios', 'inserir-usuarios', $data, 'lg');
        $data['tipo_janela_impressao'] = $configuracoesModel->tipo_janela_impressao();

        return view('admin/usuarios/home.php', $data);
    }

    public function exibir() {
        $usuariosModel = new UsuariosModel();

        $data['usuarioLogado'] = TOPWISE_seguranca_UsuarioLogado();
        $data['dadosUsuarios'] = $usuariosModel->todos();
        $data['erros'] = 0;

        return view('admin/usuarios/home_listar.php', $data);
    }

    public function relatorio($tipo = 'listagem') {
        $usuariosModel = new UsuariosModel();

        $data['usuarioLogado'] = TOPWISE_seguranca_UsuarioLogado();

        if($tipo == 'listagem') {
            $data['dadosUsuarios'] = $usuariosModel->findAll();
            $data['titulo'] = lang('Artefato.crud.titulos.listagem') . ' ' .  lang('Usuarios.geral.plural');
            $data['descricao'] = lang('Artefato.crud.listagens.alfabetica');
        }
        
        return view('admin/usuarios/listagem', $data);
    }

}
