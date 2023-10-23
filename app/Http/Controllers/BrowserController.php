<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Browser;

class BrowserController extends Controller
{
    public function index(){
        return view("graficos", ["data" => json_encode($this->getData())]);
    }

    public function indexnhc(){
        return view("graficosnhc", ["data" => json_encode($this->getData())]);
    }

    public function indexnhcnc(){
        return view("graficosnhcnc", ["data" => json_encode($this->getData())]);
    }

    public function getData(){
        $navegadores = Browser::all();
    
        $puntos = [];
    
        foreach($navegadores as $navegador){
            $puntos[] = ['name' => $navegador['nombre'], 'y' => floatval($navegador['porcentaje'])]; 
        }
    
        return $puntos;
    }
}
