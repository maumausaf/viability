<?php

class Opcoes extends CI_Controller {
            
    function __construct() {
        parent::__construct();
        
        $this->load->model('users_model');
        $this->load->library('session');
        $this->load->helper('url');//metodo construtor carrega o banco de dados
        $this->load->model('cidades_model');
    }
    
    public function register()
    {   
        $grauUser = (string) 1; //definindo grau de usuario para este metodo
        $user = $this->session->userdata('user');
        
        if($user->user == $grauUser){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Nome', 'required');
            $this->form_validation->set_rules('user', 'user', 'required');
            $this->form_validation->set_rules('cidade', 'cidade', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('emailconf', 'Confirmação de email','required|matches[email]');//validando confirmação de senha
            $this->form_validation->set_rules('password', 'Senha', 'required|min_length[8]');
            $this->form_validation->set_rules('passwordconf', 'Confirmação de Senha','required|matches[password]');//validando confirmação de senha

            $email = $this->users_model->getByEmail();
            
            if ($this->form_validation->run() === FALSE || $email != null) {
                
                $cidades = $this->cidades_model->getCidades();
                $this->load->view('template/header');
                $this->jaexiste($email,$cidades);
                //$this->load->view('opcoes/register',['cidades'=>$cidades]);
                $this->load->view('template/footer');
            } else {

                $data['back'] = '/pages';
                $this->users_model->insere();
                $this->load->view('template/success', $data);
            }
        }else{
            $this->load->view('template/header');
            $this->load->view('session/erro',$user);
            $this->load->view('template/footer');
        }
        
    }
    
   public function listaUser() {
        
        $results = $this->users_model->get();
        $this->load->view('template/header');
        $this->load->view('opcoes/lista_user',['users'=> $results]);       
        $this->load->view('template/footer');
    }
    
    public function editUser($id = null) {
        $grauUser = (string) 1; //definindo grau de usuario para este metodo
        $user = $this->session->userdata('user');
        
        if($user->user == $grauUser){
        $this->load->library('form_validation'); //importando biblioteca -- form_validation
        
        $this->form_validation->set_rules('name', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('user', 'User', 'required');
        $this->form_validation->set_rules('password', 'Senha', 'required|min_length[8]');
        $this->form_validation->set_rules('passwordconf', 'Confirmação de Senha','required|matches[password]');//validando confirmação de senha
        
        if($this->form_validation->run() === false){
            $page = $this->users_model->get($id);
            $this->load->view('template/header');
            $this->load->view('opcoes/edit_user',['user'=> $page]);       
            $this->load->view('template/footer');
        }else{
            $data['back'] = '/opcoes/listaUser';
            $this->users_model->update($id);
            $this->load->view('template/success',$data);
        }
        }else{
            $this->load->view('template/header');
            $this->load->view('session/erro',$user);
            $this->load->view('template/footer');
        }
    }
    
    public function jaexiste($email,$cidades){
        
        if($email != NULL){
            $this->load->view('opcoes/registerEmailErro',['cidades'=>$cidades]);
        }else{
            $this->load->view('opcoes/register',['cidades'=>$cidades]);
        }
    }
    
}
