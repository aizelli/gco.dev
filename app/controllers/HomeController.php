<?php

class HomeController extends BaseController {

    public function home() {

        $estados = State::lists('nome', 'id');
        array_unshift($estados, 'Selecione a UF');
        $empresas = Company::join('states', 'states.id', '=', 'companies.estado')
                ->join('cities', 'cities.id', '=', 'companies.cidade')
                ->select('companies.*', 'states.sigla', 'cities.nome')
                ->where('companies.tipo', '=', 1)
                ->take(12)
                ->get();
        $categorias = Category::where('parent_id', '=', null)->orderBy('name')->get();

        $tabela = '<div class = "medium-12 columns">'; //vai guardar a tabela conforme vai ser montada
        $linha = ''; //guarda cada linha, conforme for sendo montada

        $i = 1;
        $linha .= '<div class="custom-panel radius"><div class = "row">';
        foreach ($empresas as $empresa) {

            $linha .= '<div class = "medium-6 columns">'
                    . '<div class = "row">'
                    . '<div class = "medium-7 columns">'
                    . '<a href="' . URL::to("/empresa/detalhes/$empresa->id") . '">'
                    . '<img src="' . URL::to('/') . str_replace(' ', '_', "/img/empresas/$empresa->razao_social/arte_$empresa->razao_social.jpg") . '" alt="' . $empresa->razao_social . '"' . ' class="art-emp" />'
                    . '</a>'
                    . '</div>'
                    . '<div class = "medium-5 columns dados" >'
                    . '<strong style="text-transform: uppercase;">' . $empresa->nome_emp . '</strong><br />'
                    . $empresa->nome . ' - ' . $empresa->sigla . '<br />'
                    . '<a href="' . URL::to("/empresa/detalhes/$empresa->id") . '"><small>+ detalhes</small></a>'
                    . '</div>'
                    . '</div>'
                    . '</div>';

            if ($i % 2 == 0 and $i != 0) {
                $linha .= '</div><div style="min-height: 10px"></div><div class = "row">';
            }

            $i++;
        }
        $linha .= '</div></div>';

        $tabela .= $linha;

        $tabela .= '</div>';

        return View::make('home', array(
                    'empresas' => $empresas,
                    'categorias' => $categorias,
                    'tabela' => $tabela,
                    'uf' => $estados
        ));
    }

    public function sobre() {

        $estados = State::lists('nome', 'id');
        array_unshift($estados, 'Selecione a UF');
        $categorias = Category::where('parent_id', '=', null)->orderBy('name')->get();

        return View::make('sobre', array(
                    'categorias' => $categorias,
                    'uf' => $estados
        ));
    }

    public function dropdownCities($id) {
        $cidades = State::find($id)->cities->lists('id', 'nome');
        return Response::make($cidades);
    }

    public function dropdownSubCategories($id) {
        $sub = Category::where('parent_id', '=', $id)->lists('id', 'name');
        return Response::make($sub);
    }

}
