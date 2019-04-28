<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SearchController extends Controller
{
    public function allSearch(Request $request){
        $cari =  $request->get('cari');
        if(empty($cari)){
            $hasil_pencarian = 0;
            return view('beranda/result',compact('hasil_pencarian'));
           
        }
        $artikel =DB::table('artikel')->select('artikel.judul','artikel.id_artikel','artikel.id_sub_artikel','artikel.id_data_user','artikel.thumbnail','artikel.id_artikel','artikel.created_at')->where('judul','LIKE','%'. $cari .'%')->orWhere('judul','LIKE',$cari .'%')->orWhere('judul','LIKE','%'.$cari)->get();
        $tutorial = DB::table('tutorial')->select('tutorial.judul','tutorial.id_tutorial','tutorial.id_category','tutorial.id_data_user','tutorial.thumbnail','tutorial.id_tutorial','tutorial.id_sub_post','tutorial.created_at')->where('judul','LIKE','%'. $cari .'%')->orwhere('judul','LIKE',$cari .'%')->orWhere('judul','LIKE','%'.$cari)->get();
        $hasil_pencarian=$artikel->union($tutorial);

  
        return view('beranda/result',compact('cari','hasil_pencarian'));
    }
    
}
