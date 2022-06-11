<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Configuracoes extends Seeder
{
    public function run()
    {
        // dados padrão
        $data = [
            'ID' => '1',
            'TIPO_JANELA_IMPRESSAO' => 'ABA',
            'IDIOMA' => 'portuguese-br',
            'MODO' => 'CLARO',
        ];

        // inserindo dados
        $this->db->table('configuracoes')->insert($data);
    }
}
