<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompanyController
 *
 * @author alexandre
 */
class CompanyController extends BaseController {

    public function createCompanies() {

        $categorias = Category::where('parent_id', '=', null)->lists('name', 'id');
        $estados = State::orderBy('nome')->lists('nome', 'id');
        array_unshift($estados, "Selecione");

        return View::make('admin.cadastros.f_cadastro_empresa', array(
                    'categorias' => $categorias,
                    'estados' => $estados
        ));
    }

    public function storeCompanies() {

        $regras = array(
            'razao' => 'required'
        );

        $mensagens = array(
            'razao.required' => '<strong>Razão Social</strong> inválida.'
        );

        $validação = Validator::make(Input::all(), $regras, $mensagens);

        if ($validação->fails()) {

            return Redirect::to('admin/cadastro/empresa')->withErrors($validação)->withInput(Input::all());
        } else {

            $empresa = new Company;

            $empresa->razao_social = Input::get('razao');
            $empresa->nome_emp = Input::get('nome_emp');
            $empresa->cpfcnpj = Input::get('cpfcnpj');
            $empresa->ie = Input::get('ie');
            $empresa->nome_resp = Input::get('nome_res');
            $empresa->email = Input::get('email_emp');
            $empresa->site_url = Input::get('site');
            $empresa->descricao = Input::get('descricao');
            $empresa->telefone1 = Input::get('tel1');
            $empresa->telefone2 = Input::get('tel2');
            $empresa->celular = Input::get('tel3');
            $empresa->cep = Input::get('cep');
            $empresa->pais = 'BRA';
            $empresa->estado = Input::get('uf');
            $empresa->cidade = Input::get('cidade');
            $empresa->bairro = Input::get('bairro');
            $empresa->endereco = Input::get('endereco');
            $empresa->numero = Input::get('numero');
            $empresa->complemento = Input::get('complemento');
            if (Input::get('coord') != null) {
                $empresa->coordenadas = Input::get('coord');
            }
            $empresa->categories_id = Input::get('categoria');
            $empresa->ativo = 1;
            if (Input::get('destaque') == 1) {
                $empresa->tipo = 1;
            } else {
                $empresa->tipo = 0;
            }
            $empresa->save();


            return View::make('admin.cadastros.f_cadastro_emp_ia', array(
                        'id' => $empresa->id
            ));
        }
    }

    public function storeCompInfo($id) {

        $empresa = Company::find($id);
        if (
                Input::get('site') != null ||
                Input::get('face') != null ||
                Input::get('google') != null ||
                Input::get('twiter') != null ||
                Input::get('linkedin') != null ||
                Input::get('youtube') != null ||
                Input::get('istagram') != null
        ) {
            $social = new Network;

            $social->companies_id = $id;
            $social->site_url = Input::get('site');
            $social->link_fb = Input::get('face');
            $social->link_gp = Input::get('google');
            $social->link_tw = Input::get('twitter');
            $social->link_li = Input::get('linkedin');
            $social->link_yt = Input::get('youtube');
            $social->link_is = Input::get('istagram');

            $social->save();
        }

        $destino = public_path() . "/img/empresas/$empresa->razao_social";
        $destino = str_replace(' ', '_', $destino);

        if (Input::hasFile('arte')) {
            $nome = "arte_" . str_replace(' ','_',$empresa->razao_social) . "." . Input::file('arte')->getClientOriginalExtension();
            $arte = Input::file('arte');
            $arte->move($destino, $nome);
        }
        if (Input::hasFile('img1')) {
            $nome = "01." . Input::file('img1')->getClientOriginalExtension();
            $img = Input::file('img1');
            $img->move($destino, $nome);
        }
        if (Input::hasFile('img2')) {
            $nome = "02." . Input::file('img2')->getClientOriginalExtension();
            $img = Input::file('img2');
            $img->move($destino, $nome);
        }
        if (Input::hasFile('img3')) {
            $nome = "03." . Input::file('img3')->getClientOriginalExtension();
            $img = Input::file('img3');
            $img->move($destino, $nome);
        }
        if (Input::hasFile('img4')) {
            $nome = "04." . Input::file('img4')->getClientOriginalExtension();
            $img = Input::file('img4');
            $img->move($destino, $nome);
        }
        if (Input::hasFile('img5')) {
            $nome = "05." . Input::file('img5')->getClientOriginalExtension();
            $img = Input::file('img5');
            $img->move($destino, $nome);
        }

        return Redirect::to('painel/admin');
    }

    public function showCompanies() {

        $empresas = Company::paginate(15);

        return View::make('admin.listas.lista_empresas', array(
                    'dados' => $empresas
        ));
    }

    public function showCompaniesFilter() {

        $tipo = Input::get('tipo');
        $valor = Input::get('valor');

        if ($tipo == 1) {
            $empresa = Company::where('id', '=', $valor)->paginate(15);

            return View::make('admin.listas.lista_empresas', array(
                        'dados' => $empresa
            ));
        } elseif ($tipo == 2) {
            $empresa = Company::where('nome_emp', 'LIKE', '%' . $valor . '%')->paginate(15);

            return View::make('admin.listas.lista_empresas', array(
                        'dados' => $empresa
            ));
        } else {
            $empresas = Company::paginate(15);

            return View::make('admin.listas.lista_empresas', array(
                        'dados' => $empresas
            ));
        }
    }

    public function editCompanies($id) {

        $empresas = Company::find($id);
        $estados = State::lists('nome', 'id');
        array_unshift($estados, 'Selecione');
        $categorias = Category::where('parent_id', '=', null)->lists('name', 'id');

        return View::make('admin.edições.f_editar_empresa', array(
                    'dados' => $empresas,
                    'estados' => $estados,
                    'categorias' => $categorias
        ));
    }

    public function editImgCompany($id) {

        return View::make('admin.edições.f_editar_empresa_img', array(
                    'id' => $id
        ));
    }

    public function updateCompanies($id) {

        $empresa = Company::find($id);

        $empresa->razao_social = Input::get('razao');
        $empresa->nome_emp = Input::get('nome_emp');
        $empresa->cpfcnpj = Input::get('cpfcnpj');
        $empresa->ie = Input::get('ie');
        $empresa->nome_resp = Input::get('nome_res');
        $empresa->email = Input::get('email_emp');
        $empresa->descricao = Input::get('descricao');
        $empresa->telefone1 = Input::get('tel1');
        $empresa->telefone2 = Input::get('tel2');
        $empresa->celular = Input::get('tel3');
        $empresa->cep = Input::get('cep');
        $empresa->estado = Input::get('uf');
        $empresa->cidade = Input::get('cidade');
        $empresa->bairro = Input::get('bairro');
        $empresa->endereco = Input::get('endereco');
        $empresa->numero = Input::get('numero');
        $empresa->complemento = Input::get('complemento');
        if (Input::get('coord') != null) {
            $empresa->coordenadas = Input::get('coord');
        }
        $empresa->categories_id = Input::get('categoria');
        $empresa->sub1_id = Input::get('sub1');
        $empresa->ativo = 1;
        if (Input::get('destaque') == 1) {
            $empresa->tipo = 1;
        } else {
            $empresa->tipo = 0;
        }

        if (
                Input::get('site') != null ||
                Input::get('face') != null ||
                Input::get('google') != null ||
                Input::get('twiter') != null ||
                Input::get('linkedin') != null ||
                Input::get('youtube') != null ||
                Input::get('istagram') != null
        ) {
            $result = Network::where('companies_id', '=', $id)->get();

            if (count($result) > 0) {
                
                foreach($result as $r){
                    $id = $r->id();
                }
                
                $social = Network::find($id);
                
                $social->site_url = Input::get('site');
                $social->link_fb = Input::get('face');
                $social->link_gp = Input::get('google');
                $social->link_tw = Input::get('twiter');
                $social->link_li = Input::get('linkedin');
                $social->link_yt = Input::get('youtube');
                $social->link_is = Input::get('istagram');

                $social->save();
                
            } else {
                
                $social = new Network;

                $social->companies_id = $id;
                $social->site_url = Input::get('site');
                $social->link_fb = Input::get('face');
                $social->link_gp = Input::get('google');
                $social->link_tw = Input::get('twitter');
                $social->link_li = Input::get('linkedin');
                $social->link_yt = Input::get('youtube');
                $social->link_is = Input::get('istagram');

                $social->save();
            }
        }

        $empresa->save();

        return Redirect::to('admin/listar/empresas');
    }

    public function updateImgCompany($id) {

        $empresa = Company::find($id);

        $destino = public_path() . "/img/empresas/$empresa->razao_social";
        $destino = str_replace(' ', '_', $destino);

        if (Input::hasFile('arte')) {
            $nome = "arte_" . str_replace(' ','_',$empresa->razao_social) . "." . Input::file('arte')->getClientOriginalExtension();
            $arte = Input::file('arte');
            $arte->move($destino, $nome);
        }
        if (Input::hasFile('img1')) {
            $nome = "01." . Input::file('img1')->getClientOriginalExtension();
            $img = Input::file('img1');
            $img->move($destino, $nome);
        }
        if (Input::hasFile('img2')) {
            $nome = "02." . Input::file('img2')->getClientOriginalExtension();
            $img = Input::file('img2');
            $img->move($destino, $nome);
        }
        if (Input::hasFile('img3')) {
            $nome = "03." . Input::file('img3')->getClientOriginalExtension();
            $img = Input::file('img3');
            $img->move($destino, $nome);
        }
        if (Input::hasFile('img4')) {
            $nome = "04." . Input::file('img4')->getClientOriginalExtension();
            $img = Input::file('img4');
            $img->move($destino, $nome);
        }
        if (Input::hasFile('img5')) {
            $nome = "5." . Input::file('img5')->getClientOriginalExtension();
            $img = Input::file('img5');
            $img->move($destino, $nome);
        }
    }

    public function showCompany($id) {

        $categorias = Category::where('parent_id', '=', null)->orderBy('name')->get();
        $estados = State::orderBy('nome')->lists('nome', 'id');
        array_unshift($estados, 'Selecione a UF');
        $empresa = Company::join('states', 'states.id', '=', 'companies.estado')
                ->join('cities', 'cities.id', '=', 'companies.cidade')
                ->select('companies.*', 'states.sigla', 'cities.nome')
                ->where('companies.id', '=', $id)
                ->get();
        $social = Network::where('companies_id', '=', $id)->get();


        foreach ($empresa as $e) {
            if ($e->coordenadas == null || $e->coordenadas == 0) {
                $endereco = $e->endereco . ', ' . $e->numero . ', ' . $e->nome . ' - ' . $e->sigla . ', ' . substr($e->cep, 0, 5) . '-' . substr($e->cep, 5, 3);
            } else {
                $endereco = $e->coordenadas;
            }
        }

        $config = array();
        $config['zoom'] = '17';
        $config['center'] = $endereco;
        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            });
        }
        centreGot = true;';
        $config['region'] = 'br';

        Gmaps::initialize($config);

        // set up the marker ready for positioning
        // once we know the users location

        $marker = array();

        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();

        return View::make('visualiza_empresa', array(
                    'uf' => $estados,
                    'categorias' => $categorias,
                    'empresa' => $empresa,
                    'social' => $social,
                    'mapa' => $map
        ));
    }

    public function pesquisaRegiao() {
        $estados_fil = $estados = State::orderBy('nome')->lists('nome', 'id');
        array_unshift($estados, 'Selecione');
        array_unshift($estados_fil, 'Todos');
        $categorias = Category::where('parent_id', '=', null)->orderBy('id')->lists('name', 'id');
        $sub = Category::where('parent_id', '=', 1)->lists('name', 'id');
        $pesquisa = Input::get('pesquisa') != null ? Input::get('pesquisa') : '%';
        $estado = Input::get('uf') != 0 ? Input::get('uf') : '%';
        $cidade = Input::get('cidade') != 0 ? Input::get('cidade') : '%';
        $cat = Input::get('cat') != 0 ? Input::get('cat') : '%';
        $sub_cat = Input::get('sub') != 0 ? Input::get('sub') : '%';

        $empresas = Company::join('states', 'states.id', '=', 'companies.estado')
                ->join('cities', 'cities.id', '=', 'companies.cidade')
                ->select('companies.*', 'states.sigla', 'cities.nome')
                ->where('companies.estado', 'LIKE', $estado)
                ->where('companies.cidade', 'LIKE', $cidade)
                ->where('companies.categories_id', 'LIKE', $cat)
                ->where('companies.sub1_id', 'LIKE', $sub_cat)
                ->where('companies.nome_emp', 'LIKE', '%' . $pesquisa . '%')
                ->get();
        if (count($empresas) > 0) {
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
        } else {
            $tabela = '<div class = "medium-12 columns">';
            $tabela .= '<h4>Nenhum resultado encontrado.</h4>';
            $tabela .= '</div>';
        }
        return View::make('visualiza_pesquisa_regiao', array(
                    'empresas' => $empresas,
                    'tabela' => $tabela,
                    'uf' => $estados,
                    'estados' => $estados_fil,
                    'categorias' => $categorias,
                    'sub' => $sub
        ));
    }

    public function pesquisaPorCategoria($id) {

        $estados_fil = $estados = State::orderBy('nome')->lists('nome', 'id');
        array_unshift($estados, 'Selecione');
        array_unshift($estados_fil, 'Todos');
        $pesquisa = Input::get('pesquisa') != null ? Input::get('pesquisa') : '%';
        $estado = Input::get('uf') != 0 ? Input::get('uf') : '%';
        $cidade = Input::get('cidade') != 0 ? Input::get('cidade') : '%';
        $sub_cat = Input::get('sub') != 0 ? Input::get('sub') : '%';
        $empresas = Company::join('states', 'states.id', '=', 'companies.estado')
                ->join('cities', 'cities.id', '=', 'companies.cidade')
                ->select('companies.*', 'states.sigla', 'cities.nome')
                ->where('companies.categories_id', '=', $id)
                ->where('companies.estado', 'LIKE', $estado)
                ->where('companies.cidade', 'LIKE', $cidade)
                ->where('companies.sub1_id', 'LIKE', $sub_cat)
                ->where('companies.nome_emp', 'LIKE', '%' . $pesquisa . '%')
                ->get();
        $sub = Category::where('parent_id', '=', $id)->orderBy('name')->lists('name', 'id');
        $categoria = Category::select('name', 'id')->find($id);

        if (count($empresas) > 0) {
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
        } else {
            $tabela = '<div class = "medium-12 columns">';
            $tabela .= '<h4>Nenhum resultado encontrado.</h4>';
            $tabela .= '</div>';
        }
        return View::make('visualiza_pesquisa', array(
                    'empresas' => $empresas,
                    'categorias' => $sub,
                    'tabela' => $tabela,
                    'uf' => $estados,
                    'estados' => $estados_fil,
                    'categoria' => $categoria
        ));
    }

    public function pesquisaAvancada() {
        $id = Input::get('categoria');
        $estados = State::orderBy('nome')->lists('nome', 'id');
        array_unshift($estados, 'Selecione');
        $sub = Category::where('parent_id', '=', $id)->orderBy('name')->lists('name', 'id');
        $categoria = Category::select('name', 'id')->find($id);

        $pesquisa = Input::get('pesquisa') != null ? Input::get('pesquisa') : '%';
        $sub_cat = Input::get('sub') != 0 ? Input::get('sub') : '%';
        $estado = Input::get('uf') != 0 ? Input::get('uf') : '%';
        $cidade = Input::get('cidade') != 0 ? Input::get('cidade') : '%';


        $empresas = Company::join('states', 'states.id', '=', 'companies.estado')
                ->join('cities', 'cities.id', '=', 'companies.cidade')
                ->select('companies.*', 'states.sigla', 'cities.nome')
                ->where('companies.categories_id', '=', $id)
                ->where('companies.sub1_id', 'LIKE', $sub_cat)
                ->where('companies.estado', 'LIKE', $estado)
                ->where('companies.cidade', 'LIKE', $cidade)
                ->where('companies.nome_emp', 'LIKE', '%' . $pesquisa . '%')
                ->get();

        if ($empresas->count() <= 0) {
            $tabela = "Nenhum resultado encontrado.";
            return View::make('visualiza_pesquisa', array(
                        'empresas' => $empresas,
                        'categorias' => $sub,
                        'tabela' => $tabela,
                        'uf' => $estados,
                        'categoria' => $categoria
            ));
        } else {
            $tabela = '<table class = "tabela-emp">'; //vai guardar a tabela conforme vai ser montada
            $linha = ''; //guarda cada linha, conforme for sendo montada

            $i = 1;
            $linha .= '<tr>';
            foreach ($empresas as $empresa) {

                $linha .= '<td>'
                        . '<a href="' . URL::to("/empresa/detalhes/$empresa->id") . '">'
                        . '<img src="' . URL::to('/') . str_replace(' ', '_', "/img/empresas/$empresa->razao_social/arte_$empresa->razao_social.jpg") . '" alt="' . $empresa->razao_social . '"' . ' class="art-emp" />'
                        . '</a>'
                        . '</td>'
                        . '<td>'
                        . '<strong style="text-transform: uppercase;">' . $empresa->nome_emp . '</strong><br />'
                        . $empresa->nome . ' - ' . $empresa->sigla . '<br />'
                        . '<a href="' . URL::to("/empresa/detalhes/$empresa->id") . '"class="small">+ detalhes</a>'
                        . '</td>';

                if ($i % 2 == 0 and $i != 0) {
                    $linha .= '</tr><tr>';
                }

                $i++;
            }
            $linha .= '</tr>';

            $tabela .= $linha;

            $tabela .= '</table>';

            return View::make('visualiza_pesquisa', array(
                        'empresas' => $empresas,
                        'categorias' => $sub,
                        'tabela' => $tabela,
                        'uf' => $estados,
                        'categoria' => $categoria
            ));
        }
    }

}
