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

        // mensagem
        $saida = session()->getFlashData('msg');
        if(!isset($saida)) {
            $saida['estado'] = 'abrindo';
            $saida['titulo'] = "";
            $saida['msg'] = "";
            $saida['icone'] = 'error';
            $saida['erros'] = [];
        }
        $data['saida'] = json_encode($saida);

        return view('admin/configuracoes/configuracoes', $data);
    }

    public function salvar()
    {
        $configuracoesModel = new ConfiguracoesModel();

        // preparação dos dados para o update
        $campos = $this->request->getPost();



        // se existir a array
        if(isset($campos))
        {
            // definindo o ID
            $campos['ID'] = 1; 
            //var_dump($campos); exit;

            // salvando
            if($configuracoesModel->save($campos))
            {
                // tudo certo
                $saida['titulo'] = lang('Artefato.crud.mensagens.geral.ok');
                if($configuracoesModel->affectedRows() > 0) {
                    $saida['estado'] = 'ok';
                    $saida['msg'] = lang('Configuracoes.mensagens.sucesso');
                    $saida['icone'] = 'success';
                } else {
                    $saida['estado'] = 'erro';
                    $saida['msg'] = lang('Artefato.crud.mensagens.salvar.nada');
                    $saida['icone'] = 'success';
                }
            } else {
                // problemas...
                $saida['estado'] = 'form';
                $saida['titulo'] = lang('Artefato.crud.mensagens.geral.erro');
                $saida['msg'] = lang('Artefato.crud.mensagens.salvar.erro') . '<br> ID 001';
                $saida['icone'] = 'error';
                $saida['erros'] = $configuracoesModel->errors();
            }

        } else {
            // não existem dadostopwise 
            $saida['estado'] = 'erro';
            $saida['titulo'] = lang('Artefato.crud.mensagens.geral.erro');
            $saida['msg'] = lang('Artefato.crud.mensagens.salvar.semdados') . '<br> ID 002';
            $saida['icone'] = 'error';
            $saida['erros'] = array(
                'ID' => lang('Artefato.crud.mensagens.salvar.erro_GERAL'),
            );
        }


        return redirect()->to(base_url('/configuracoes'))->with('msg', $saida);
    }
}