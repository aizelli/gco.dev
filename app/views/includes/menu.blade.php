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
                <li><a href="#">Categorias</a></li>
                <li><a href="#">Anuncie</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{URL::to('/login')}}">Login</a></li>
            </ul>
        </div>
    </div>
</nav>