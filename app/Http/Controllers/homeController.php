<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class homeController extends Controller
{
    public function index(){
        $data['semua']=\App\Post::orderBy('created_at','DESC')->where('status','=','1')->limit('3')->get();
        $data['semua2']=\App\Artikel::orderBy('created_at','DESC')->where('status','=','1')->limit('1')->get();
        $data['masakan'] =\App\Post::where('id_category','2')->where('status','=','1')->orderBy('created_at','DESC')->limit('4')->get();
        $data['minuman'] =\App\Post::where('id_category','1')->where('status','=','1')->orderBy('created_at','DESC')->limit('4')->get();
        $data['cemilan'] =\App\Post::where('id_category','3')->where('status','=','1')->orderBy('created_at','DESC')->limit('4')->get();
        $data['artikel'] =\App\Artikel::where('status','=','1')->limit('4')->get();
        $data['carousel_masakan']=\App\Post::where('id_category','2')->orderBy('created_at','DESC')->first();
        $data['carousel_minuman']=\App\Post::where('id_category','1')->orderBy('created_at','DESC')->first();
        $data['carousel_cemilan']=\App\Post::where('id_category','3')->orderBy('created_at','DESC')->first();
        return view('beranda/beranda')->with($data);
    }




}

