<?php

namespace App\Models;

use CodeIgniter\Model;

class RegrasModel extends Model
{
    protected $table = 'regras';
    protected $primaryKey = 'ID';

    protected $useAutoIncrement = TRUE;

    protected $returnType = 'object';

    protected $allowedFields = [
        'REGRA',
        'NOME',
        'DESCRICAO',
        'COR',
        'PERMISSAO',
        'PADRAO'
    ];

    protected $useTimestamps = TRUE;
    protected $createdField  = 'DATACADASTRO';
    protected $updatedField  = 'DATAALTERACAO';
    protected $deletedField  = 'DATAEXCLUSAO';    

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    // procurar um usuário (por LOGIN ou por EMAIL)
    public function localizarUsuario(string $usuario): array
    {

        // procura o usuário por LOGIN
        $rqLogin = $this->where('LOGIN', $usuario)->where('EXCLUIDO', 0)->first();

        if(is_null($rqLogin))
        {
            // se não encontrou no LOGIN...

            // procura o usuário por EMAIL
            $rqEmail = $this->where('EMAIL', $usuario)->where('EXCLUIDO', 0)->first();
            
            // resolve devolvendo o usuário ou um array vazio
            return !is_null($rqEmail) ? $rqEmail : [];

        }
        else
        {
            // se encontrou no LOGIN
            return $rqLogin;            
        }
    }
}