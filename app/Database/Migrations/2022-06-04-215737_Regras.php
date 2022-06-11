<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Regras extends Migration
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
            'REGRA' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
                'null' => false,
            ],
            'NOME' => [
                'type'       => 'VARCHAR',
                'constraint' => '35',
                'null' => false,
            ],
            'DESCRICAO' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null' => false,
            ],
            'COR' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null' => false,
            ],
            'PERMISSAO' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
                'null' => false,
            ],
            'PADRAO' => [
                'type'       => 'ENUM',
                'constraint' => ['S', 'N'],
                'default' => 'N'
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
        $this->forge->addUniqueKey('REGRA');
        
        // criar tabela
        $atributos = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('regras', false, $atributos);
    }

    public function down()
    {
        // excluir tabela
        $this->forge->dropTable('regras', true);
    }
}
