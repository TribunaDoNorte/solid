<?php

interface iSocializador
{
	public function socialize($conteudo);
}

class Socializador implements iSocializador
{
	protected $redeName;
	public function quemSou(){
		return $this->redeName;
	}

	public function socialize($conteudo){
		//posta na rede social
		echo "socializando: $conteudo em " . $this->quemSou() . "\n";
	}

	public function socializar($redesSociais, $conteudo){
		echo "eh nos nas redes e os pray nas camas de mola\n";
		foreach ($redesSociais as $redeSocial){
			$redeSocial->socialize($conteudo);
		}
	}
}

class Twitter extends Socializador{
	function __construct(){
		$this->redeName = 'twitttttter';
	}
}

class Facebook extends Socializador{
	function __construct(){
		$this->redeName = 'facebook';
	}
}


?>
