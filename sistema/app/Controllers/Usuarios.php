<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\RegrasModel;

class Usuarios extends BaseController
{
    public function index()
    {
        $usuariosModel = new UsuariosModel();
        $regrasModel = new RegrasModel();

        $data['usuarioLogado'] = TOPWISE_seguranca_UsuarioLogado();
        $data['dadosUsuarios'] = $usuariosModel->findAll();
        $data['dadosRegras'] = $regrasModel->findAll();

        $data['titulo'] = 'Gerenciar Usuários';
        $data['pagina'] = 'usuarios';
        $data['modal_inserir_usuario'] = TOPWISE_artefato_modal('admin/usuarios/modal_inserir_usuario', 'inserir-usuario', $data, 'lg');

        //return view('welcome_message');
        return view('admin/usuarios/home.php', $data);
    }

    public function exibir() {
        $usuariosModel = new UsuariosModel();

        $data['usuarioLogado'] = TOPWISE_seguranca_UsuarioLogado();
        $data['dadosUsuarios'] = $usuariosModel->todos();
        $data['erros'] = 0;

        return view('admin/usuarios/home_listar.php', $data);
    }    

}
