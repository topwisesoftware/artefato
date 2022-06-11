<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DEV extends Seeder
{
    public function run()
    {
        $this->call('Clientes');
        $this->call('Configuracoes');
        $this->call('Regras');
        $this->call('Usuarios');
    }
}
