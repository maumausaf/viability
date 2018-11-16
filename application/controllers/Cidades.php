<?php

class Cidades extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        $this->load->model('cidades_model');//metodo construtor carrega o banco de dados
        $this->load->library('session');//Carrega a library 'session' para que seja possível fazer o uso das sessões na aplicação 
        $this->load->model('users_model');
        
    }
    
    public function index(){
        $this->load->view('template/header');
        $this->load->view('template/footer');
    }

    public function insere(){
        
        $grauUser = (string) 1; //definindo grau de usuario para este metodo
        $user = $this->session->userdata('user');
        
        if($user->user == $grauUser){
        $this->load->library('form_validation'); //importando biblioteca -- form_validation
        
        $this->form_validation->set_rules('name','Nome','required');
        $this->form_validation->set_rules('estado','Estado','required');
        
        if($this->form_validation->run() === false){
            $estados = $this->cidades_model->getEstados();
            $this->load->view('template/header');
            $this->load->view('cidades/register',['estados' =>  $estados]);       
            $this->load->view('template/footer');
        }else{
            $data['back'] = '/cidades/lista';
            $this->cidades_model->insere();
            $this->load->view('template/success',$data);
        }
        }else{
            $this->load->view('template/header');
            $this->load->view('session/erro',$user);
            $this->load->view('template/footer');
        }
    }
    
    public function lista() {
        $results = $this->cidades_model->getCidades();
        $this->load->view('template/header');
        $this->load->view('cidades/lista',['cidades'=> $results]);       
        $this->load->view('template/footer');
    }
}
