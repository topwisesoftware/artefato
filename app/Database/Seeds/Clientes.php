<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Clientes extends Seeder
{
    public function run()
    {
        // dados padrão
        $data = [[
                    'ID' => '1',
                    'NOME' => 'Cliente Um',
                    'EMAIL' => 'email@um.com.br',
                    'TELEFONE' => '73 123 456 789',
                ],
                [
                    'ID' => '2',
                    'NOME' => 'Cliente Dois',
                    'EMAIL' => 'email@dois.com.br',
                    'TELEFONE' => '73 321 654 987',
                ]];

        // inserindo dados
        $this->db->table('clientes')->insertBatch($data);
    }
}
