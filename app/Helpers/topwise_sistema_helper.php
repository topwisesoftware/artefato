<?php

	function TopWise_App_Nome() {
		return 'Artefato';
	}

	function TopWise_App_Versao() {
		return '22.6 r4 build 19';
	}

	function TopWise_App_Data_Release() {
		return '20/06/2022 08:10'; // iniciado em 18/02/2022
	}

	function TopWise_App_Data_Inicio() {
		return '18/02/2022'; // iniciado em 18/02/2022
	}

	function TopWise_App_Chave_Local() {
		return 'TopWise!_PRIVATE*_KEY%_2022$_TOPWISE#Artefato!';
	}

	function TopWise_App_Sistema_Versao() {
		return TopWise_App_Nome() . ' ' . TopWise_App_Versao();
	}

	function TopWise_App_Cliente() {
		return 'TopWise';
	}

	function TopWise_App_Sistema_Descricao() {
		return 'Artefato.sobre.descricao';
	}

	function TopWise_App_Versao_API() {
		return '22.5 r1 - 18/02/2022 00:00';
	}

	function TopWise_App_Logo(): array
	{
		$data = array(
			'menu' => 'artefato.png',
			'login' => 'logo-artefato.png',
			'sobre' => 'artefato.png',
		);

		return $data;
	}