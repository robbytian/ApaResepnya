<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class detilPostController extends Controller
{
    public function resep($id){
        $cek_id = \App\Post::where('id_tutorial',$id)->first();
        $data['user'] = \App\DataUser::where('id_data_user',$cek_id->id_data_user)->first();
        $data['detail_post'] = \App\Post::where('id_tutorial',$id)->first();
        $data['keterangan'] = \App\LaporKet::all();
        $data['langkah'] = \App\LangkahTutorial::where('id_tutorial',$id)->get();
        $data['bahan'] = \App\BahanTutorial::where('id_tutorial',$id)->get();
        $data['jumlah_like'] = \App\Like::where('id_tutorial',$cek_id->id_tutorial)->get();
        $data['jumlah_komentar'] = \App\CommentPost::where('id_tutorial',$id)->get();
        $data['comments'] = \App\CommentPost::where('id_tutorial',$id)->orderBy('created_at','ASC')->get();
        $data['id'] = $id;
        return view('detail_post/detilResep')->with($data);
    }

    public function artikel($id){
        $data['detail_post'] = \App\Artikel::where('id_artikel',$id)->first();
        $cek_id = \App\Artikel::where('id_artikel',$id)->first();
        $data['user'] = \App\DataUser::where('id_data_user',$cek_id->id_data_user)->first();
        $data['keterangan'] = \App\LaporKet::all();
        $data['jumlah_like'] = \App\LikeArtikel::where('id_artikel',$id)->get();
        $data['jumlah_komentar'] = \App\CommentArtikel::where('id_Artikel',$id)->get();
        $data['comments'] = \App\CommentArtikel::where('id_artikel',$id)->orderBy('created_at','ASC')->get();
        $data['id'] = $id;
        return view('detail_post/detilArtikel')->with($data);
    }

    public function laporResep(Request $request,$id){
        
       $post = \App\Post::where('id_tutorial',$id)->first();
       $nama = \App\DataUser::where('id_data_user',$post->id_data_user)->first();
       $checkPost = \App\LaporPost::where('username',Auth::User()->username)->where('id_tutorial',$id)->get();
       if(count($checkPost)){
        return redirect('detailPost/'.$id.'')->with('error','Anda Sudah Melapor Postingan Ini!');
       }
       if($nama->username == Auth::User()->username){
           return redirect('detailPost/'.$id.'')->with('error','Tidak Bisa Report Postingan Sendiri!');
       }
        $rules = [
            'alasan'=>'required|max:200',
        ];
        $this->validate($request, $rules);
        $input = [];
        $input['id_tutorial'] = $id; 
        $input['id_artikel'] = null;
        $input['alasan'] = $request['alasan'];
        $input['username'] = Auth::User()->username;
        $status = \App\LaporPost::create($input);

        if($status) return redirect('riwayat_laporan')->with('success',"Resep Berhasil di Laporkan");
        else return redirect('riwayat_laporan')->with('error','gagal');
       
    }
    
    public function laporArtikel(Request $request,$id){
        $post = \App\Artikel::where('id_artikel',$id)->first();
        $nama = \App\DataUser::where('id_data_user',$post->id_data_user)->first();
        $checkPost = \App\LaporPost::where('username',Auth::User()->username)->where('id_artikel',$id)->get();
        if(count($checkPost)){
         return redirect('detailArtikel/'.$id.'')->with('error','Anda Sudah Melapor Postingan Ini!');
        }
        if($nama->username == Auth::User()->username){
            return redirect('detailArtikel/'.$id.'')->with('error','Tidak Bisa Report Postingan Sendiri!');
        }
         $rules = [
             'alasan'=>'required|max:200',
         ];
         $this->validate($request, $rules);
         $input = [];
         $input['id_tutorial'] = null; 
         $input['id_artikel'] = $id;
         $input['alasan'] = $request['alasan'];
         $input['username'] = Auth::User()->username;
         $status = \App\LaporPost::create($input);
 
         if($status) return redirect('riwayat_laporan')->with('success',"Resep Berhasil di Laporkan");
         else return redirect('riwayat_laporan')->with('error','gagal');
        
     }

     public function like(Request $request, $id){
        //  $User = Auth::User()->username;
        //  $data_user = \App\DataUser::where('username',$User)->first();
        $rules = [
            'nama'=>'required',
            'tutorial'=>'required',
        ];
        $this->validate($request, $rules);
         $input = [];
         $input['id_tutorial'] = $request['tutorial'];
         $input['id_data_user'] = $request['nama'];
         $status = \App\Like::create($input);
         return back();
         
     }

     public function unlike(Request $request, $id){
        $User = Auth::User()->username;
        $data_user = \App\DataUser::where('username',$User)->first();
        $id_data_user = $data_user->id_data_user;
        $id_tutorial = $id;
        $result = \App\Like::where('id_tutorial', $id)->where('id_data_user',$id_data_user)->first();
        $status = $result->delete();

        if($status) return back();
        else return back();
    }

    public function like_artikel(Request $request, $id){
        //  $User = Auth::User()->username;
        //  $data_user = \App\DataUser::where('username',$User)->first();
        $rules = [
            'nama'=>'required',
            'artikel'=>'required',
        ];
        $this->validate($request, $rules);
         $input = [];
         $input['id_artikel'] = $request['artikel'];
         $input['id_data_user'] = $request['nama'];
         $status = \App\LikeArtikel::create($input);

         if($status){
         $log = [];
         $log['aktivitas'] = 'like';
         $log['id_data_user'] = $request['nama'];
         $log['id_tutorial'] = null;
         $log['id_artikel'] = $request['artikel'];
         $status2 = \App\AktivitasUser::create($log);
         }
         return back();

         
     }

     public function unlike_artikel(Request $request, $id){
        $User = Auth::User()->username;
        $data_user = \App\DataUser::where('username',$User)->first();
        $id_data_user = $data_user->id_data_user;
        $id_artikel = $id;
        $result = \App\LikeArtikel::where('id_artikel', $id)->where('id_data_user',$id_data_user)->first();
        $status = $result->delete();

        if($status) return back();
        else return back();
    }

    public function commentPost(Request $request, $id){
        $User = Auth::User()->username;
        $data_user = \App\DataUser::where('username',$User)->first();
        $rules = [
            'komentar'=>'required',
        ];
        $this->validate($request, $rules);
         $input = [];
         $input['comment'] = $request['komentar'];
         $input['id_data_user'] = $data_user->id_data_user;
         $input['id_tutorial'] = $id;
         $status = \App\CommentPost::create($input);
        
    }
    public function commentArtikel(Request $request, $id){
        $User = Auth::User()->username;
        $data_user = \App\DataUser::where('username',$User)->first();
        $rules = [
            'komentar'=>'required',
        ];
        $this->validate($request, $rules);
         $input = [];
         $input['comment'] = $request['komentar'];
         $input['id_data_user'] = $data_user->id_data_user;
         $input['id_artikel'] = $id;
         $status = \App\CommentArtikel::create($input);
        
    }


}