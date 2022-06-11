<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Regras extends Seeder
{
    public function run()
    {
        // dados padrão
        $data = [[
                    'ID' => '1',
                    'REGRA' => 'DESENVOLVEDOR',
                    'NOME' => 'Desenvolvedor',
                    'DESCRICAO' => 'Acesso de desenvolvimento',
                    'COR' => 'success',
                    'PERMISSAO' => 'DESENVOLVEDOR',
                    'PADRAO' => 'N'
                ],
                [
                    'ID' => '2',
                    'REGRA' => 'ADMINISTRADOR',
                    'NOME' => 'Administrador',
                    'DESCRICAO' => 'Nível gerencial',
                    'COR' => 'primary',
                    'PERMISSAO' => 'ADMINISTRADOR',
                    'PADRAO' => 'N'
                ],
                [
                    'ID' => '3',
                    'REGRA' => 'EQUIPE',
                    'NOME' => 'Equipe',
                    'DESCRICAO' => 'Nível operacional',
                    'COR' => 'orange',
                    'PERMISSAO' => 'ADMINISTRADOR',
                    'PADRAO' => 'S'
                ],
                [
                    'ID' => '4',
                    'REGRA' => 'INATIVO',
                    'NOME' => 'Inativo',
                    'DESCRICAO' => 'Usuário Inativo',
                    'COR' => 'danger',
                    'PERMISSAO' => 'ADMINISTRADOR',
                    'PADRAO' => 'N'
                ],
                [
                    'ID' => '5',
                    'REGRA' => 'CANCELADO',
                    'NOME' => 'Cancelado',
                    'DESCRICAO' => 'Usuário Cancelado',
                    'COR' => 'danger',
                    'PERMISSAO' => 'ADMINISTRADOR',
                    'PADRAO' => 'N'
                ]];

        // inserindo dados
        $this->db->table('regras')->insertBatch($data);
    }
}
