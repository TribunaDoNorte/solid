<?php 

include_once('config.class.php');
include_once('redesSociais.class.php');

class Template {
	private $templateName;

	function __construct(){
		$this->templateName = 'padrao';
	}

	public function applyTemplate(){
		echo "aplicando o template $this->templateName";
	}

	public function setTemplateName ( $templateName ) {
		$this->templateName = $templateName;
	}
}


interface iRender{
	public function renderizar($conteudo);
}

class Render implements iRender{
	private $deviceType = array("0" => 'Desktop', "1" => 'Tablet', "2" => 'Smartphone');
	
	public function renderizar($conteudo){		
		$conteudo->getTemplate()->applyTemplate();		
		$device = rand(0,2);
		echo "\n renderizando no " . $this->deviceType[$device];		
		echo "\n " . $conteudo->getConteudo();
	}
}


interface iConteudo {
	public function getTitulo();	
}

abstract class Conteudo implements iConteudo {
	private $titulo;
	private $id;

	protected $template;
	protected $socializador;
	protected $config;
	protected $renderizador;

	function __construct(){
		$this->template = new Template();
		$this->socializador = new Socializador('');
		$this->config = new Config();
		$this->renderizador = new Render();
		$this->template->setTemplateName = $this->config->getTemplateName();
	}
	
	abstract protected function gerarPermalink();
	
	public function getTitulo(){
		$this->titulo = "titulo";
		return $this->titulo;
	}

	public function getTemplate(){
		return $this->template;
	}

	public function render(){
		$this->renderizador->renderizar($this);
		//$this->getConteudo();
		echo "\n";
		$this->socializador->socializar($this->config->getRedesSociaisAtivas(), $this->getConteudo());
	}

}


class Noticia extends Conteudo {

	function __construct(){
		parent::__construct();
	}

	public function gerarPermalink(){
		return 'permalink://noticia/';
	}

	public function getConteudo(){
		return 'noticia';
	}

}

class Video extends Conteudo {
	private $embed;

	public function gerarPermalink(){
		return 'permalink';
	}

	public function getConteudo(){
		return 'video';
	}

}

?>