<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'ID';

    protected $useAutoIncrement = TRUE;

    protected $returnType = 'object';

    protected $allowedFields = [
        'LOGIN',
        'EMAIL',
        'NIVEL',
        'SENHA',
        'NOME',
        'TELEFONE',
            'FOTO',
            'IDIOMA',
            'EXCLUIDO',
            'USUCADASTRO',
            'USUALTERACAO',
            'USUEXCLUSAO',
                'DATACADASTRO',
                'DATAALTERACAO',
                'DATAEXCLUSAO'
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
        $rqLogin = $this->asArray()->where('LOGIN', $usuario)->where('EXCLUIDO', 0)->first();

        if(is_null($rqLogin))
        {
            // se não encontrou no LOGIN...

            // procura o usuário por EMAIL
            $rqEmail = $this->asArray()->where('EMAIL', $usuario)->where('EXCLUIDO', 0)->first();
            
            // resolve devolvendo o usuário ou um array vazio
            return !is_null($rqEmail) ? $rqEmail : [];

        }
        else
        {
            // se encontrou no LOGIN
            return $rqLogin;            
        }
    }

    // procurar um usuário (por LOGIN ou por EMAIL)
    public function todos()
    {
        $db = db_connect();
        $builder = $db->table('view_usuarios');
        $query   = $builder->get();

        return $query->getResult();
    }    
}