<?php

function TOPWISE_menu($pagina)
{

    $menu = new Menu($pagina);

    $menu->addCab('Principal');
    $menu->addItem('Clientes', 'fas fa-user', 'clientes', 'clientes');
        //$menu->addItem('Agendamento', 'fas fa-clock', 'Agendamento', 'teste');
        //$menu->addItem('Agendamento Cliente', 'fas fa-clock', 'Agendamento/Cliente', 'agendamentocliente');
        //$menu->addItem('Status Cliente', 'fas fa-search', 'Agendamento/Status', 'status');


    $menu->addCab('Gerenciamento');
        $menu->addItem('Usuários', 'fas fa-user-friends', 'usuarios', 'usuarios');
        //$menu->addItem('Liberações Pendentes', 'fas fa-calendar-check', 'Agendamento/Liberacoes', 'liberacoes', '', 0, 'badgerPlacar');
        //$menu->addItem('Relatórios', 'fas fa-list-alt', 'Agendamento/Relatorio', 'relatorio');
        //$menu->addItem('Configurações', 'fas fa-cog', 'Configuracao', 'configuracao');

    //$menu->addCab('Outros');
        //$menu->addItem('Cadastro', 'fas fa-address-book', 'Cadastro', 'cadastro');
        //$menu->addItem('Funções', 'fas fa-id-badge', 'Funcao', 'funcao');

    $menu->addCab('Sistema');
    $menu->addItem('Sair...', 'fas fa-sign-out-alt', '', '', 'menuSair');

    print $menu->exibir();

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