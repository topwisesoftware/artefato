<?php

namespace App\Models;

use CodeIgniter\Model;

class Configuracoes extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'configuracoes';
    protected $primaryKey       = 'ID';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'TIPO_JANELA_IMPRESSAO',
        'IDIOMA',
        'MODO',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
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

    public function localizarTudo()
    {
        $rqLogin = $this->where('ID', 1)->first();
        return $rqLogin;            
    }

    public function tipo_janela_impressao()
    {
        $rqLogin = $this->where('ID', 1)->first();
        return $rqLogin->TIPO_JANELA_IMPRESSAO;            
    }

    public function idioma_padrao()
    {
        $rqLogin = $this->where('ID', 1)->first();
        return $rqLogin->IDIOMA;            
    }

    public function modo()
    {
        $rqLogin = $this->where('ID', 1)->first();
        return $rqLogin->MODO;            
    }    
}
