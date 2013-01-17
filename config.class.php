<?php 

class Config {
	private $redesSociais = array();
	private $templateName = 'template padrão';
	
	function __construct(){
		$tw = new Twitter();
		$fb = new Facebook();
		array_push($this->redesSociais, $tw);
		array_push($this->redesSociais, $fb);
	}

	public function getRedesSociaisAtivas(){
		return $this->redesSociais;
	}

	public function getTemplateName(){
		return $this->templateName;
	}
}

?>