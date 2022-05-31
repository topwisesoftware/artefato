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
        $data['tipo_janela_impressao'] = $configuracoesModel->tipo_janela_impressao();

        // modal de insert
        $data['modal_config'] = array (
            'titulo' => lang('Artefato.crud.botoes.incluir') . ' ' . lang('Usuarios.geral.singular'),
            'id' => 'inserir-usuarios',
            'size' => 'lg',
            'acao' => 'inserir',
        );
        $data['modal_inserir_usuarios'] = view('admin/usuarios/modal_usuarios', $data);

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

    public function editar() {
        $usuariosModel = new UsuariosModel();
        $regrasModel = new RegrasModel();
        $configuracoesModel = new ConfiguracoesModel();

        // preparando dados
        $id = trim($_POST['id']);
        $tp = trim($_POST['tp']);

        $data['usuarioLogado'] = TOPWISE_seguranca_UsuarioLogado();
        $data['dadosUsuarios'] = $usuariosModel->find($id);
        $data['dadosRegras'] = $regrasModel->findAll();
        $data['titulo'] = 'Gerenciar Usuários';
        $data['pagina'] = 'usuarios';
        $data['tipo_janela_impressao'] = $configuracoesModel->tipo_janela_impressao();
        
        //$data['erros'] = $this->form_validation->error_array();

        // modal de atualização/consulta
        $data['modal_config'] = array (
            'titulo' => lang(($tp == '1') ? 'Artefato.crud.botoes.editar' : 'Artefato.crud.botoes.consultar') . ' ' . lang('Usuarios.geral.singular'),
            'id' => 'editar-usuarios',
            'size' => 'lg',
            'acao' => ($tp == '1') ? 'editar' : 'consultar',
        );
        echo view('admin/usuarios/modal_usuarios', $data);
       
    }

}
