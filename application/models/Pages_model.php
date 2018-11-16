<?php
class Pages_model extends CI_Model {
    
    private $table_name = 'pages';
            
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('cidades_model');
    }

    //listando todas as viabilidades
    
    public function get($id = null) {//pegando dados da tabela de comforme o id
        
        if($id === null){
            $query = $this->db->get($this->table_name);
            return $query->result();
        }
        $query = $this->db->get_where($this->table_name, ['id'=>$id]);
        return $query->first_row();
    }
    
    //listando viabilidades de acordo com o status
    
    public function getPorStatus($status,$sort = 'updated', $order = 'asc') {//pegando dados da tabela de comforme o status
        
        $this->db->order_by($sort,$order);//ordena de acordo com os parametros passdos
        $query = $this->db->get_where($this->table_name, ['status'=>$status]);
        return $query->result();
    }
    
    public function getAll($sort = 'updated', $order = 'asc', $limit = null, $offset = null) {//
        
        $this->db->order_by($sort,$order);//ordena de acordo com os parametros passdos
        
        if($limit){
            $this->db->limit($limit,$offset);
        }

        $query = $this->db->get($this->table_name);
        
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return null;
        }
    }
    
    public function getAll1($sort = 'id', $order = 'asc', $limit = null, $offset = null) {//
        $status = 1;
        $this->db->order_by($sort,$order);//ordena de acordo com os parametros passdos
        
        if($limit){
            $this->db->limit($limit,$offset);
        }
        $query = $this->db->get_where($this->table_name, ['status'=>$status]);
        //$query = $this->db->get($this->table_name);
        
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return null;
        }
    }
    
    public function getAll2($sort = 'id', $order = 'asc', $limit = null, $offset = null) {//
        $status = 2;
        $this->db->order_by($sort,$order);//ordena de acordo com os parametros passdos
        
        if($limit){
            $this->db->limit($limit,$offset);
        }
        $query = $this->db->get_where($this->table_name, ['status'=>$status]);
        //$query = $this->db->get($this->table_name);
        
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return null;
        }
    }
    
     public function getContacdas($sort = 'id', $order = 'asc', $limit = null, $offset = null) {//
      
        $this->db->order_by($sort,$order);//ordena de acordo com os parametros passdos
        
        if($limit){
            $this->db->limit($limit,$offset);
        }
        
        $query3 = $this->db->get_where($this->table_name, ['status'=>$this->valores_sistema->vendida]);
        //$query4 = $this->db->get_where($this->table_name, ['status'=>$this->valores_sistema->nao_vendida]);
        
        
        if($query3->num_rows() > 0){
            return $query3->result();
        }else{
            return null;
        }
    }
    
    public function getContacdas1($sort = 'id', $order = 'asc', $limit = null, $offset = null) {//
      
        $this->db->order_by($sort,$order);//ordena de acordo com os parametros passdos
        
        if($limit){
            $this->db->limit($limit,$offset);
        }
        
        $query3 = $this->db->get_where($this->table_name, ['status'=>$this->valores_sistema->nao_vendida]);
        //$query4 = $this->db->get_where($this->table_name, ['status'=>$this->valores_sistema->nao_vendida]);
        
        
        if($query3->num_rows() > 0){
            return $query3->result();
        }else{
            return null;
        }
    }
    /*
    public function getAprovadas($id = null) {//pegando dados da tabela de comforme o id
        
        if($id === null){
            $query = $this->db->get($this->table_name);
            return $query->result();
        }
        $query = $this->db->get_where($this->table_name, ['id'=>$id]);
        return $query->first_row();
    }
    
    public function getRecusadas($id = null) {//pegando dados da tabela de comforme o id
        
        if($id === null){
            $query = $this->db->get($this->table_name);
            return $query->result();
        }
        $query = $this->db->get_where($this->table_name, ['id'=>$id]);
        return $query->first_row();
    }*/
    
    //cadastrando viabilidade
    
    public function insere($user = null){
        
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash',true);//pegando dados do formulario
        $status = 0;
        $obs = '';
        $cidade = $this->input->post('cidade');

        $cidadeName = $this->cidades_model->getNameCidades($cidade);
        
        if($user){
            $vendedorName = $user->name;
        }else{ $vendedorName = "Site do provedor";
        }
        
        $data =[
            'title' => $this->input->post('title'),
            'body' => $this->input->post('body'),
            'cidade'=> $cidadeName,
            'slug' => $slug,
            'telefone'=> $this->input->post('telefone'),
            'email'=> $this->input->post('email'),
            'informacoes'=> $this->input->post('informacoes'),
            'vendedor' => $vendedorName,
            'status'=> $status,
            'obs'=> $obs
          
        ];
        
        return $this->db->insert($this->table_name,$data); //inserindo dados na tabela do banco
    }
    
    //editando viabilidade
    
    public function update($id) {
        
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash',true);//pegando dados do formulario
        
        $data =[
            'title' => $this->input->post('title'),
            'body' => $this->input->post('body'),
            'cidade'=> $this->input->post('cidade'),
            'telefone'=> $this->input->post('telefone'),
            'email'=> $this->input->post('email'),
            'informacoes'=> $this->input->post('informacoes'),
          'slug' => $slug
        ];
        
        $this->db->where('id', $id);
        
        return $this->db->update($this->table_name, $data);
    }
    
    public function delete($id) {
        
        return $this->db->delete($this->table_name, ['id'=>$id]);
    }
    
    //respondendo viabilidade
    
    public function answer($id) {
        
       $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash',true);//pegando dados do formulario
        
        $data =[
            'body' => $this->input->post('body'),
            'obs' => $this->input->post('obs'),
            'status' => $this->input->post('status'),
            'slug' => $slug
        ];
        
        $this->db->where('id', $id);
        
        return $this->db->update($this->table_name, $data);
    }
    
    public function retorno($id) {
        
        $this->load->helper('url');
        $obs = $this->input->post('obs');//pegando dados do formulario
        
        $data =[
            'obs' => "$obs--".$this->input->post('retorno'),
            'status' => $this->input->post('status')
           
        ];
        
        $this->db->where('id', $id);
        
        return $this->db->update($this->table_name, $data);
    }
    
    //pesquisando viabilidade
    
    public function search() {//pesquisando na tabela dados com o metodo LIKE
        
        $termo = $this->input->post('search');
        $this->db->select('*');
        $this->db->like('title',$termo);
        return $this->db->get('pages')->result();
    }
    
    //conta numero de registros da cada status
    
    function countAll($status = null) {
        
        if($status == 0){
            $query = $this->db->get_where($this->table_name, ['status'=>$status]);
            return $query->num_rows();
        }elseif($status == 1){
            $query = $this->db->get_where($this->table_name, ['status'=>$status]);
            return $query->num_rows();
          
        }elseif($status == 2){
            $query = $this->db->get_where($this->table_name, ['status'=>$status]);
            return $query->num_rows();
        }elseif($status == 3){
            $query3 = $this->db->get_where($this->table_name, ['status'=>$this->valores_sistema->vendida]);
            return $query3->num_rows();
        }elseif($status == 4){
            $query4 = $this->db->get_where($this->table_name, ['status'=>$this->valores_sistema->nao_vendida]);
            return $query4->num_rows();
        }    
        
        return $this->db->count_all($this->table_name);
    }
    
    function contaViabilidade(){
        
        $this->load->library('valores_sistema');
        
        $quantidade = array();
        //quantidade de viabilidades aprovadas
        $query = $this->db->get_where($this->table_name, ['status'=>$this->valores_sistema->aprovada]);
        $quantidade[0] = $query->num_rows();
        //quantidade de viabilidades negada
        $query2 = $this->db->get_where($this->table_name, ['status'=>$this->valores_sistema->recusada]);
        $quantidade[1] = $query2->num_rows();
        //quantidade de viabilidade concluida em venda
        $query3 = $this->db->get_where($this->table_name, ['status'=>$this->valores_sistema->vendida]);
        $quantidade[3] = $query3->num_rows();
        //quantidade de viabilidade concluida em não venda
        $query4 = $this->db->get_where($this->table_name, ['status'=>$this->valores_sistema->nao_vendida]);
        $quantidade[4] = $query4->num_rows();
        
        return $quantidade;
    }
    
    function getByCidade($user,$status){ //pega as viabilidades por status e cidade
 
        $cidade = $this->cidades_model->getNameCidades($user->cidade);
        
        $array = array('status'=>$status ,'cidade'=>$cidade);
        
        //$query = $this->db->get_where($this->table_name, ['cidade'=>$cidade] );
        $query = $this->db->get_where($this->table_name, $array );

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return null;
        }
    }
    
}
