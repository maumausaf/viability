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

            $this->EnviarEmail();
            $this->pages_model->insere();
            $this->load->view('auth/success');
            
        }
    }
    
    public function logout(){
        
        $this->session->unset_userdata('user');
        redirect('auth/login', 'location', 302);
        die();
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
        
        
        /*
         * Se o usuário escolheu o envio com template, passa o conteúdo do template para a mensagem
         * caso contrário passa somente o conteúdo do campo 'mensagem'
         */
        //if(isset($dados['template']))
           // $this->email->message($this->load->view('email/email-template',$dados, TRUE));
        //else
        if($operacao == 'rec'){
            $user = $this->users_model->getByEmail();
            $this->email->from('hasomac.2017@gmail.com', 'Equipe HSM'); // Remetente
            $this->email->to($dados['email']); // Destinatário
            // Define o assunto do email
            $this->email->subject('Recuperação de senha');
            
            $mensagem = "Olá,$user->name.\n Você pode recuperar sua senha clicando no link abaixo. http://177.105.241.20:8080/auth/recPassword/$user->stretch"
                . "\n\n Para mais informções contate-nos pelo email: hasomac.2017@gmail.com";
            $this->email->message($mensagem);
            
        }else if($operacao == null){
            // Define remetente e destinatário
            $this->email->from('financeiro2@mwftelecom.com.br', 'Vendas'); // Remetente
            $this->email->to($dados['email'],$dados['title']); // Destinatário
 
            // Define o assunto do email
            $this->email->subject('Solicitação de viabilidade para Internet');
 
            //definindo mensagem que será enviada
            $mensagem = "Olá, ".$dados['title']."\n Acabamos de receber sua viabilidade, em breve retornaremos o contato."
                . "\n\n Para mais informções ligue: (31)3500-7000";
            $this->email->message($mensagem);
        } 
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

    public function esqueceuSenha() {
         //$user = $this->session->userdata('user');
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required');
        

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('auth/header');
            $this->load->view('auth/rec_senha');
            $this->load->view('template/footer');
        } else {
            $user = $this->users_model->getByEmail();
            if ($user) {
                $this->EnviarEmail($operação='rec');
                $this->load->view('auth/success_rec_senha');
                $this->load->view('template/footer');
            }else{

                return $this->load->view('auth/erro');
            }
        }
    }
    
     public function recPassword($stretch = null) {
        
        $user = $this->users_model->getStretch($stretch);
        
        $this->load->library('form_validation'); //importando biblioteca -- form_validation
        
        $this->form_validation->set_rules('name', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Senha', 'required|min_length[8]');
        $this->form_validation->set_rules('passwordconf', 'Confirmação de Senha','required|matches[password]');//validando confirmação de senha
           
        if($user == null){ 
            return $this->load->view('auth/erro');
        }
        if($this->form_validation->run() === false){
            $page = $this->users_model->get($user->id);
            $this->load->view('auth/header');
            $this->load->view('auth/edit_user_user',['user'=> $page,'stretch'=>$stretch]);       
            $this->load->view('template/footer');
        }else{
            
            $this->users_model->updateByUser($user->id);
            $data['back'] = '/auth/login';
            $this->users_model->updateByUser($user->id);
            $this->load->view('auth/success',$data);
        }
       
        }
     
}