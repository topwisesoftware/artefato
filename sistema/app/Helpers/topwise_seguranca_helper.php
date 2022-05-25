<?php
    function TOPWISE_seguranca_UsuarioLogado() {

        $dadosUsuarioLogado = (object)array();

        $dadosUsuarioLogado->ID = session()->get('ID');
        $dadosUsuarioLogado->LOGIN = session()->get('LOGIN');
        $dadosUsuarioLogado->EMAIL = session()->get('EMAIL');
        $dadosUsuarioLogado->NIVEL = session()->get('NIVEL');
        $dadosUsuarioLogado->NOME = session()->get('NOME');
        $dadosUsuarioLogado->TELEFONE = session()->get('TELEFONE');
        $dadosUsuarioLogado->FOTO = session()->get('FOTO');
        $dadosUsuarioLogado->IDIOMA = session()->get('IDIOMA');

        return $dadosUsuarioLogado;
    }


    function OK($dadosNivel, $permissao) {

        // verifica permissao de DESENVOLVEDOR
        if(($dadosNivel == 'DESENVOLVEDOR')) {

            // se tiver, DESENVOLVEDOR = acesso liberado a tudo
            $retorno = TRUE;

        } // verificar se o nível de acesso for CANCELADO
        else if(($dadosNivel == 'CANCELADO')) {
            
            // se for CANCELADO = não libera acesso a nada
            $retorno = FALSE;

        } else {
            
            // para os outros casos 
            // GESTOR, ADMINISTRADOR, EQUIPE e INATIVO
            if(($dadosNivel == 'INATIVO')) {

                // os de INATIVO só tem acesso ao INATIVO
                if(($permissao == 'INATIVO')) {
                    $retorno = TRUE;
                } else {
                    $retorno = FALSE;
                }

            }
            elseif(($dadosNivel == 'EQUIPE')) {

                // os de EQUIPE só tem acesso ao INATIVO + EQUIPE
                if(($permissao == 'INATIVO') OR ($permissao == 'EQUIPE')) {
                    $retorno = TRUE;
                } else {
                    $retorno = FALSE;
                }

            }
            elseif(($dadosNivel == 'ADMINISTRADOR')) {

                // os de ADMINISTRADOR tem acesso a tudo de INATIVO + EQUIPE + ADMINISTRADOR
                if(($permissao == 'INATIVO') OR ($permissao == 'EQUIPE') OR ($permissao == 'ADMINISTRADOR')) {
                    $retorno = TRUE;
                } else {
                    $retorno = FALSE;
                }

            }
            else{
                // para garantir, se for qualquer outra coisa, nega
                $retorno = FALSE;
            }
        }

        return $retorno;
    }

	// 32 caracteres
	function topwise_MD5($entrada)
    { 
		return strrev(MD5(TOPWISE__CHAVE_PRIVADA . $entrada . TopWise_App_Chave_Local()));
	}

	// 40 caracteres
	function topwise_SHA1($entrada)
    { 
		return strrev(sha1(TOPWISE__CHAVE_PRIVADA . $entrada . TopWise_App_Chave_Local()));
	}

    // 255 caracteres no máximo
    function topwise_gerar_senha(string $entrada): string
    {
        $cost = topwise_calcular_custo();
        $hash_preparada = topwise_preparar_senha($entrada);
        $hash = password_hash($senha_banco_final, PASSWORD_BCRYPT, ["cost" => $cost]);
        return $hash;
    }

    function topwise_verificar_senha(string $senha, $verificacao): bool
    {
        $cost = topwise_calcular_custo();
        $hash_senha = topwise_preparar_senha($senha);
        $resultado = password_verify($hash_senha, $verificacao);
        return $resultado;
    }



    
    // **********************************************************************************************************************//

    function topwise_preparar_senha(string $entrada): string
    {
        $hash_privada = strrev(MD5(TOPWISE__CHAVE_PRIVADA));
        $hash_local = strrev(MD5(TopWise_App_Chave_Local()));
        $hash_entrada = MD5($entrada);
        $hash_preparada = strrev($hash_privada . $hash_entrada . $hash_local);
        return $hash_preparada;
    }

    function topwise_calcular_custo(): int 
    {
        // calcular o custo
        $timeTarget = 0.05; // 50 milliseconds 
        $cost = 8;
        do {
            $cost++;
            $start = microtime(true);
            password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
            $end = microtime(true);
        } while (($end - $start) < $timeTarget);
        $cost++;
        return $cost;
    }    