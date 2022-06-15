<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UsuariosModel;
use App\Models\UsuariosView;
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
        //$data['cabecalho'] = FALSE;

        // modal de insert
        $data['modal_config'] = array (
            'titulo' => lang('Artefato.crud.botoes.incluir') . ' ' . lang('Usuarios.geral.singular'),
            'id' => 'inserir-usuarios',
            'size' => 'xl',
            'acao' => 'inserir',
        );
        $data['modal_inserir_usuarios'] = view('admin/usuarios/modal_usuarios', $data);

        // breadcrumb
        $this->breadcrumb->add('Início', '/');
        $this->breadcrumb->add('Usuarios', '/usuarios');
        $data['breadcrumb'] = $this->breadcrumb->render();
        
        return view('admin/usuarios/home.php', $data);
    }

    public function exibir() {
        $usuariosView = new UsuariosView();

        $data['usuarioLogado'] = TOPWISE_seguranca_UsuarioLogado();
        $data['dadosUsuarios'] = $usuariosView->findAll();
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
            'size' => 'xl',
            'acao' => ($tp == '1') ? 'editar' : 'consultar',
        );
        echo view('admin/usuarios/modal_usuarios', $data);
       
    }

    public function salvar() {
        $usuariosModel = new UsuariosModel();

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
                if(isset($campos['ID']) && isset($campos['USER']))
                {
                    // verificar se houve manipulação das variáveis HIDDEN
                    if(topwise_verificar_senha($campos['ID'] . $campos['USER'], $campos['HASH']))
                    {
                        // se o login não mudou...
                        if($campos['LOGIN'] == $campos['USER']) {
                            unset($campos['LOGIN']); // limpa NOME da matriz pra não ir para o SQL
                        }
                        unset($campos['USER']); // limpa USER da matriz pra não ir para o SQL
                        unset($campos['HASH']); // limpa HASH da matriz pra não ir para o SQL

                        // checando se os campos estão vindo
                        if (!isset($campos['SENHA'])) { $campos["SENHA"] = ""; }

                        // checa se a senha foi modificada
                        if ($campos['SENHA'] != "[47756bbae402385717293664a281ace9]") {

                            // verificar se a senha é válida (se atende as regras)
                            if(topwise_checar_senha($campos['SENHA']))
                            {
                                $campos['SENHA'] = topwise_gerar_senha($campos['SENHA']); // se foi, criptografa e envia
                            }
                            else {
                                // se a senha não atender aos requisitos
                                $saida['estado'] = 'form';
                                $saida['titulo'] = lang('Artefato.crud.mensagens.geral.erro');
                                $saida['msg'] = lang('Artefato.crud.mensagens.salvar.erro') . '<br> ID 001';;
                                $saida['icone'] = 'error';
                                $saida['erros'] = array(
                                    'SENHA' => lang('Artefato.crud.mensagens.editar.erro_SENHA')
                                );
                            }

                        } else {
                            unset($campos['SENHA']); // se não, limpa SENHA da matriz pra não ir para o SQL
                        }
                    } else {
                        // se houve manipulação...
                        $saida['estado'] = 'form';
                        $saida['titulo'] = lang('Artefato.crud.mensagens.geral.erro');
                        $saida['msg'] = lang('Artefato.crud.mensagens.salvar.erro') . '<br> ID 002';;
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
                    $saida['msg'] = lang('Artefato.crud.mensagens.salvar.erro') . '<br> ID 003';;
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
                {// não há ID? tudo certo
                    // checando se os campos estão vindo
                    if (!isset($campos['SENHA'])) { $campos["SENHA"] = ""; }

                    // verificar se a senha é válida (se atende as regras)
                    if(topwise_checar_senha($campos['SENHA']))
                    {
                        $campos['SENHA'] = topwise_gerar_senha($campos['SENHA']); // se foi, criptografa e envia
                    }
                    else {
                        // se a senha não atender aos requisitos
                        $saida['estado'] = 'form';
                        $saida['titulo'] = lang('Artefato.crud.mensagens.geral.erro');
                        $saida['msg'] = lang('Artefato.crud.mensagens.salvar.erro') . '<br> ID 004';
                        $saida['icone'] = 'error';
                        $saida['erros'] = array(
                            'SENHA' => lang('Artefato.crud.mensagens.editar.erro_SENHA')
                        );
                    }

                } else {
                    // se tiver ID gerar ERRO
                    $saida['estado'] = 'form';
                    $saida['titulo'] = lang('Artefato.crud.mensagens.geral.erro');
                    $saida['msg'] = lang('Artefato.crud.mensagens.salvar.erro') . '<br> ID 005';
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

                    if($modo == 'incluir') {
                        $saida['id'] = $usuariosModel->getInsertID();
                    };

                    $saida['rows'] = $usuariosModel->affectedRows();
                    $saida['modo'] = $modo;
                } else {
                    // problemas...
                    $saida['estado'] = 'form';
                    $saida['titulo'] = lang('Artefato.crud.mensagens.geral.erro');
                    $saida['msg'] = lang('Artefato.crud.mensagens.salvar.erro') . '<br> ID 006';
                    $saida['icone'] = 'error';
                    $saida['erros'] = $usuariosModel->errors();
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

    public function excluir() {
        $usuariosModel = new UsuariosModel();

        // preparação dos dados para o update
        $id = trim($_POST['id']);
        $result = $usuariosModel->delete($id);

        echo $result;
    }    

    function processarfoto($id){
        $usuariosModel = new UsuariosModel();

        // configuração do download
        $uploadPath = 'assets/img/usuarios/';

        //$arquivo = $this->request->getFile('userfile');
        $validarImagem = $this->validate([
            'userfile' => [
                'uploaded[userfile]',
                'max_size[userfile,8192]',
                'mime_in[userfile,image/png,image/jpg,image/jpeg,image/gif]',
                'ext_in[userfile,png,jpg,jpeg,gif]',
                'max_dims[userfile,1024,768]',
            ]
        ]);

        if(!$validarImagem) {
            // problemas ao salvar...
            $saida['estado'] = 'form';
            $saida['titulo'] = 'Erro ao validar o arquivo enviado!';
            $saida['msg'] = 'Erro na validação' . ' - ID 001';
            $saida['icone'] = 'error';
            $saida['foto'] = '';
            $saida['erros'] = [];
        } else {
            // obtem o arquivo
            $arquivo = $this->request->getFile('userfile');

            // prepara, redimensiona e salva no disco
            $image = \Config\Services::image()
                ->withFile($arquivo)
                ->resize(300, 300, true, 'height')
                ->save(FCPATH . $uploadPath . topwise_MD5($id) . '.jpg');

            // salvando
            if($usuariosModel->update($id, ['FOTO' => 1])) {
                // tudo certo
                $saida['estado'] = 'ok';
                $saida['titulo'] = lang('Artefato.crud.mensagens.geral.ok');
                $saida['msg'] = 'Foto atualizada com sucesso!';
                $saida['icone'] = "success";
                $saida['foto'] = base_url($uploadPath . topwise_MD5($id) . '.jpg?' . topwise_MD5(date('Y-m-d H:i')));
                $saida['erros'] = [];
            } else {
                // problemas...
                $saida['estado'] = 'form';
                $saida['titulo'] = lang('Artefato.crud.mensagens.geral.erro');
                $saida['msg'] = 'Erro ao salvar imagem' . '- ID 002';
                $saida['icone'] = 'error';
                $saida['foto'] = '';
                $saida['erros'] = $usuariosModel->errors();
            }
        }

        echo json_encode($saida);
     }    
}