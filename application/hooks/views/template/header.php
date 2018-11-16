<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Viability HSM</title>
    <link rel="stylesheet" type="text/css" href="/resource/css/meucss.css">
    <!-- Bootstrap 
    <link href="/resource/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous"></head>
    <!-- importando biblioteca do google chart-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<body>
    
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <link rel="icon" type="img/png" href="/img/logo.png" /><!-- colocando logo na aba do navegador -->
         
        
        
        
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            
            <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="/pages">
                <img src="/img/logo.png" width="30" height="30" alt=""  >
                Viability HSM
            </a>
          </nav>
        
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Viabilidades
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/pages/insere">Adicionar</a>
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header">Status</h6>
                        <a class="dropdown-item" href="/pages/pendentes">Pendentes</a>
                        <a class="dropdown-item" href="/pages/pagination1">Aprovadas</a>
                        <a class="dropdown-item" href="/pages/pagination2">Negadas</a>
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header">Relatórios</h6>
                        <a class="dropdown-item" href="/pages/dashboard">Total</a>
                    </div>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cidades
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        
                        <h6 class="dropdown-header">Cidades</h6>
                        <a class="dropdown-item" href="/cidades/lista">Visualizar</a>
                        <a class="dropdown-item" href="/cidades/insere">Adicionar</a>
                    </div>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Opções
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <h6 class="dropdown-header">Usuários</h6>
                        <a class="dropdown-item" href="/opcoes/register">Cadastrar</a>
                        <a class="dropdown-item" href="/opcoes/listauser">Editar</a>
                        
                    </div>
                </li>
                
                
            
            </ul>
            
            <form class="form-inline my-2 my-lg-0" action="/pages/search" method="post">
                <input class="form-control mr-sm-2" name="search" type="text" placeholder="Buscar Viabilidade" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
            </form>
        
            <ul class="navbar-nav my-2 my-lg-0 "
                
                <li class="nav-item active navbar-right"><a class="nav-link" href="/auth/logout">sair</a></li>
            
            </ul>
            

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <br>