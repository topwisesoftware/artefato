<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{
    public function up()
    {
        // campos
        $this->forge->addField([
            'ID' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
                'null' => false,
            ],
            'LOGIN' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
                'null' => false,
            ],
            'EMAIL' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'NIVEL' => [
                'type'       => 'ENUM',
                'constraint' => ['ADMINISTRADOR','EQUIPE','INATIVO','CANCELADO','DESENVOLVEDOR'],
                'default' => 'EQUIPE',
                'null' => false,
            ],
            'SENHA' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
                'default' => NULL
            ],
            'NOME' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'TELEFONE' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null' => false,
            ],
            'CARGO' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null' => false,
            ],
            'FOTO' => [
                'type'       => 'BIT',
                'constraint' => '1',
                'null' => true,
            ],
            'IDIOMA' => [
                'type'       => 'ENUM',
                'constraint' => ['portuguese-br', 'english'],
                'default' => 'portuguese-br',
                'null' => false,
            ],
            'MODO' => [
                'type'       => 'ENUM',
                'constraint' => ['CLARO', 'ESCURO'],
                'default' => 'CLARO',
                'null' => false,
            ],            
            'USUCADASTRO' => [
                'type'       => 'VARCHAR',
                'constraint' => '40',
                'default' => NULL
            ],
            'USUALTERACAO' => [
                'type'       => 'VARCHAR',
                'constraint' => '40',
                'default' => NULL
            ],
            'USUEXCLUSAO' => [
                'type'       => 'VARCHAR',
                'constraint' => '40',
                'default' => NULL
            ],
            'DATACADASTRO' => [
                'type'       => 'DATETIME',
                'default' => NULL
            ],
            'DATAALTERACAO' => [
                'type'       => 'DATETIME',
                'default' => NULL
            ],
            'DATAEXCLUSAO' => [
                'type'       => 'DATETIME',
                'default' => NULL
            ],
        ]);
        
        // chaves
        $this->forge->addPrimaryKey('ID');
        $this->forge->addUniqueKey('LOGIN');
        
        // criar tabela
        $atributos = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('usuarios', false, $atributos);

        // criar view
        $criarView  = 'CREATE VIEW `view_usuarios` AS ';
            $criarView .= 'select ';
                $criarView .= '`usu`.`ID` AS `ID`, ';
                $criarView .= '`usu`.`LOGIN` AS `LOGIN`, ';
                $criarView .= '`usu`.`EMAIL` AS `EMAIL`, ';
                $criarView .= '`usu`.`NIVEL` AS `NIVEL`, ';
                    $criarView .= '`reg`.`NOME` AS `NOME_REGRA`, ';
                    $criarView .= '`reg`.`COR` AS `COR_REGRA`, ';
                $criarView .= '`usu`.`SENHA` AS `SENHA`, ';
                $criarView .= '`usu`.`NOME` AS `NOME`, ';
                $criarView .= '`usu`.`TELEFONE` AS `TELEFONE`, ';
                $criarView .= '`usu`.`CARGO` AS `CARGO`, ';
                $criarView .= '`usu`.`IDIOMA` AS `IDIOMA`, ';
                $criarView .= '`usu`.`MODO` AS `MODO`, ';
                $criarView .= '`usu`.`FOTO` AS `FOTO`, ';
                $criarView .= '`usu`.`USUCADASTRO` AS `USUCADASTRO`, ';
                $criarView .= '`usu`.`USUALTERACAO` AS `USUALTERACAO`, ';
                $criarView .= '`usu`.`USUEXCLUSAO` AS `USUEXCLUSAO`, ';
                $criarView .= '`usu`.`DATACADASTRO` AS `DATACADASTRO`, ';
                $criarView .= '`usu`.`DATAALTERACAO` AS `DATAALTERACAO`, ';
                $criarView .= '`usu`.`DATAEXCLUSAO` AS `DATAEXCLUSAO` ';
            $criarView .= 'from `usuarios` `usu` ';
            $criarView .= 'left outer join `regras` `reg` on `usu`.`NIVEL` = `reg`.`REGRA`';
        $this->db->query($criarView);
    }

    public function down()
    {
        // excluir view
        $this->db->query('DROP VIEW IF EXISTS `view_usuarios`');

        // excluir tabela
        $this->forge->dropTable('usuarios', true);
    }
}
