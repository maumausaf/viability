<?php

class Users_model extends CI_Model
{
    protected $table_name = 'users';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function get($id = null) {//pegando dados da tabela de comforme o id
        
        if($id === null){
            $query = $this->db->get($this->table_name);
            return $query->result();
        }
        $query = $this->db->get_where($this->table_name, ['id'=>$id]);
        return $query->first_row();
    }

    public function getByEmail()
    {
        $email = $this->input->post('email');
        $query = $this->db->get_where($this->table_name, array('email' => $email));
        
        if($query->num_rows() > 0){
           return $query->first_row();
        }else{
            return NULL;
        }
    }

    public function getByEmailAndPassword()    
    {
        $user = $this->getByEmail();

        if(!$user){
            return false;
        }
        
        $password = $this->input->post('password');
        $hash = $user->password;

        if (!password_verify($password, $hash)) {
            return false;
        }

        return $user;
    }

    public function insere()
    {
        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'user' => $this->input->post('user'),
            'cidade' => $this->input->post('cidade'),
            'stretch' => str_shuffle(substr($this->input->post('password'), 3))
        ];

        return $this->db->insert($this->table_name, $data);
    }
    
    public function update($id) {
        
        $data =[
         
          'user' => $this->input->post('user')
        ];
        
        $this->db->where('id', $id);
        
        return $this->db->update($this->table_name, $data);
    }
    
    public function updateByUser($id) {
        
        $data =[
          'name' => $this->input->post('name'),
          'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
          'email' => $this->input->post('email'),
          'stretch' => str_shuffle(substr($this->input->post('password'), 3))
        ];
        
        $this->db->where('id', $id);
        
        return $this->db->update($this->table_name, $data);
    }
    
    public function getStretch($stretch) {
        
         if($stretch === null){
            $query = $this->db->get($this->table_name);
            return $query->result();
        }
        $query = $this->db->get_where($this->table_name, ['stretch'=>$stretch]);
        return $query->first_row();
        
    }
    
}