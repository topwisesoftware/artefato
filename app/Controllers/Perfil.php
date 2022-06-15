<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UsuariosModel;
use App\Models\UsuariosView;
use App\Models\RegrasModel;
use App\Models\ConfiguracoesModel;

class Perfil extends BaseController
{
    public function index()
    {
        $usuariosModel = new UsuariosModel();
        $regrasModel = new RegrasModel();
        $configuracoesModel = new ConfiguracoesModel();

        $data['usuarioLogado'] = TOPWISE_seguranca_UsuarioLogado();
        $data['dadosUsuarios'] = $usuariosModel->find($data['usuarioLogado']->ID);
        $data['dadosRegras'] = $regrasModel->findAll();
        $data['titulo'] = 'Perfil do Usuário';
        $data['pagina'] = 'perfil';
        $data['tipo_janela_impressao'] = $configuracoesModel->tipo_janela_impressao();
        $data['estado'] = 'entrou';
        $data['aba'] = 'perfil';
        //$data['cabecalho'] = FALSE;

        // breadcrumb
        $this->breadcrumb->add('Início', '/');
        $this->breadcrumb->add('Usuarios', '/usuarios');
        $this->breadcrumb->add('Perfil', '/perfil');
        $data['breadcrumb'] = $this->breadcrumb->render();
        
        return view('admin/perfil.php', $data);
    }

    public function salvar() {
        $usuariosModel = new UsuariosModel();
        $regrasModel = new RegrasModel();
        $configuracoesModel = new ConfiguracoesModel();

        // preparação dos dados para o update
        $campos = $this->request->getPost();
        $data['usuarioLogado'] = TOPWISE_seguranca_UsuarioLogado();

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
                'ID' => lang('Artefato.crud.mensagens.salvar.erro_GERAL' . '<br> ID 002'),
            );
        }

        $data['dadosUsuarios'] = $usuariosModel->find($data['usuarioLogado']->ID);
        $data['dadosRegras'] = $regrasModel->findAll();
        $data['titulo'] = 'Perfil do Usuário';
        $data['pagina'] = 'perfil';
        $data['tipo_janela_impressao'] = $configuracoesModel->tipo_janela_impressao();
        $data['estado'] = 'salvar';
        $data['aba'] = 'perfil';
        //$data['cabecalho'] = FALSE;

        // enviar mensagem
        session()->setFlashData('saida', $saida);

        // breadcrumb
        $this->breadcrumb->add('Início', '/');
        $this->breadcrumb->add('Usuarios', '/usuarios');
        $this->breadcrumb->add('Perfil', '/perfil');
        $data['breadcrumb'] = $this->breadcrumb->render();

        return view('admin/perfil.php', $data);
    }

    public function alterarsenha() {
        $usuariosModel = new UsuariosModel();
        $regrasModel = new RegrasModel();
        $configuracoesModel = new ConfiguracoesModel();

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
                                $saida['msg'] = 'Senha alterada com sucesso!';
                                $saida['icone'] = 'success';
                                $saida['rows'] = $usuariosModel->affectedRows();
                            } else {
                                // problemas ao salvar...
                                $saida['estado'] = 'form';
                                $saida['titulo'] = 'Erro na alteração da senha!';
                                $saida['msg'] = lang('Artefato.crud.mensagens.salvar.erro') . '<br> ID 006';
                                $saida['icone'] = 'error';
                                $saida['erros'] = $usuariosModel->errors();
                            }
                        } else {
                            // senha fraca
                            $saida['estado'] = 'form';
                            $saida['titulo'] = 'Erro na alteração da senha!';
                            $saida['msg'] = 'Nova senha não atende aos padrões mínimos de segurança! Tente novamente seguindo as instruções!' . '<br> ID 005';
                            $saida['icone'] = 'error';
                            $saida['erros'] = $usuariosModel->errors();
                        }
                    } else {
                        // nova senha diferente da confirmação
                        $saida['estado'] = 'form';
                        $saida['titulo'] = 'Erro na alteração da senha!';
                        $saida['msg'] = 'Senha de confirmação diferente da nova senha! Tente novamente!' . '<br> ID 004';
                        $saida['icone'] = 'error';
                        $saida['erros'] = $usuariosModel->errors();                            
                    }
                } else {
                    // senha atual não bate
                    $saida['estado'] = 'form';
                    $saida['titulo'] = 'Erro na alteração da senha!';
                    $saida['msg'] = 'Senha atual não confere! Tente novamente!' . '<br> ID 003';
                    $saida['icone'] = 'error';
                    $saida['erros'] = $usuariosModel->errors();
                }
            } else {
                // campos incompletos
                $saida['estado'] = 'form';
                $saida['titulo'] = 'Erro na alteração da senha!';
                $saida['msg'] = 'Faltam informações obrigatórias!' . '<br> ID 002';
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
                'ID' => lang('Artefato.crud.mensagens.salvar.erro_GERAL' . '<br> ID 001'),
            );
        }

        $data['dadosUsuarios'] = $usuariosModel->find($data['usuarioLogado']->ID);
        $data['dadosRegras'] = $regrasModel->findAll();
        $data['titulo'] = 'Perfil do Usuário';
        $data['pagina'] = 'perfil';
        $data['tipo_janela_impressao'] = $configuracoesModel->tipo_janela_impressao();
        $data['estado'] = 'salvar';
        $data['aba'] = 'senha';
        //$data['cabecalho'] = FALSE;

        // enviar mensagem
        session()->setFlashData('saida', $saida);

        // breadcrumb
        $this->breadcrumb->add('Início', '/');
        $this->breadcrumb->add('Usuarios', '/usuarios');
        $this->breadcrumb->add('Perfil', '/perfil');
        $data['breadcrumb'] = $this->breadcrumb->render();

        return view('admin/perfil.php', $data);
    }

    function processarfoto($id){

        // configurações iniciais
        $valor_upload = 1; // valor a ser atualizado no BD
        $out['tit'] = $this->lang->line('cibase_crud_ok');
        $out['msg'] = $this->lang->line('cibase_crud_foto_sucesso');
        $out['status'] = "success";
        $out['erro'] = 0;

        // configuração do download
        $config['upload_path'] = './assets/img/usuarios/';
        $config['allowed_types'] = 'jpg';
        $topMD5id = topwise_MD5($id);
        $config['file_name'] = $topMD5id . '.jpg';
        $data['nome_arquivo'] = $topMD5id . '.jpg';
        $config['overwrite'] = TRUE;

        $out['foto'] = base_url() . "assets/img/usuarios/" . $config['file_name'] . '?' . topwise_MD5(date('Y-m-d H:i'));
        //$config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);

        // faz o upload e testa
        if($this->upload->do_upload("userfile")){
            // se deu certo...

            // inicia as configurações para redimencionamento da foto
            $upload_data = $this->upload->data();
            $config2['source_image'] = './assets/img/usuarios/' . $topMD5id . '.jpg';
            $config2['create_thumb'] = FALSE;
            $config2['width'] = 300;
            $config2['height'] = 300;
            $dim = ((intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($config2['width'] / $config2['height']));
            $config2['master_dim'] = ($dim > 0) ? 'height' : 'width';

            $this->load->library('image_lib', $config2);

            // redimensiona a foto e testa
            if($this->image_lib->resize()){
                // se deu certo

                // inicia as configurações para o corte da imagem
                $image_config['image_library'] = 'gd2';
                $image_config['source_image'] = './assets/img/usuarios/' . $topMD5id . '.jpg';
                $image_config['new_image'] = './assets/img/usuarios/' . $topMD5id . '.jpg';
                $image_config['quality'] = "100%";
                $image_config['maintain_ratio'] = FALSE;
                $image_config['width'] = 300;
                $image_config['height'] = 300;
                $image_config['x_axis'] = $config2['master_dim'] = ($dim > 0) ? '50' : '0';
                $image_config['y_axis'] = $config2['master_dim'] = ($dim > 0) ? '0' : '50';

                // inicializando a lib
                $this->image_lib->clear();
                $this->image_lib->initialize($image_config); 
                 
                // faz o corte e testa
                if (!$this->image_lib->crop()){
                    // se não deu certo... 

                    $valor_upload = 0; // em qualquer erro marcar foto como 0
                    $out['tit'] = $this->lang->line('cibase_crud_erro');
                    $out['msg'] = $this->lang->line('cibase_crud_foto_erro_crop') . $this->upload->display_errors();
                    $out['status'] = "error";
                    $out['erro'] = 3;
                }
            } else {
                // se não deu certo...

                $valor_upload = 0; // em qualquer erro marcar foto como 0
                $out['tit'] = $this->lang->line('cibase_crud_erro');
                $out['msg'] = $this->lang->line('cibase_crud_foto_erro_resize') . $this->upload->display_errors();
                $out['status'] = "error";
                $out['erro'] = 2;
            }
        } else {
            // se upload não deu certo...

            $valor_upload = 0; // em qualquer erro marcar foto como 0
            $out['tit'] = $this->lang->line('cibase_crud_erro');
            $out['msg'] = $this->lang->line('cibase_crud_foto_erro_upload') . $this->upload->display_errors();
            $out['status'] = "error";
            $out['erro'] = 1;
        }

        // se houve upload de foto com sucesso
        $this->M_usuario->marcarfoto($id, $valor_upload); // marcar a foto

        // tratamento de erros
        echo json_encode($out);
     }    
}