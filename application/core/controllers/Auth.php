<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->library('session');
        $this->load->helper('url');
    }
    
    /*public function register()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Senha', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header');
            $this->load->view('auth/register');
            $this->load->view('template/footer');
        } else {
            $data['back'] = '/pages';
            $this->users_model->insere();
            $this->load->view('template/success', $data);
        }
    }*/

    public function login()
    {
        //$user = $this->session->userdata('user');
        $teste = 'email';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Senha', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('auth/header');
            $this->load->view('auth/login');
            $this->load->view('template/footer');
        } else {
            $user = $this->users_model->getByEmailAndPassword();
            if ($user) {
                $this->session->set_userdata(['user'=>$user]);
                redirect('pages', 'location', 302);
                die();
            }
            echo 'Usuário ou senha não encontrado';
        }
    }

    public function insere(){
        
        $this->load->library('form_validation'); //importando biblioteca -- form_validation
        
        $this->form_validation->set_rules('title','Título','required');
        $this->form_validation->set_rules('body','Conteúdo','required');
        $this->form_validation->set_rules('telefone','Telefone','required');
        $this->form_validation->set_rules('email','Email','required');
        
        
        if($this->form_validation->run() === false){
            $cidades = $this->cidades_model->getCidades();
            $this->load->view('auth/header');
            $this->load->view('auth/insere',['cidades'=>$cidades]);       
            $this->load->view('template/footer');
        }else{
            
            $this->pages_model->insere();
            $this->load->view('auth/success');
            
        }
    }
    
    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect('auth/login', 'location', 302);
        die();
    }
    
    
    
}