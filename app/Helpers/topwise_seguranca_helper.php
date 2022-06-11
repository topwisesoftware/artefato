<?php
    function TOPWISE_seguranca_UsuarioLogado() {

        $dadosUsuarioLogado = (object)array();

        $dadosUsuarioLogado->ID = session()->get('ID');
        $dadosUsuarioLogado->LOGIN = session()->get('LOGIN');
        $dadosUsuarioLogado->EMAIL = session()->get('EMAIL');
        $dadosUsuarioLogado->NIVEL = session()->get('NIVEL');
        $dadosUsuarioLogado->NOME = session()->get('NOME');
        $dadosUsuarioLogado->TELEFONE = session()->get('TELEFONE');
        $dadosUsuarioLogado->CARGO = session()->get('CARGO');
        $dadosUsuarioLogado->FOTO = session()->get('FOTO');
        $dadosUsuarioLogado->IDIOMA = session()->get('IDIOMA');
        $dadosUsuarioLogado->MODO = session()->get('MODO');

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

    // analizar a senha informada e calcular se ela é válida
    // regras:
    //          + que 6 caracteres
    //          pelo menos um número           > 0123456789
    //          pelo menos uma letra minúscula > abcdefghijklmnopqrstuvwxyz
    //          pelo menos uma letra maiúscula > ABCDEFGHIJKLMNOPQRSTUVWXYZ
    //          pelo menos um símbolo          > !@#$%&*()-_=+{}|<,>.;:?§ªº°¹²³£¢¬
    function topwise_checar_senha(string $entrada): bool
    {
        return    preg_match('/[a-z]/', $entrada) // tem pelo menos uma letra minúscula
               && preg_match('/[A-Z]/', $entrada) // tem pelo menos uma letra maiúscula
               && preg_match('/[0-9]/', $entrada) // tem pelo menos um número
               && preg_match('/^[\w!@#$%&*()-_=+|<,>.;:?§ªº°¹²³£¢¬]{6,}$/', $entrada); // tem 6 ou mais caracteres
               // tudo junto '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[\w!@#$%&*()-_=+|<,>.;:?§ªº°¹²³£¢¬]{6,}$/'
    }

    

    // 255 caracteres no máximo
    function topwise_gerar_senha(string $entrada): string
    {
        return password_hash(topwise_preparar_senha($entrada), PASSWORD_BCRYPT, ["cost" => topwise_calcular_custo()]);
    }

    function topwise_verificar_senha(string $entrada, $criptografia): bool
    {
        return password_verify(topwise_preparar_senha($entrada), $criptografia);
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