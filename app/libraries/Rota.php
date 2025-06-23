<?php
class Rota{
    private $controlador = 'Paginas';
    public function __construct(){
        //echo 'criando a primeira classe';
        //var_dump($this->url());

        $url = $this->url();

        if(file_exists('../app/constrollers/'.ucwords($url[0]).'.php')){
            $this->controlador = ucwords($url[0]);
            unset($url[0]);
        }
        require_once '../app/constrollers/'.$this->controlador.'.php';
        $this->controlador = new $this->controlador;

        var_dump($this);
    }//fim da criação da função

    private function url(){
        //echo 'carregando a url';
        //echo $_GET['url'];

        //o filtro FILTER_SANITIZE_URL remove todos os caracteres ilegais de uma URL
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
        //verifica se a url existe

        if(isset($url)){
            //trim = Retira espaço no inicio e final de uma string
            //rtrim - retira espaço em branco (ou outros caracteres) ou final da string
            $url = trim(rtrim($url,'/'));




            //explode - Divide uma string em strings, retorna um array
            $url = explode('/', $url);
            return $url; //retorna a url
        }
    }//fim da função url
}
?>

c'mere
c'mon