<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Metodos extends Migration
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
                'constraint' => '255',
                'null' => false,
            ],
            'METODO' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'PAGINAS_ID' => [
                'type'       => 'INT',
                'constraint' => '11',
                'null' => false,
            ],
            'CHAVE' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->addUniqueKey('CHAVE');
        
        // criar tabela
        $atributos = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('metodos', false, $atributos);
    }

    public function down()
    {
        // excluir tabela
        $this->forge->dropTable('metodos', true);
    }
}
