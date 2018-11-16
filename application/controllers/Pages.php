<?php

class Pages extends CI_Controller {
            
    function __construct() {
        parent::__construct();
        
        $this->load->model('pages_model');//metodo construtor carrega o banco de dados
        $this->load->library('session');//Carrega a library 'session' para que seja possível fazer o uso das sessões na aplicação 
        $this->load->model('users_model');
        $this->load->model('cidades_model');
        
    }

    //carrega a pagina incial do sistema
    public function indexx() {
        
        $results = $this->pages_model->get();
        $this->load->view('template/header');
        $this->load->view('pages/dashboard');
        $this->load->view('home');
        //$this->load->view('pages/index',['pages'=> $results]);       
        $this->load->view('template/footer');
    }
    // carrega a pagina de visualização da viabilidade
    public function view($id) {
        $page = $this->pages_model->get($id);
        
        $this->load->view('template/header');
        $this->load->view('pages/view',['page'=> $page]);       
        $this->load->view('template/footer');
        
    }
    //carrega a pagina de cadastro de viabilidade
    public function insere(){
        
        $this->load->library('form_validation'); //importando biblioteca -- form_validation
        
        $this->form_validation->set_rules('title','Título','required');
        $this->form_validation->set_rules('body','Conteúdo','required');
        $this->form_validation->set_rules('telefone','Telefone','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('informacoes','Informações adcionais','required');
        $this->form_validation->set_rules('cidade','Cidade','required');
        
        $user = $this->session->userdata('user');
        
        if($this->form_validation->run() === false){
            $cidades = $this->cidades_model->getCidades();
            $this->load->view('template/header');
            $this->load->view('pages/insere',['cidades'=>$cidades]);       
            $this->load->view('template/footer');
        }else{
            $data['back'] = '/pages/pendentes';
            $this->EnviarEmail();
            $this->pages_model->insere($user);
            $this->load->view('template/success',$data);
        }
    }
    //carrega a pagina de edição de viabilidade
    public function edit($id = null) {
        
        $page = $this->pages_model->get($id);
        
        if($page->status == 0 ){
            
        
        $this->load->library('form_validation'); //importando biblioteca -- form_validation
        
        $this->form_validation->set_rules('title','Título','required');
        $this->form_validation->set_rules('body','Conteúdo','required');
        $this->form_validation->set_rules('telefone','Telefone','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('cidade','Cidade','required');
        $this->form_validation->set_rules('informacoes','Informações adcionais','required');
        
        if($this->form_validation->run() === false){
            $cidades = $this->cidades_model->getCidades();
            $this->load->view('template/header');
            $this->load->view('pages/edit',['page'=> $page,'cidades'=>$cidades]);       
            $this->load->view('template/footer');
        }else{
            $data['back'] = '/pages/view/'. $id;
            $this->pages_model->update($id);
            $this->load->view('template/success',$data);
        }
        }else{
            $data['back'] = '/pages/view/'. $id;
            $this->load->view('template/header');
            $this->load->view('pages/erro',$data);       
            $this->load->view('template/footer');
        }
        
    }
    //deleta viabilidade passada como parametro
    public function delete($id) {
        
        $data['back'] = '/pages';
        $this->pages_model->update($id);
        $this->load->view('template/success',$data);
    }
    //carrega pagina de resposta de viabilidade 
    public function answer($id = null) {
        
        $page = $this->pages_model->get($id);
        $this->load->library('valores_sistema');//importando biblioteca de valores
        
        if($page->status == 0 ){
        
            $user = $this->session->userdata('user');
        
            if($user->user == $this->valores_sistema->consutorViabilidade || $user->user == $this->valores_sistema->adm){
                $this->load->library('form_validation'); //importando biblioteca -- form_validation
                $this->form_validation->set_rules('body','Conteúdo','required');//verificando se o formulario foi preenchido
                $this->form_validation->set_rules('obs','Observações','required');   
                $this->form_validation->set_rules('status','Condição','required');
        
                if($this->form_validation->run() === false){
                    $page = $this->pages_model->get($id);
                    $this->load->view('template/header');
                    $this->load->view('pages/answer',['page'=> $page]);       
                    $this->load->view('template/footer');
                }else{
                    $data['back'] = '/pages/pendentes/';
                    $this->pages_model->answer($id);
                    $this->load->view('template/success',$data);
                }
                
            }else{
                $this->load->view('template/header');
                $this->load->view('session/erro',$user);
                $this->load->view('template/footer');
            }
            
        }else{
            $data['back'] = '/pages/view/'. $id;
            $this->load->view('template/header');
            $this->load->view('pages/erro',$data);       
            $this->load->view('template/footer');
        }
        
    }
    
    public function retorno($id = null) {
        
        $page = $this->pages_model->get($id);
        $this->load->library('valores_sistema');//importando biblioteca de valores
        
        if($page->status == $this->valores_sistema->aprovada || $page->status == $this->valores_sistema->nao_vendida ){
            
                $this->load->library('form_validation'); //importando biblioteca -- form_validation
                $this->form_validation->set_rules('retorno','Resposta do Cliente','required');//verificando se o formulario foi preenchido
                $this->form_validation->set_rules('status','Conclusão do contato','required');//verificando se o formulario foi preenchido
        
                if($this->form_validation->run() === false){
          
                    $this->load->view('template/header');
                    $this->load->view('pages/retorno',['page'=> $page]);       
                    $this->load->view('template/footer');
                }else{
                    $data['back'] = '/pages/pagination1/';
                    $this->pages_model->retorno($id);
                    $this->load->view('template/success',$data);
                }
            
        }else{
            $data['back'] = '/pages/view/'. $id;
            $this->load->view('template/header');
            $this->load->view('pages/erro',$data);       
            $this->load->view('template/footer');
        }
        
    }
    
    //listando as viabilidades de acordo com o status
    
    public function pendentes() {
        $status = 0;
        
        $user = $this->session->userdata('user');
        
        if($user->user == 3 ){
            $results = $this->pages_model->getByCidade($user,$status);
            //$results = $this->pages_model->getPorStatus($status);
        }else{
            $results = $this->pages_model->getPorStatus($status);
        }
        
        //$reversed = array_reverse($results);//inverte o array pra imprimir da viabilidade mais recente para à mais antiga
        
        $this->load->view('template/header');
        $this->load->view('pages/pendente/nomeDaPagina');
        $this->load->view('pages/pendente/index',['pages'=> $results]);       
        $this->load->view('template/footer');
    }
    
    public function aprovadas() {
        $status = 1;
        
        /*$results = $this->pages_model->getPorStatus($status );
        $reversed = array_reverse($results);*/
        
        
        /*$this->load->view('template/header');
        $this->load->view('pages/aprovada/nomeDaPagina');
        $this->load->view('pages/listando_viabilidades_Ap_Ne',['pages'=> $reversed],['status'=>$status]);       
        $this->load->view('template/footer');*/
    }
    
    public function negadas() {
        $status = 2;
        
        $results = $this->pages_model->getPorStatus($status = 2);
        $reversed = array_reverse($results);
        
        $this->load->view('template/header');
        $this->load->view('pages/negada/nomeDaPagina');        
        $this->load->view('pages/listando_viabilidades_Ap_Ne',['pages'=> $reversed]);       
        $this->load->view('template/footer');
    }
    
    public function index() {
        
        $config = array(
			"base_url" => base_url('usuarios/p'),
			"per_page" => 8,
			"num_links" => 3,
			"uri_segment" => 3,
			"total_rows" => $this->pages_model->CountAll($status = 9),
			"full_tag_open" => "<ul class='pagination'>",
			"full_tag_close" => "</ul>",
			"first_link" => FALSE,
			"last_link" => FALSE,
			"first_tag_open" => "<li>",
			"first_tag_close" => "</li>",
			"prev_link" => "Anterior",
			"prev_tag_open" => "<li class='prev'>",
			"prev_tag_close" => "</li>",
			"next_link" => "Próxima",
			"next_tag_open" => "<li class='next'>",
			"next_tag_close" => "</li>",
			"last_tag_open" => "<li>",
			"last_tag_close" => "</li>",
			"cur_tag_open" => "<li class='active'><a href='#'>",
			"cur_tag_close" => "</a></li>",
			"num_tag_open" => "<li>",
			"num_tag_close" => "</li>"
		);
        //incializanfo função biblioteca pagination
        $this->pagination->initialize($config);
        
        //cria links para proxima pagina e pagina anterios
        $data['pagination'] = $this->pagination->create_links();
        //determina o maximo de pagina 
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //variavel data recebendo registro do banco
        $data['pages'] = $this->pages_model->getAll('updated','desc',$config['per_page'],$offset);
        //renderizando pagina
        $name = $this->session->userdata('user');
        //pegando notificações para o usúario

        
        $this->load->view('template/header');      
        $this->load->view('pages/dashboard',$name);
        $this->load->view('pages/index/tituloDaPagina');          
        $this->load->view('pages/index',$data);
        $this->load->view('template/footer');
    }
    
    public function pagination1() {
        
        $config = array(
			"base_url" => base_url('viabilidades/p1'),
			"per_page" => 8,
			"num_links" => 3,
			"uri_segment" => 3,
			"total_rows" => $this->pages_model->CountAll($status = 1),
			"full_tag_open" => "<ul class='pagination'>",
			"full_tag_close" => "</ul>",
			"first_link" => FALSE,
			"last_link" => FALSE,
			"first_tag_open" => "<li>",
			"first_tag_close" => "</li>",
			"prev_link" => "Anterior",
			"prev_tag_open" => "<li class='prev'>",
			"prev_tag_close" => "</li>",
			"next_link" => "Próxima",
			"next_tag_open" => "<li class='next'>",
			"next_tag_close" => "</li>",
			"last_tag_open" => "<li>",
			"last_tag_close" => "</li>",
			"cur_tag_open" => "<li class='active'><a href='#'>",
			"cur_tag_close" => "</a></li>",
			"num_tag_open" => "<li>",
			"num_tag_close" => "</li>"
		);
        //incializanfo função biblioteca pagination
        $this->pagination->initialize($config);
        
        //cria links para proxima pagina e pagina anterios
        $data['pagination'] = $this->pagination->create_links();
        //determina o maximo de pagina 
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //variavel data recebendo registro do banco
        $data['pages'] = $this->pages_model->getAll1('id','desc',$config['per_page'],$offset);
        //renderizando pagina
        $this->load->view('template/header');
        $this->load->view('pages/aprovada/nomeDaPagina');
        $this->load->view('pages/index',$data);
        $this->load->view('template/footer');
    }
    
    public function pagination2() {
        
        $config = array(
			"base_url" => base_url('viabilidades/p2'),
			"per_page" => 8,
			"num_links" => 3,
			"uri_segment" => 3,
			"total_rows" => $this->pages_model->CountAll($status = 2),
			"full_tag_open" => "<ul class='pagination'>",
			"full_tag_close" => "</ul>",
			"first_link" => FALSE,
			"last_link" => FALSE,
			"first_tag_open" => "<li>",
			"first_tag_close" => "</li>",
			"prev_link" => "Anterior",
			"prev_tag_open" => "<li class='prev'>",
			"prev_tag_close" => "</li>",
			"next_link" => "Próxima",
			"next_tag_open" => "<li class='next'>",
			"next_tag_close" => "</li>",
			"last_tag_open" => "<li>",
			"last_tag_close" => "</li>",
			"cur_tag_open" => "<li class='active'><a href='#'>",
			"cur_tag_close" => "</a></li>",
			"num_tag_open" => "<li>",
			"num_tag_close" => "</li>"
		);
        //incializanfo função biblioteca pagination
        $this->pagination->initialize($config);
        
        //cria links para proxima pagina e pagina anterios
        $data['pagination'] = $this->pagination->create_links();
        //determina o maximo de pagina 
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //variavel data recebendo registro do banco
        $data['pages'] = $this->pages_model->getAll2('id','desc',$config['per_page'],$offset);
        //renderizando pagina
        $this->load->view('template/header');
        $this->load->view('pages/negada/nomeDaPagina');
        $this->load->view('pages/index',$data);
        $this->load->view('template/footer');
    }
    
    public function paginationRetorno() {
        
        $this->load->library('valores_sistema');
        
        $config = array(
			"base_url" => base_url('viabilidades/p3'),
			"per_page" => 8,
			"num_links" => 3,
			"uri_segment" => 3,
			"total_rows" => $this->pages_model->CountAll($this->valores_sistema->vendida),
			"full_tag_open" => "<ul class='pagination'>",
			"full_tag_close" => "</ul>",
			"first_link" => FALSE,
			"last_link" => FALSE,
			"first_tag_open" => "<li>",
			"first_tag_close" => "</li>",
			"prev_link" => "Anterior",
			"prev_tag_open" => "<li class='prev'>",
			"prev_tag_close" => "</li>",
			"next_link" => "Próxima",
			"next_tag_open" => "<li class='next'>",
			"next_tag_close" => "</li>",
			"last_tag_open" => "<li>",
			"last_tag_close" => "</li>",
			"cur_tag_open" => "<li class='active'><a href='#'>",
			"cur_tag_close" => "</a></li>",
			"num_tag_open" => "<li>",
			"num_tag_close" => "</li>"
		);
        //incializanfo função biblioteca pagination
        $this->pagination->initialize($config);
        
        //cria links para proxima pagina e pagina anterios
        $data['pagination'] = $this->pagination->create_links();
        //determina o maximo de pagina 
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //variavel data recebendo registro do banco
        $data['pages'] = $this->pages_model->getContacdas('id','desc',$config['per_page'],$offset);
        //renderizando pagina
        $this->load->view('template/header');
        $this->load->view('pages/vendidas/nomeDaPagina');
        $this->load->view('pages/index',$data);
        $this->load->view('template/footer');
        
    }
    
    public function paginationRetorno1() {
        
        $this->load->library('valores_sistema');
        
        $config = array(
			"base_url" => base_url('viabilidades/p3'),
			"per_page" => 8,
			"num_links" => 3,
			"uri_segment" => 3,
			"total_rows" => $this->pages_model->CountAll($this->valores_sistema->nao_vendida),
			"full_tag_open" => "<ul class='pagination'>",
			"full_tag_close" => "</ul>",
			"first_link" => FALSE,
			"last_link" => FALSE,
			"first_tag_open" => "<li>",
			"first_tag_close" => "</li>",
			"prev_link" => "Anterior",
			"prev_tag_open" => "<li class='prev'>",
			"prev_tag_close" => "</li>",
			"next_link" => "Próxima",
			"next_tag_open" => "<li class='next'>",
			"next_tag_close" => "</li>",
			"last_tag_open" => "<li>",
			"last_tag_close" => "</li>",
			"cur_tag_open" => "<li class='active'><a href='#'>",
			"cur_tag_close" => "</a></li>",
			"num_tag_open" => "<li>",
			"num_tag_close" => "</li>"
		);
        //incializanfo função biblioteca pagination
        $this->pagination->initialize($config);
        
        //cria links para proxima pagina e pagina anterios
        $data['pagination'] = $this->pagination->create_links();
        //determina o maximo de pagina 
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //variavel data recebendo registro do banco
        $data['pages'] = $this->pages_model->getContacdas1('id','desc',$config['per_page'],$offset);
        //renderizando pagina
        $this->load->view('template/header');
        $this->load->view('pages/vendidas/nomeDaPagina');
        $this->load->view('pages/index',$data);
        $this->load->view('template/footer');
        
    }
    
    //pesquisando viabilidade
    
    public function search() { //Pesquisando dados na tebela apartir de um termo 
        
        $results = $this->pages_model->search();
        $termo = $this->input->post('search');
        $this->load->view('template/header');
        $this->load->view('pages/search',['termo'=>$termo]);
        $this->load->view('pages/listando_viabilidades_Ap_Ne',['pages'=> $results]);       
        $this->load->view('template/footer');
    }
    
    public function email(){
        $this->load->view('template/header');
        $this->load->view('email/home');
        $this->load->view('template/footer');
    }

    public function EnviarEmail($operacao = null){
        // Carrega a library email
        $this->load->library('email');
        //Recupera os dados do formulário
        $dados = $this->input->post();
         
        //Inicia o processo de configuração para o envio do email
        $config['protocol'] = 'mail'; // define o protocolo utilizado
        $config['wordwrap'] = TRUE; // define se haverá quebra de palavra no texto
        $config['validate'] = TRUE; // define se haverá validação dos endereços de email
         
        /*
         * Se o usuário escolheu o envio com template, define o 'mailtype' para html, 
         * caso contrário usa text
         */
        /*if(isset($dados['template']))
            $config['mailtype'] = 'html';
        else*/
            $config['mailtype'] = 'text';
 
        // Inicializa a library Email, passando os parâmetros de configuração
        $this->email->initialize($config);
        
        // Define remetente e destinatário
        $this->email->from('financeiro2@mwftelecom.com.br', 'Vendas'); // Remetente
        $this->email->to($dados['email'],$dados['title']); // Destinatário
 
        // Define o assunto do email
        $this->email->subject('Solicitação de viabilidade para Internet');
 
        /*
         * Se o usuário escolheu o envio com template, passa o conteúdo do template para a mensagem
         * caso contrário passa somente o conteúdo do campo 'mensagem'
         */
        //if(isset($dados['template']))
           // $this->email->message($this->load->view('email/email-template',$dados, TRUE));
        //else
        
        //definindo mensagem que será enviada
        $mensagem = "Olá, ".$dados['title']."\n Acabamos de receber sua viabilidade, em breve retornaremos o contato."
                . "\n\n Para mais informções ligue: (31)3500-7000";
            $this->email->message($mensagem);
         
        /*
         * Se foi selecionado o envio de um anexo, insere o arquivo no email 
         * através do método 'attach' da library 'Email'
         */
        //if(isset($dados['anexo']))
            $this->email->attach('./img/comercial.jpeg');
 
        /*
         * Se o envio foi feito com sucesso, define a mensagem de sucesso
         * caso contrário define a mensagem de erro, e carrega a view home
         */
        if($this->email->send())
        {
            $this->session->set_flashdata('success','Email enviado com sucesso!');
            //$this->load->view('home');
        }
        else
        {
            //$this->session->set_flashdata('error',$this->email->print_debugger());
            //$this->load->view('home');
        }
    }
       

    
    public function dashboard() {
        
        $quantidade = $this->pages_model->contaViabilidade();
        
        $this->load->view('template/header');
        $this->load->view('dashboard/grafico',['quantidade'=>$quantidade]);
        $this->load->view('template/footer');

    }
    
    public function getByCidade($user) {
        
        if($user->user == 3){
            
        return $this->pages_model->getByCidade($user->cidade);
            
        }
        
    }
    
}
