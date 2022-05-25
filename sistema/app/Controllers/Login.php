<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class Login extends BaseController
{

    public function index()
    {
        return view('admin/login/home');
    }

    public function autenticar()
    {
        $usuario = $this->request->getPost('loginUsuario');
        $senha = $this->request->getPost('loginSenha');

        if(!((is_null($usuario) || is_null($senha)))) {

            $usuariosModel = new UsuariosModel();
            $dadosUsuario = $usuariosModel->localizarUsuario($usuario);

            if(count($dadosUsuario) > 0) {

                $hashUsuario = $dadosUsuario['SENHA'];

                if(topwise_verificar_senha($senha, $hashUsuario)) {
                    // OK

                    $dadosUsuarioLogado = [
                        'ID' => $dadosUsuario['ID'],
                        'LOGIN' => $dadosUsuario['LOGIN'],
                        'EMAIL' => $dadosUsuario['EMAIL'],
                        'NIVEL' => $dadosUsuario['NIVEL'],
                        'NOME' => $dadosUsuario['NOME'],
                        'TELEFONE' => $dadosUsuario['TELEFONE'],
                        'FOTO' => $dadosUsuario['FOTO'],
                        'IDIOMA' => $dadosUsuario['IDIOMA'],
                    ];
                    session()->set('logado', TRUE);
                    session()->set($dadosUsuarioLogado);

                    return redirect()->to(base_url());
                } else {
                    // NOK
                    session()->setFlashData('mensagem', lang('Artefato.login.mensagens.negado'));
                    return redirect()->to('/login');
                }

            } else {
                session()->setFlashData('mensagem', lang('Artefato.login.mensagens.incorreto'));
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashData('mensagem', lang('Artefato.login.mensagens.incorreto'));
            return redirect()->to('/login');
        }
    }

    public function sair()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}