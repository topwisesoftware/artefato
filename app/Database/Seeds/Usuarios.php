<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Usuarios extends Seeder
{
    public function run()
    {
        // dados padrão
        $data = [
                'ID' => '1',
                'LOGIN' => 'TOPWISE',
                'EMAIL' => 'suporte@topwise.com.br',
                'NIVEL' => 'DESENVOLVEDOR',
                'SENHA' => '$2y$10$Lvwyk.wccaAsNX5SF8BzIOQwEtcMRByoSXcuBdZ.LRkVl3gcL/8y6',
                'NOME' => 'Suporte TopWise',
                'TELEFONE' => '73 999 977 472',
                'CARGO' => 'Analista de Sistemas',
                'FOTO' => '0',
                'IDIOMA' => 'portuguese-br',
                'MODO' => 'CLARO',
            ];

        // inserindo dados
        $this->db->table('usuarios')->insert($data);
    }
}
