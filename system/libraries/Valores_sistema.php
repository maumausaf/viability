<?php

class CI_Valores_sistema {
    
    //usuarios do sistema
    public $adm = 1;
    public $vendedor = 2; 
    public $consutorViabilidade = 3;
    
    //status da viabilidade
    public $pendente = 0;
    public $aprovada = 1; 
    public $recusada = 2;
    public $vendida = 3;
    public $nao_vendida = 4;
    

    //metodos
    public function vendedor() {
        
        return $this->vendedor;
        
    }
    
}
