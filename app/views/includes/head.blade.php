<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
