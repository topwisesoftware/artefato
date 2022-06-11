<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Clientes extends Migration
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
            'NOME' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'EMAIL' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'TELEFONE' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null' => false,
            ],
            'FOTO' => [
                'type'       => 'BIT',
                'constraint' => '1',
                'null' => true,
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
        
        // criar tabela
        $atributos = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('clientes', false, $atributos);
    }

    public function down()
    {
        // excluir tabela
        $this->forge->dropTable('clientes', true);
    }
}
