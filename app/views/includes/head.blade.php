<meta name="robots" content="all">
<meta name='googlebot' content='all'>
<meta charset="utf-8">
<meta name="language" content="pt-br">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="revisit-after" content="5 Days">
<meta name="rating" content="general">
<meta name="distribution" content="global">
<meta name="author" content="Alexandre Izelli - Desenvolvimentos de sites e aplicativos web">
<meta name="description" content="Guia Web Região - Divulgação empresarial e prestadores de serviços">
<meta name="keywords" content="guia de comercio em santa fe do sul, guia de empresas em santa fe do sul, site de busca em santa fe do sul">
<meta name="keywords" content="guia, web, regiao, guiawebregiao, santa, fe, do, sul, comercial, comercio, empresa, empresas, serviço, serviços, anuncio, anuncios">
<meta name="keywords" content="alimentação, lanchonete, cabeleireiro, cabeleireira, unissex, equipamentos, segurança, extintores, informática, manutenção, obras, construções, eletricista, elétrico, táxi, taxista, vestuario, roupas, confecções, veterinaria, clinica, nutrição, animal"> 

<title>Guia Web Região</title>

<!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
{{ HTML::style('css/foundation.css') }}
{{ HTML::style('css/normalize.css')}}
{{ HTML::style('css/icons/foundation-icons.css')}}
{{ HTML::style('css/jquery.bxslider.css')}}
{{ HTML::style('css/webicons.css')}}
{{ HTML::style('css/default.css')}}

<script src="{{ URL::asset('js/vendor/modernizr.js') }}"></script>
@if(isset($mapa))
<script type="text/javascript">var centreGot = false;</script>{{$mapa['js']}}
@endif
