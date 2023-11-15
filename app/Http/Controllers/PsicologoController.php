<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PsicologoController extends Controller
{


    public function listPsicologos(){
        return view("main");
    }

    public function listLogin(){
        return view("login");
    }

    public function listAccount(){
        return view("account");
    }

    public function listCreate_account(){
        return view("create_account");
    }

    public function listLogs(){
        return view("logs");
    }

    public function listInicio(){
        return view("inicio");
    }

    public function listChats(){
        return view("layout.chats");
    }
    public function listChats_backend(){
        return view("chats_backend");
    }

    public function listMessages(){
        return view("messages");
    }

    public function listprueba(){
        return view("prueba");
    }

    public function listTerapia(){
        return view("terapia");
    }

    public function listPopup(){
        return view("popup_page");
    }

    public function listSuccessfull(){
        return view("successfull_sub");
    }

    public function listlogs_elegir_texto(){
        return view("logs_elegir_texto");
    }

    public function listlogs_elegir_imagen(){
        return view("logs_elegir_imagen");
    }

    public function listlogs_details(){
        return view("logs_details");
    }

    public function listarticulo1(){
        return view("articulo1");
    }
    public function listarticulo2(){
        return view("articulo2");
    }
    public function listarticulo3(){
        return view("articulo3");
    }

}
