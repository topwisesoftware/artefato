<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Configuracoes extends Migration
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
            'TIPO_JANELA_IMPRESSAO' => [
                'type'       => 'ENUM',
                'constraint' => ['ABA', 'POPUP'],
                'default' => 'ABA'
            ],
            'IDIOMA' => [
                'type'       => 'ENUM',
                'constraint' => ['portuguese-br', 'english'],
                'default' => 'portuguese-br'
            ],
            'MODO' => [
                'type'       => 'ENUM',
                'constraint' => ['CLARO', 'ESCURO'],
                'default' => 'CLARO',
                'null' => false,
            ],              
            'CHAVE' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'USUALTERACAO' => [
                'type'       => 'VARCHAR',
                'constraint' => '40',
                'default' => NULL
            ],
            'DATAALTERACAO' => [
                'type'       => 'DATETIME',
                'default' => NULL
            ],
        ]);
        
        // chaves
        $this->forge->addPrimaryKey('ID');
        
        // criar tabela
        $atributos = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('configuracoes', false, $atributos);        
    }

    public function down()
    {
        // excluir tabela
        $this->forge->dropTable('configuracoes', true);
    }
}
