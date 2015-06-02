<?php

class HomeController extends BaseController {

    public function home() {

        $estados = State::lists('nome', 'id');
        array_unshift($estados, 'Selecione a UF');
        $empresas = Company::join('states', 'states.id', '=','companies.estado')
                ->join('cities', 'cities.id', '=','companies.cidade')
                ->select('companies.*', 'states.sigla', 'cities.nome')
                ->take(10)
                ->get();
        $categorias = Category::where('parent_id', '=', null)->orderBy('name')->get();

        $tabela = '<table class = "tabela-emp">'; //vai guardar a tabela conforme vai ser montada
        $linha = ''; //guarda cada linha, conforme for sendo montada

        $i = 1;
        $linha .= '<tr>';
        foreach ($empresas as $empresa) {

            $linha .= '<td>'
                    . '<a href="'.URL::to("/empresa/detalhes/$empresa->id").'">'
                    . '<img src="' . URL::to('/') . "/img/empresas/$empresa->razao_social/arte_$empresa->razao_social.jpg" . '" alt="' . $empresa->razao_social . '"' . 'class="art-emp img-responsive">'
                    . '</a>'
                    . '</td>'
                    . '<td>'
                    . '<strong>'.strtoupper($empresa->razao_social) . '</strong><br />'
                    . $empresa->nome . ' - ' . $empresa->sigla.'<br />'
                    . '<a href="'.URL::to("/empresa/detalhes/$empresa->id").'"class="small">+ detalhes</a>'
                    . '</td>';

            if ($i % 2 == 0 and $i != 0) {
                $linha .= '</tr><tr>';
            }

            $i++;
        }
        $linha .= '</tr>';

        $tabela .= $linha;

        $tabela .= '</table>';

        return View::make('home', array(
                    'empresas' => $empresas,
                    'categorias' => $categorias,
                    'tabela' => $tabela,
                    'uf' => $estados
        ));
    }

    public function dropdownCities($id) {
        $cidades = State::find($id)->cities->lists('nome', 'id');
        array_unshift($cidades, 'Selecione');
        return $cidades;
    }

}
