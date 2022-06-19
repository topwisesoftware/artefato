<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Perfil extends BaseController
{
    protected function infoGeral()
    {
        $configuracoesModel = new \App\Models\Configuracoes();
        $usuariosModel = new \App\Models\Usuarios();
        $regrasModel = new \App\Models\Regras();

        // configurações gerais
        $data['usuarioLogado'] = TOPWISE_seguranca_UsuarioLogado();
        $data['tipo_janela_impressao'] = $configuracoesModel->tipo_janela_impressao();
        $data['dadosRegras'] = $regrasModel->findAll();
        $data['dadosUsuarios'] = $usuariosModel->find($data['usuarioLogado']->ID);

        // configurações gerais da página
        $data['titulo'] = lang('Perfil.titulo');
        $data['pagina'] = 'perfil';
        //$data['cabecalho'] = FALSE;

        // breadcrumb
        $this->breadcrumb->add(lang('Artefato.titulo'), '/');
        $this->breadcrumb->add(lang('Perfil.titulo'), '/perfil');
        $data['breadcrumb'] = $this->breadcrumb->render();

        return $data;
    }

    public function index()
    {
        // configurações da página
        $data = $this->infoGeral();
        $data['estado'] = 'entrou';
        $data['aba'] = 'perfil';
        
        return view('admin/perfil.php', $data);
    }

    public function salvar()
    {
        $usuariosModel = new \App\Models\Usuarios();

        // configurações da página
        $data = $this->infoGeral();
        $data['estado'] = 'salvar';
        $data['aba'] = 'perfil';

        // preparação dos dados para o update
        $campos = $this->request->getPost();

        if(isset($campos)) {
            // definindo o usuário a ser alterado
            $campos['ID'] = $data['usuarioLogado']->ID;
            // salvando
            if($usuariosModel->save($campos))
            {
                // tudo certo
                $saida['estado'] = 'ok';
                $saida['titulo'] = lang('Artefato.crud.mensagens.geral.ok');
                if($usuariosModel->affectedRows() > 0) {
                    $saida['msg'] = lang('Artefato.crud.mensagens.salvar.sucesso');
                } else {
                    $saida['msg'] = lang('Artefato.crud.mensagens.salvar.nada');
                }
                $saida['icone'] = 'success';
                $saida['rows'] = $usuariosModel->affectedRows();
            } else {
                // problemas...
                $saida['estado'] = 'form';
                $saida['titulo'] = lang('Artefato.crud.mensagens.geral.erro');
                $saida['msg'] = lang('Artefato.crud.mensagens.salvar.erro') . '<br> ID 001';
                $saida['icone'] = 'error';
                $saida['erros'] = $usuariosModel->errors();
            }
        } else {
            // não existem dados
            $saida['estado'] = 'erro';
            $saida['titulo'] = lang('Artefato.crud.mensagens.geral.erro');
            $saida['msg'] = lang('Artefato.crud.mensagens.salvar.semdados');
            $saida['icone'] = 'error';
            $saida['erros'] = array(
                'ID' => lang('Artefato.crud.mensagens.salvar.erro_GERAL') . '<br> ID 002',
            );
        }

        // enviar mensagem
        session()->setFlashData('saida', $saida);

        return view('admin/perfil.php', $data);
    }

    public function alterarsenha()
    {
        $usuariosModel = new \App\Models\Usuarios();

        // configurações da página
        $data = $this->infoGeral();
        $data['estado'] = 'salvar';
        $data['aba'] = 'senha';

        // preparação dos dados para o update
        $senhas = $this->request->getPost();
        $data['usuarioLogado'] = TOPWISE_seguranca_UsuarioLogado();

        if(isset($senhas)) {
            // definindo o usuário a ser alterado
            $campos['ID'] = $data['usuarioLogado']->ID;

            // verificar se SENHAANTIGA SENHANOVA CONFIRMARSENHA tem conteúdo
            if(($senhas['SENHAANTIGA'] != '') && ($senhas['SENHANOVA'] != '') && ($senhas['CONFIRMARSENHA'] != '')) {
    
                $dadosUsuario = $usuariosModel->localizarUsuario($data['usuarioLogado']->LOGIN);
                $hashUsuario = $dadosUsuario['SENHA'];

                // verificar SENHAANTIGA, se for válida, segue adiante
                if(topwise_verificar_senha($senhas['SENHAANTIGA'], $hashUsuario)) {

                    // comparar SENHANOVA com CONFIRMARSENHA, se forem iguais segue adiante
                    if($senhas['SENHANOVA'] == $senhas['CONFIRMARSENHA']) {

                        // verificar se a senha é válida (se atende as regras)
                        if(topwise_checar_senha($senhas['SENHANOVA']))
                        {
                            // criptografar a SENHANOVA $2y$10$Lvwyk.wccaAsNX5SF8BzIOQwEtcMRByoSXcuBdZ.LRkVl3gcL/8y6
                            $campos['SENHA'] = topwise_gerar_senha($senhas['SENHANOVA']); // se foi, criptografa e envia

                            // salvar
                            if($usuariosModel->save($campos))
                            {
                                // tudo certo
                                $saida['estado'] = 'ok';
                                $saida['titulo'] = lang('Artefato.crud.mensagens.geral.ok');
                                $saida['msg'] = lang('Perfil.mensagens.senha.ok');
                                $saida['icone'] = 'success';
                                $saida['rows'] = $usuariosModel->affectedRows();
                            } else {
                                // problemas ao salvar...
                                $saida['estado'] = 'form';
                                $saida['titulo'] = lang('Perfil.mensagens.senha.erro.geral');
                                $saida['msg'] = lang('Artefato.crud.mensagens.salvar.erro') . '<br> ID 006';
                                $saida['icone'] = 'error';
                                $saida['erros'] = $usuariosModel->errors();
                            }
                        } else {
                            // senha fraca
                            $saida['estado'] = 'form';
                            $saida['titulo'] = lang('Perfil.mensagens.senha.erro.geral');
                            $saida['msg'] = lang('Perfil.mensagens.senha.erro.seguranca') . '<br> ID 005';
                            $saida['icone'] = 'error';
                            $saida['erros'] = $usuariosModel->errors();
                        }
                    } else {
                        // nova senha diferente da confirmação
                        $saida['estado'] = 'form';
                        $saida['titulo'] = lang('Perfil.mensagens.senha.erro.geral');
                        $saida['msg'] = lang('Perfil.mensagens.senha.erro.diferente') . '<br> ID 004';
                        $saida['icone'] = 'error';
                        $saida['erros'] = $usuariosModel->errors();                            
                    }
                } else {
                    // senha atual não bate
                    $saida['estado'] = 'form';
                    $saida['titulo'] = lang('Perfil.mensagens.senha.erro.geral');
                    $saida['msg'] = lang('Perfil.mensagens.senha.erro.divergente') . '<br> ID 003';
                    $saida['icone'] = 'error';
                    $saida['erros'] = $usuariosModel->errors();
                }
            } else {
                // campos incompletos
                $saida['estado'] = 'form';
                $saida['titulo'] = lang('Perfil.mensagens.senha.erro.geral');
                $saida['msg'] = lang('Perfil.mensagens.senha.erro.incompleto') . '<br> ID 002';
                $saida['icone'] = 'error';
                $saida['erros'] = $usuariosModel->errors();
            }
        } else {
            // não existem dados
            $saida['estado'] = 'erro';
            $saida['titulo'] = lang('Perfil.mensagens.senha.erro.geral');
            $saida['msg'] = lang('Artefato.crud.mensagens.salvar.semdados');
            $saida['icone'] = 'error';
            $saida['erros'] = array(
                'ID' => lang('Artefato.crud.mensagens.salvar.erro_GERAL' . '<br> ID 001'),
            );
        }

        // enviar mensagem
        session()->setFlashData('saida', $saida);

        return view('admin/perfil.php', $data);
    }
}