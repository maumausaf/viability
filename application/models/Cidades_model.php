<?php

class Cidades_model extends CI_Model {
    
    private $table_name = 'cidade';
    private $table_estados = 'estados';
            
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function insere(){
        
        $this->load->helper('url');
        $slug = url_title($this->input->post('name'), 'dash',true);//pegando dados do formulario
        
        $data =[
            'nome' => $this->input->post('name'),
            'estado' => $this->input->post('estado'), 
            'slug' => $slug
        ];
        
        return $this->db->insert($this->table_name,$data); //inserindo dados na tabela do banco
    }
    
    public function update(){
        
    }
    
    public function view(){
        
    }
    
    public function delete(){
        
    }
    
    public function getCidades($id = null) {
        if($id === null){
            $query = $this->db->get($this->table_name);
        }else{
            $query = $this->db->get_where($this->table_name,['id'=>$id]);
        }
        
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return null;
        }
    }
    
    public function getEstados($id = null){
        
        if($id === null){
        $query = $this->db->get($this->table_estados);
        }else{
            $query = $this->db->get_where($this->table_estados,['id'=>$id]);
        }
        
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return null;
        }
    }
    
    public function getEstadosById($id = null){
        
        $query = $this->db->get_where($this->table_estados,['codigo'=>$id]);
        $nameCity = $query->first_row();
        
        
        if($query->num_rows() > 0){
            return $nameCity->sigla;
        }else{
            return null;
        }
    }
    
    public function getNameCidades($id = null) {
        
        $query = $this->db->get_where($this->table_name,['id'=>$id]);
        $nameCity = $query->first_row();
        
        
        if($query->num_rows() > 0){
            return $nameCity->nome;
        }else{
            return null;
        }
    }
    
    
    
    
    
}