<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Clientes extends BaseController
{
    protected function infoGeral()
    {
        $configuracoesModel = new \App\Models\Configuracoes();

        // configurações gerais
        $data['usuarioLogado'] = TOPWISE_seguranca_UsuarioLogado();
        $data['tipo_janela_impressao'] = $configuracoesModel->tipo_janela_impressao();

        // configurações gerais da página
        $data['titulo'] = 'Gerenciar Clientes';
        $data['pagina'] = 'clientes';
        //$data['cabecalho'] = FALSE;

        // breadcrumb
        $this->breadcrumb->add(lang('Artefato.titulo'), '/');
        $this->breadcrumb->add(lang('Clientes.titulo'), '/clientes');
        $data['breadcrumb'] = $this->breadcrumb->render();

        return $data;
    }

    public function index()
    {
        $clientesModel = new \App\Models\Clientes();

        // configurações da página
        $data = $this->infoGeral();

        // dados
        $data['dadosClientes'] = $clientesModel->findAll();

        // modal de insert
        $data['modal_config'] = array (
            'titulo' => lang('Artefato.crud.botoes.incluir') . ' ' . lang('Clientes.geral.singular'),
            'id' => 'inserir-clientes',
            'size' => 'xl',
            'acao' => 'inserir',
        );
        $data['modal_inserir_clientes'] = view('admin/clientes/modal_clientes', $data);

        return view('admin/clientes/home.php', $data);
    }

    public function exibir()
    {
        $clientesModel = new \App\Models\Clientes();

        // dados
        $data['usuarioLogado'] = TOPWISE_seguranca_UsuarioLogado();
        $data['dadosClientes'] = $clientesModel->findAll();
        $data['erros'] = 0;

        return view('admin/clientes/home_listar.php', $data);
    }

    public function relatorio($tipo = 'listagem')
    {
        $clientesModel = new \App\Models\Clientes();

        // dados
        $data['usuarioLogado'] = TOPWISE_seguranca_UsuarioLogado();
        if($tipo == 'listagem') {
            $data['dadosClientes'] = $clientesModel->findAll();
            $data['titulo'] = lang('Artefato.crud.titulos.listagem') . ' ' .  lang('Clientes.geral.plural');
            $data['descricao'] = lang('Artefato.crud.listagens.alfabetica');
        }
        
        return view('admin/clientes/listagem', $data);
    }

    public function editar()
    {
        $clientesModel = new \App\Models\Clientes();

        // configurações da página
        $data = $this->infoGeral();

        // preparando dados
        $id = trim($_POST['id']);
        $tp = trim($_POST['tp']);

        // dados
        $data['dadosClientes'] = $clientesModel->find($id);
        
        // modal de atualização/consulta
        $data['modal_config'] = array (
            'titulo' => lang(($tp == '1') ? 'Artefato.crud.botoes.editar' : 'Artefato.crud.botoes.consultar') . ' ' . lang('Clientes.geral.singular'),
            'id' => 'editar-clientes',
            'size' => 'xl',
            'acao' => ($tp == '1') ? 'editar' : 'consultar',
        );

        echo view('admin/clientes/modal_clientes', $data);
    }

    public function salvar()
    {
        $clientesModel = new \App\Models\Clientes();

        // preparação dos dados para o update
        $campos = $this->request->getPost();
        $saida['estado'] = 'normal';

        // se existir a array
        if(isset($campos))
        {
            // verificar se é edição (se há HASH)
            if(isset($campos['HASH']))
            { // modo de edição
                $modo = 'editar';

                // verificar se nada foi alterado/crackeado
                if(isset($campos['ID']))
                {
                    // verificar se houve manipulação das variáveis HIDDEN
                    if(topwise_verificar_senha($campos['ID'], $campos['HASH']))
                    {

                        unset($campos['HASH']); // limpa HASH da matriz pra não ir para o SQL

                    } else {
                        // se houve manipulação...
                        $saida['estado'] = 'form';
                        $saida['titulo'] = lang('Artefato.crud.mensagens.geral.erro');
                        $saida['msg'] = lang('Artefato.crud.mensagens.salvar.erro') . '<br> ID 001';;
                        $saida['icone'] = 'error';
                        $saida['erros'] = array(
                            'ID' => lang('Artefato.crud.mensagens.editar.erro_ID'),
                            'GERAL' => lang('Artefato.crud.mensagens.editar.erro_CRIPTO'),
                        );
                    }
                }
                else {
                    // se não tiver ID e USER gerar ERRO
                    $saida['estado'] = 'form';
                    $saida['titulo'] = lang('Artefato.crud.mensagens.geral.erro');
                    $saida['msg'] = lang('Artefato.crud.mensagens.salvar.erro') . '<br> ID 002';;
                    $saida['icone'] = 'error';
                    $saida['erros'] = array(
                        'ID' => lang('Artefato.crud.mensagens.editar.erro_ID'),
                        'GERAL' => lang('Artefato.crud.mensagens.editar.erro_HASH'),
                    );
                }
            }
            else
            { // modo de inclusão
                $modo = 'incluir';

                // verificar se há ID por segurança
                if(!isset($campos['ID']))
                {
                    
                    // não há ID? tudo certo

                } else {
                    // se tiver ID gerar ERRO
                    $saida['estado'] = 'form';
                    $saida['titulo'] = lang('Artefato.crud.mensagens.geral.erro');
                    $saida['msg'] = lang('Artefato.crud.mensagens.salvar.erro') . '<br> ID 003';
                    $saida['icone'] = 'error';
                    $saida['erros'] = array(
                        'ID' => lang('Artefato.crud.mensagens.incluir.erro_ID'),
                    );
                }
            }

            // se está tudo normal, prosseguir com SALVAR de fato
            if($saida['estado'] == 'normal')
            {
                // salvando
                if($clientesModel->save($campos))
                {
                    // tudo certo
                    $saida['estado'] = 'ok';
                    $saida['titulo'] = lang('Artefato.crud.mensagens.geral.ok');

                    if($clientesModel->affectedRows() > 0) {
                        $saida['msg'] = lang('Artefato.crud.mensagens.salvar.sucesso');
                    } else {
                        $saida['msg'] = lang('Artefato.crud.mensagens.salvar.nada');
                    }

                    $saida['icone'] = 'success';

                    if($modo == 'incluir') {
                        $saida['id'] = $clientesModel->getInsertID();
                    };

                    $saida['rows'] = $clientesModel->affectedRows();
                    $saida['modo'] = $modo;
                } else {
                    // problemas...
                    $saida['estado'] = 'form';
                    $saida['titulo'] = lang('Artefato.crud.mensagens.geral.erro');
                    $saida['msg'] = lang('Artefato.crud.mensagens.salvar.erro') . '<br> ID 004';
                    $saida['icone'] = 'error';
                    $saida['erros'] = $clientesModel->errors();
                }
            }

        } else {
            // não existem dados
            $saida['estado'] = 'erro';
            $saida['titulo'] = lang('Artefato.crud.mensagens.geral.erro');
            $saida['msg'] = lang('Artefato.crud.mensagens.salvar.semdados');
            $saida['icone'] = 'error';
            $saida['erros'] = array(
                'ID' => lang('Artefato.crud.mensagens.salvar.erro_GERAL'),
            );
        }

        echo json_encode($saida);
    }

    public function excluir()
    {
        $clientesModel = new \App\Models\Clientes();

        // preparação dos dados para o update
        $id = trim($_POST['id']);
        $result = $clientesModel->delete($id);

        echo $result;
    }
}