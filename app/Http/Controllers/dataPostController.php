<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class dataPostController extends Controller
{
    public function masakan(){
        $user = \App\DataUser::where('username',Auth::User()->username)->first();
        $data['masakanku'] = \App\Post::where('id_data_user',$user->id_data_user)->where('id_category','2')->get();

        return view('data_post/data_masakan')->with($data);
    }

    public function minuman(){
        $user = \App\DataUser::where('username',Auth::User()->username)->first();
        $data['minumanku'] = \App\Post::where('id_data_user',$user->id_data_user)->where('id_category','1')->get();
        return view('data_post/data_minuman')->with($data);
    }

    public function cemilan(){
        $user = \App\DataUser::where('username',Auth::User()->username)->first();
        $data['cemilanku'] = \App\Post::where('id_data_user',$user->id_data_user)->where('id_category','3')->get();
        return view('data_post/data_cemilan')->with($data);
    }

    public function artikel(){
        $user = \App\DataUser::where('username',Auth::User()->username)->first();
        $data['artikelku'] = \App\Artikel::where('id_data_user',$user->id_data_user)->get();
        return view('data_post/data_artikel')->with($data);
    }

    public function laporan(){
        $data['laporanku'] = \App\LaporPost::where('username',Auth::User()->username)->get();
        return view('data_post/riwayat_laporan')->with($data);
    }
    public function Batallapor(Request $request){
        $deleteLaporan=$request->input('konfirmasiDelete');
        $result = \App\LaporPost::where('id_laporan', $deleteLaporan)->first();
        $status = $result->delete();

        if($status) return redirect('riwayat_laporan')->with('success','Laporan Dibatalkan');
        else return redirect('riwayat_laporan')->with('error','Laporan Gagal Dibatalkan');
      } 
}