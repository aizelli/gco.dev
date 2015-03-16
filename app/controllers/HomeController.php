<?php

class HomeController extends BaseController {

    public function home() {

        $empresas = Company::orderBy('updated_at', 'dec')->take(5)->get();
        $categorias = Category::where('parent_id', '=', null)->orderBy('name')->get();

        return View::make('home')
                        ->with('empresas', $empresas)
                        ->with('categorias', $categorias);
    }

}
