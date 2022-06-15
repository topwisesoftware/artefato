<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'usuarios';
    protected $primaryKey       = 'ID';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields = [
        'LOGIN',
        'EMAIL',
        'NIVEL',
        'SENHA',
        'NOME',
        'TELEFONE',
        'CARGO',
        'FOTO',
        'IDIOMA',
        'MODO'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'DATACADASTRO';
    protected $updatedField  = 'DATAALTERACAO';
    protected $deletedField  = 'DATAEXCLUSAO';

    // Validation
    protected $validationRules      = [
        'LOGIN' => 'required|min_length[3]|is_unique[usuarios.LOGIN]',
        'EMAIL' => 'required|valid_email',
        'NOME' => 'required',
    ];
    protected $validationMessages   = [
        'LOGIN' => [
            'required' => 'Um nome de LOGIN é necessário',
            'min_length[3]' => 'O LOGIN deve ter mais de 3 caracteres',
            'is_unique' => 'Outro usuário já utiliza este LOGIN'
        ],
        'EMAIL' => [
            'required' => 'Um EMAIL é necessário',
            'valid_email' => 'O EMAIL não é válido'
        ],
        'NOME' => [
            'required' => 'Um NOME é necessário',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // procurar um usuário (por LOGIN ou por EMAIL)
    public function localizarUsuario(string $usuario): array
    {

        // procura o usuário por LOGIN
        $rqLogin = $this->asArray()->where('LOGIN', $usuario)->first();

        if(is_null($rqLogin))
        {
            // se não encontrou no LOGIN...

            // procura o usuário por EMAIL
            $rqEmail = $this->asArray()->where('EMAIL', $usuario)->first();
            
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
