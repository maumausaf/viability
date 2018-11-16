<?php


class Dash_model extends CI_Model{
    
    private $table_name = 'pages';
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getQuant($inicial,$final,$status = null) {//pega aquantidade de viabilidades por status e data
       
        if($status){
        $array  =  array (  'status'  =>  $status,'created >='=>  $inicial,'created  <=' =>  $final  ); 
        
        }else{
            $array  =  array ( 'created >='=>  $inicial,'created  <=' =>  $final  ); 
        }
        $query = $this->db->get_where($this->table_name, $array);
        return $query->num_rows();
       
        
    }
    
    public function search() {//pesquisando na tabela dados com o metodo LIKE
        
        //$termo = $this->input->post('search');
        $data = '2018-01-01 00:00:00';
        $data2 = '2018-01-30 00:00:00';
        
        //$array  =  array (  'status'  =>  $status,'created'  =>  $data,'created'  =>  $data ); 
         
        $status = 1;
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('status' ,$status and 'created' , between($data) and 'created',$data2 );
        
        
        return $this->db->get('pages')->result();
    }
    
    public function getVenNvenRuc($inicial=null,$final=null,$date = null) {
        
        $vendida = $this->valores_sistema->vendida;
        $nao_vendida = $this->valores_sistema->nao_vendida;
        $recusada = $this->valores_sistema->recusada;
        
        $results = array();
        
        $results['vendida'] = $this->getQuant($inicial,$final,$vendida);
        $results['nao_vendida'] = $this->getQuant($inicial,$final,$nao_vendida);
        $results['recusada'] = $this->getQuant($inicial,$final,$recusada);
        $results['total'] = $this->getQuant($inicial,$final);
        
        return $results;
        
    }
    
    
    
}
