<?php

function TOPWISE_menu($pagina)
{

    $menu = new Menu($pagina);

    $menu->addCab('Principal');
    $menu->addItem('Clientes', 'fas fa-user', 'clientes', 'clientes');

    $menu->addCab('Gerenciamento');
    $menu->addItem('Usuários', 'fas fa-user-friends', 'usuarios', 'usuarios');

    $menu->addCab('Sistema');
    $menu->addItem('Configurações', 'fas fa-cog', 'configuracoes', 'configuracoes');
    $menu->addItem('Sair...', 'fas fa-sign-out-alt', '', '', 'menuSair');

    return $menu->exibir();
}

function TOPWISE_menu_superior($titulo, $usuarioLogado)
{
    // Left navbar links
    TOPWISE_menu_esquerda($usuarioLogado->NIVEL);

    // SEARCH FORM -->
    //TOPWISE_menu_busca($usuarioLogado->NIVEL);
    
    // TITULO
    TOPWISE_menu_titulo($titulo);

    // Right navbar links
    TOPWISE_menu_usuario($usuarioLogado);
}

function TOPWISE_menu_logo()
{
    ?>
        <a href="<?= base_url() ?>" class="brand-link">
            <img src="<?= base_url('/assets/img/' . TopWise_App_Logo()['menu']) ?>" alt="Logo" class="brand-image">
            <span class="brand-text font-weight-light text-uppercase lead"><?= TopWise_App_Nome() ?></span>
        </a>
    <?php
}


function TOPWISE_menu_esquerda(string $nivelUsuario)
{
    ?>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url('') ?>" class="nav-link"><?= lang('Artefato.inicio.menus.inicio') ?></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link"><?= lang('Artefato.inicio.menus.suporte') ?></a>
        </li>
    </ul>    
    <?php
}

function TOPWISE_menu_busca(string $nivelUsuario)
{
    if(OK($nivelUsuario, 'DESENVOLVEDOR')) { ?>
        <form action="<?= base_url('/Pesquisa/') ?>" method="post" class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="<?= lang('Artefato.inicio.pesquisar') ?>" aria-label="<?= lang('Artefato.inicio.pesquisar') ?>" id="palavra" name="palavra">
                <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                </div>
            </div>
        </form>
    <?php }
}

function TOPWISE_menu_usuario($usuarioLogado)
{
    if(OK($usuarioLogado->NIVEL, 'EQUIPE')) { ?>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block" style="display: none;">
                    <form action="<?= base_url('/Pesquisa/') ?>" method="post" class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="<?= lang('Artefato.inicio.pesquisar') ?>" aria-label="<?= lang('Artefato.inicio.pesquisar') ?>" id="palavra" name="palavra">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>

            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <?= Componente(array(
                            'componente' => 'img',
                            'id' => 'foto_mini',
                            'pasta' => 'usuarios',
                            'imagem' => ($usuarioLogado->FOTO == 1 ? $usuarioLogado->ID : -1),
                            'classe' => 'user-image img-circle elevation-2',
                            'estilo' => '',
                            'descricao' => lang('Artefato.perfil.textos.descricaoFoto'),
                            'titulo' => $usuarioLogado->NOME,
                            'cripto' => TRUE,
                        )) ?>                    
                    <span class="d-none d-md-inline"><?= $usuarioLogado->LOGIN ?></span>
                </a>
                
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                
                    <!-- User image -->
                    <li class="user-header <?= (($usuarioLogado->MODO == 'ESCURO') ? 'bg-gray-dark' : 'bg-lightblue') ?>">
                        <?= Componente(array(
                                'componente' => 'img',
                                'id' => 'foto_perfil',
                                'pasta' => 'usuarios',
                                'imagem' => ($usuarioLogado->FOTO == 1 ? $usuarioLogado->ID : -1),
                                'classe' => 'img-circle img-fluid',
                                'estilo' => '',
                                'descricao' => lang('Artefato.perfil.textos.descricaoFoto'),
                                'titulo' => $usuarioLogado->NOME,
                                'cripto' => TRUE,
                            )) ?>
                        <p>
                            <?= $usuarioLogado->NOME ?>
                            <small><?= $usuarioLogado->NIVEL ?></small>
                            <small><?= $usuarioLogado->CARGO ?></small>
                        </p>
                    </li>
                    
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="<?= base_url('perfil') ?>" class="btn btn-default btn-flat"><?= lang('Artefato.perfil.botoes.perfil') ?></a>
                        <a href="#" class="menuSair btn btn-default btn-flat float-right"><i class="fas fa-sign-out-alt mr-2"></i><?= lang('Artefato.perfil.botoes.sair') ?></a>
                    </li>
                </ul>
            </li>

        </ul>
    <?php }
}

function TOPWISE_menu_titulo(string $titulo)
{
    ?>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <span class="nav-link lead"><b><?= mb_strtoupper(@$titulo) ?></b></span>
        </li>
    </ul>
    <?php
}

class Menu
{
    // tipos de linha
    const iCAB = 1;
    const iITEM = 2;
    const iSUB = 3;
    const iSUBITEM = 4;
    const iFIM = 5;
    const iNENHUM = 9;

    // indices das colunas
    const cTIPO = 0;
    const cTEXTO = 1;
    const cICONE = 2;
    const cLINK = 3;
    const cPAGINA = 4;
    const cCLASS = 5;
    const cNUM = 6;
    const cID = 7;

    private $_menu = array();
    private $_paginaAtual;

    function __construct($paginaAtual)
    {
        $this->_paginaAtual = $paginaAtual;
    }

    // cria um Header
    public function addCab($texto)
    {
        $this->_menu[] = array(self::iCAB, $texto);
    }

    // cria um ítem do menu
    public function addItem($texto, $icone = 'fa-circle', $link = '#', $pagina = '', $class='', $num=0, $id='')
    {

        if ($icone == '') { $icone = 'fa-circle'; }

        $this->_menu[] = array(self::iITEM, $texto, $icone, $link, $pagina, $class, $num, $id);
    }

    public function iniSub($texto, $icone = 'fa-bars', $pagina = '')
    {
        $this->_menu[] = array(self::iSUB, $texto, $icone, $pagina);
    }

    public function fimSub()
    {
        $this->_menu[] = array(self::iFIM);
    }

    public function addSubItem($texto, $icone = 'fa-circle-o', $link = '#', $pagina = '')
    {
        
        if ($icone == '') { $icone = 'fa-circle-o'; }
        
        $this->_menu[] = array(self::iSUBITEM, $texto, $icone, $link, $pagina);
    }

    public function exibir()
    {
        $num_linhas = count($this->_menu);

        $saida = '<ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">';

        for ($i=0; $i < ($num_linhas); $i++)
        { 
            
            switch ($this->_menu[$i][self::cTIPO])
            {
                case self::iCAB:
                    $saida .= '<li class="nav-header">' . mb_strtoupper($this->_menu[$i][self::cTEXTO]) . '</li>';
                    break;

                case self::iITEM:
                    // li
                    $saida .= '<li class="nav-item ' . $this->_menu[$i][self::cCLASS] . '">';

                        // link
                        $textoLink = '';

                        $textoLink .= '<a href="' . base_url($this->_menu[$i][self::cLINK]) . '"';
                        if ($this->_menu[$i][self::cPAGINA] == $this->_paginaAtual) {
                            $textoLink .= ' class="nav-link active"';
                        } else {
                            $textoLink .= ' class="nav-link"';
                        }
                        $textoLink .= '>';
                            // ícone
                            $textoLink .= '<i class="nav-icon ' . $this->_menu[$i][self::cICONE] . '"></i>';
                            // texto
                            $textoLink .= '<p>' . $this->_menu[$i][self::cTEXTO] . '</p>';
                            // numero
                            if($this->_menu[$i][self::cNUM] > 0) {
                                $textoLink .= '<span class="badge badge-danger right" id="' . $this->_menu[$i][self::cID] . '">' . $this->_menu[$i][self::cNUM] . '</span>';
                            }
                        $textoLink .= '</a>';

                        // link
                        $textoSemLink = '';
                        $textoSemLink .= '<a';
                        if ($this->_menu[$i][self::cPAGINA] == $this->_paginaAtual) {
                            $textoSemLink .= ' class="nav-link active"';
                        } else {
                            $textoSemLink .= ' class="nav-link"';
                        }
                        $textoSemLink .= ' style="cursor: pointer;">';
                            // ícone
                            $textoSemLink .= '<i class="nav-icon ' . $this->_menu[$i][self::cICONE] . '"></i>';
                            // texto
                            $textoSemLink .= '<p>' . $this->_menu[$i][self::cTEXTO] . '</p>';
                        $textoSemLink .= '</a>';

                        if($this->_menu[$i][self::cLINK] == '') {
                            $saida .= $textoSemLink;
                        } else {
                            $saida .= $textoLink;
                        }

                    $saida .= '</li>';
                    break;

                case self::iSUB:
                    // li
                    $saida .= '<li class="nav-item has-treeview';
                        $pos = strpos($this->_menu[$i][self::cLINK], $this->_paginaAtual);

                        if (!($pos === FALSE)) {
                            $saida .= ' menu-open"';
                        } else {
                            $saida .= '"';
                        }
                    $saida .= '">';


                    // link
                    $saida .= '<a href="#" class="nav-link">';
                        $saida .= '<i class="nav-icon ' . $this->_menu[$i][self::cICONE] . '"></i> ';
                        $saida .= '<p>';
                            $saida .= $this->_menu[$i][self::cTEXTO];
                            $saida .= '<i class="right fas fa-angle-left"></i>';
                        $saida .= '</p>';
                    $saida .= '</a>';
            
                    // ul
                    $saida .= '<ul class="nav nav-treeview">';
                    break;

                case self::iSUBITEM:
                    // li
                    $saida .= '<li class="nav-item">';
                    
                        // link
                        $saida .= '<a href="' . base_url($this->_menu[$i][self::cLINK]) . '"';
                        if ($this->_menu[$i][self::cPAGINA] == $this->_paginaAtual) {
                            $saida .= ' class="nav-link active"';
                        } else {
                            $saida .= ' class="nav-link"';
                        }
                        $saida .= '>';

                            // ícone
                            $saida .= '<i class="nav-icon ' . $this->_menu[$i][self::cICONE] . '"></i>';
                            // texto
                            $saida .= '<p>' . $this->_menu[$i][self::cTEXTO] . '</p>';

                        $saida .= '</a>';
                    $saida .= '</li>';

                    break;

                case self::iFIM:
                    $saida .= '</ul>';
                    $saida .= '</li>';
                   break;

            }
        }

        $saida .= '</ul>';

        return $saida;
    }

}