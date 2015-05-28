<nav class="navbar-static-top">
    <div class="container-fluid navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::to('/')}}">HOME</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav ">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cadastro <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{URL::to('admin/cadastro/usuario')}}">Usuários</a></li>
                        <li><a href="{{URL::to('admin/cadastro/empresa')}}">Empresas</a></li>
                        <li><a href="{{URL::to('admin/cadastro/categoria')}}">Categorias</a></li>
                        <li><a href="{{URL::to('admin/cadastro/regiao')}}">Regiões</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gerenciar <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{URL::to('admin/listar/usuarios')}}">Usuários</a></li>
                        <li><a href="{{URL::to('admin/listar/empresas')}}">Empresas</a></li>
                        <li><a href="{{URL::to('admin/listar/categorias')}}">Categorias</a></li>
                        <li><a href="{{URL::to('admin/listar/regioes')}}">Regiões</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{URL::to('/sair')}}">Sair</a> </li>
            </ul>
        </div>
    </div>
</nav>