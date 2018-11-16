<?php

class Email extends CI_Model{
    
    function __construct() {
        parent::__construct();
        
        $this->load->model('pages_model');//metodo construtor carrega o banco de dados
        $this->load->library('session');//Carrega a library 'session' para que seja possível fazer o uso das sessões na aplicação 
        $this->load->model('users_model');
        
    }
    
    function getUserFunção($cidade,$funcao) {
        
        if($funcao == 2){
            return $this->user_model->getByFuncao($funcao,$cidade);
        }elseif($funcao == 1){
            return $this->user_model->getByFuncao($funcao,$cidade);
        }
    }
}
