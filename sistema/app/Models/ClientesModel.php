<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientesModel extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'ID';

    protected $useAutoIncrement = TRUE;

    protected $returnType = 'object';

    protected $allowedFields = [
        'NOME',
        'EMAIL',
        'TELEFONE',
        'FOTO'
    ];

    protected $useSoftDeletes = TRUE;    
    protected $useTimestamps = TRUE;
    protected $createdField  = 'DATACADASTRO';
    protected $updatedField  = 'DATAALTERACAO';
    protected $deletedField  = 'DATAEXCLUSAO';    

    protected $validationRules    = [
        'NOME' => 'required',
        'EMAIL' => 'required|valid_email'
    ];
    protected $validationMessages = [
        'NOME' => [
            'required' => 'Um NOME é necessário',
        ],
        'EMAIL' => [
            'required' => 'Um EMAIL é necessário',
            'valid_email' => 'O EMAIL não é válido'
        ],
    ];
    protected $skipValidation = false;
}