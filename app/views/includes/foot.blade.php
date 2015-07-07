<footer> 
    <div class="footer">
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div class="row">
            <div class="medium-6 columns">
                <nav class="text-left">
                    <a href="{{URL::to('#')}}">Contato</a> | <a href="{{URL::to('/sobre')}}">Sobre</a>
                </nav>
            </div>
            <div class="medium-6 columns">
                <div class="fb-page" data-href="https://www.facebook.com/guiawebregiao" data-show-border="true" data-width="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true" data-show-posts="false">
                    <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="https://www.facebook.com/guiawebregiao">
                            <a href="https://www.facebook.com/guiawebregiao">Guia Web Região</a>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="medium-12 columns">
                <p class="text-center"><small>Guia Web Região | 2015 - Todos os direitos reservados</small></p>
            </div>
        </div>
    </div>
</footer>

<script src="{{ URL::asset('js/vendor/jquery.js') }}"></script>
<script src="{{ URL::asset('js/foundation.min.js') }}"></script>
<script src="{{ URL::asset('/js/default.js')}}"></script>
<script src="{{ URL::asset('/js/jquery.bxslider.js')}}"></script>

<script>
            $(document).foundation();
</script>

