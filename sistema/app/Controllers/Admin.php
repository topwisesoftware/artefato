<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data['titulo'] = 'Artefato ' . TopWise_App_Versao();
        $data['pagina'] = 'admin';
        $data['dadosUsuario'] = session()->set('usuarioLogado');

        //return view('welcome_message');
        return view('admin/principal.php', $data);
    }

}