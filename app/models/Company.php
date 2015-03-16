<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Company
 *
 * @author alexandre
 */
class Company extends Eloquent {
    
    public function categories(){
        
        $this->belongsTo('Category');
    }
}
