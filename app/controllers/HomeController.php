<?php

class HomeController extends BaseController {

    public function home() {

        $estados = State::lists('nome', 'id');
        array_unshift($estados, 'Selecione a UF');
        $empresas = Company::take(10)->get();
        $categorias = Category::where('parent_id', '=', null)->orderBy('name')->get();

        $tabela = '<table class = "table">'; //vai guardar a tabela conforme vai ser montada
        $linha = ''; //guarda cada linha, conforme for sendo montada

        $i = 1;
        $linha .= '<tr>';
        foreach ($empresas as $empresa) {

            $linha .= '<td>' . $empresa->nome_emp . '</td>';

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
    
    public function dropdownCities($id){
        $cidades = State::find($id)->cities;
        if($cidades == null){
            array_unshift($$cidades, 'Selecione');
        }
    return $cidades->lists('nome', 'id');
    }

}
