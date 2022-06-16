<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        $configuracoesModel = new \App\Models\Configuracoes();
        $data['modo'] = $configuracoesModel->modo();

        return view('admin/login', $data);
    }

    public function autenticar()
    {

        $usuario = $this->request->getPost('loginUsuario');
        $senha = $this->request->getPost('loginSenha');
        
        // ferramenta para criar senha
        //$senhaCorreta = '<br>' . topwise_gerar_senha($senha);
        $senhaCorreta = '';

        if(!((is_null($usuario) || is_null($senha)))) {

            $usuariosModel = new \App\Models\Usuarios();
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
                        'CARGO' => $dadosUsuario['CARGO'],
                        'MODO' => $dadosUsuario['MODO'],
                        'FOTO' => $dadosUsuario['FOTO'],
                        'IDIOMA' => $dadosUsuario['IDIOMA'],
                    ];
                    session()->set('logado', TRUE);
                    session()->set($dadosUsuarioLogado);

                    return redirect()->to(base_url());
                } else {
                    // NOK
                    session()->setFlashData('mensagem', lang('Artefato.login.mensagens.negado') . $senhaCorreta);
                    return redirect()->to('/login');
                }

            } else {
                session()->setFlashData('mensagem', lang('Artefato.login.mensagens.incorreto') . $senhaCorreta);
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashData('mensagem', lang('Artefato.login.mensagens.incorreto') . $senhaCorreta);
            return redirect()->to('/login');
        }
    }

    public function sair()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }

}
