<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfiguracoesModel extends Model
{
    protected $table = 'configuracoes';
    protected $primaryKey = 'ID';

    protected $useAutoIncrement = TRUE;

    protected $returnType = 'object';

    protected $allowedFields = [
        'TIPO_JANELA_IMPRESSAO',
        'IDIOMA',
    ];

    protected $useTimestamps = FALSE;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

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
}