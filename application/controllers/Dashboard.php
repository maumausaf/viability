<?php

class Dashboard extends CI_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
        $this->load->view('template/header');
        $this->load->view('dashboard/GraficoInLine');
        $this->load->view('template/footer');
        
    }
    
    public function viabRecus() {
        
        $aprovadas = array();
        
        foreach ($arr as &$value) {
            $value = $value * 2;
        }
        
    }
    
     public function ralatorioPorPeriodo() {
        
        $this->load->library('valores_sistema');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('inicio','Data inicial','required');
        $this->form_validation->set_rules('fim','Data final','required');
        
        $data = array();
        
        $data['inicio'] = $this->input->post('inicio');
        $data['fim'] = $this->input->post('fim');
        
        if($this->form_validation->run() === false){
            $date = date('Y-m'); //pegando data atual
            $data['inicio'] = $date.'-01';
            $data['fim'] = date('Y-m-t');
            $results = $this->dash_model->getVenNvenRuc($data['inicio'],$data['fim']);
            $this->load->view('template/header');
            $this->load->view('dashboard/calendario');
            $this->load->view('dashboard/nomeDaPagina',['data'=>$data]);     
            $this->load->view('dashboard/graficoPorPeriodo',['results'=> $results]);     
            $this->load->view('template/footer');
        }else{
        
            $results = $this->dash_model->getVenNvenRuc($data['inicio'],$data['fim']);
            $this->load->view('template/header');
            $this->load->view('dashboard/calendario');
            $this->load->view('dashboard/nomeDaPagina',['data'=>$data]);    
            $this->load->view('dashboard/graficoPorPeriodo',['results'=> $results]);   
            //$this->load->view('pages/pendente/index',['pages'=> $results['nao_vendida']]);      
            $this->load->view('template/footer');
        }
        
    }
    
    public function notification() {
        
        $date = date('Y-m');
        $datai = $date.'-01';
        $dataf = date('Y-m-t');
        
        $user = $this->session->userdata('user');//pegando valores dados do usuário
        
        if($user->user == $this->valores_sistema->vendedor){
            //pegando numero de viabilidades para serem contactadas
            $results = $this->dash_model->getQuant($datai,$dataf,$status = $this->valores_sistema->aprovada);
            
        }if($user->user == $this->valores_sistema->consutorViabilidade){
            //pegando numero de viabilidades para serem respondidas
            $results = $this->dash_model->getQuant($datai,$dataf,$status = $this->valores_sistema->aprovada);
            return $results;
        }
        
    }
    
}
