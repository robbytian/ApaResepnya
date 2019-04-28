<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class artikelController extends Controller
{
    public function index(){
        $data['artikel'] = \App\Artikel::where('status','=','1')->paginate(18);
        return view('artikel/index')->with($data);
    }   
    public function buatartikel(){
        return view('artikel/buat_artikel');
    }
    public function postartikel(Request $request){
        $rules = [
            'judul' => 'required|max:50',
            'sub_artikel' =>'required',
            'cover'=>'image',
            'cover-link',
            'isiText'=>'required',
        ];
        $user = \App\DataUser::where('username',Auth::User()->username)->first();
        $this->validate($request, $rules);
                $input = [];
                if(empty($request['cover']) && empty($request['cover-link'])){
                    return redirect('artikel/buat_artikel')->with('error','Cover Tidak Boleh Kosong(Pilih 1, lewat URL atau memakai foto cover sendiri)')->withInput();
                }
                if(!empty($request['cover']) && !empty($request['cover-link'])){
                    return redirect('artikel/buat_artikel')->with('error','Hanya Bisa memasukan 1 cover!(Pilih 1, lewat URL atau memakai foto cover sendiri)')->withInput();
                }
                if(!empty($request['cover']) && empty($request['cover-link'])){
                    $photo = $request['cover'];
                    $filename = $photo->store('assets/images/thumbnail');
                    $photo->move('assets/images/thumbnail', substr($filename, 11, strlen($filename)-1));
                    $input['thumbnail'] = $filename;              
                }
                if(empty($request['cover']) && !empty($request['cover-link'])){
                    $input['thumbnail'] = $request['cover-link'];
                    if (empty(GetImageSize($request['cover-link']))) {
                        return redirect('artikel/buat_artikel')->with('error','URL yang anda masukan bukanlah sebuah gambar!')->withInput();
                    }
                }
                    $input['judul'] = $request['judul'];
                    $input['isi_artikel'] = $request['isiText'];
                    $input['id_sub_artikel'] = $request['sub_artikel'];
                    $input['id_data_user'] = $user->id_data_user;
                    $input['status'] = '1';

                    $status = \App\Artikel::create($input);
                    
                    if($status) {
                    $view_data = \App\Artikel::where('judul',$request['judul'])->where('isi_artikel',$request['isiText'])->first();
                    return redirect('detailArtikel/'.$view_data->id_artikel.'')->with('success','Artikel Berhasil Dibuat');
                    }
                    else{ 
                        return back()->with('error','Artikel Gagal Dibuat')->withInput();
                    }
                }

    public function destroy(Request $request){
        $deleteArtikel=$request->input('konfirmasiDelete');
        $result = \App\Artikel::where('id_artikel', $deleteArtikel)->first();
        $status = $result->delete();

        if($status) return redirect('data_artikel')->with('success','Artikel berhasil dihapus');
        else return redirect('data_artikel')->with('error','Artikel gagal dihapus');
    }

    public function filter(Request $request){
        $filter = $request->get('filter');
        $data['filter']= $filter;
        if($filter == 'top'){
        $data['artikel_filter'] = \App\artikel::orderBy('created_at','DESC')->where('status','=','1')->paginate(18);
        }
        if($filter == 'terbaru'){
        $data['artikel_filter'] = \App\artikel::orderBy('created_at','DESC')->where('status','=','1')->paginate(18);
        }
        if($filter == 'populer'){
        $data['artikel_filter'] = \App\artikel::orderBy('created_at','DESC')->where('status','=','1')->paginate(18);
        }

        $category = \App\ArtikelCategory::get();
        foreach($category as $row){
            if($filter == $row->nama){
                $data['artikel_filter'] = \App\artikel::where('id_sub_artikel',$row->id_sub_artikel)->where('status','=','1')->paginate(18);
            }
        }
        return view('artikel/result')->with($data);
    }

    public function editartikel($id, Request $request){
        $data_artikel = \App\Artikel::where('id_artikel',$id)->first();
        $data['data_artikel'] =\App\Artikel::where('id_artikel',$id)->first();
        $data['sub_artikel'] = \App\SubArtikel::all();
        return view('artikel/edit_artikel')->with($data);
    }

    public function update_artikel($id,Request $request){
        $rules = [
            'judul' => 'required|max:50',
            'sub_artikel' =>'required',
            'cover'=>'image',
            'cover-link',
            'isiText'=>'required',
        ];
        $user = \App\DataUser::where('username',Auth::User()->username)->first();
        $check_artikel = \App\Artikel::where('id_artikel',$id)->first();
        $this->validate($request, $rules);

            $input = [];

            if(!empty($request['cover']) && !empty($request['cover-link'])){
                return back()->with('error','Hanya Bisa memasukan 1 cover!(Pilih 1, lewat URL atau memakai foto cover sendiri)')->withInput();
            }
            if(!empty($request['cover']) && empty($request['cover-link'])){
                $photo = $request['cover'];
                $filename = $photo->store('assets/images/thumbnail');
                $photo->move('assets/images/thumbnail', substr($filename, 11, strlen($filename)-1));
                $input['thumbnail'] = $filename;              
            }
            if(empty($request['cover']) && !empty($request['cover-link'])){
                $input['thumbnail'] = $request['cover-link'];
                if (empty(GetImageSize($request['cover-link']))) {
                    return back()->with('error','URL yang anda masukan bukanlah sebuah gambar!')->withInput();
                }
            }
                $input['judul'] = $request['judul'];
                $input['isi_artikel'] = $request['isiText'];
                $input['id_sub_artikel'] = $request['sub_artikel'];
                $getArtikel = \App\Artikel::where('id_artikel',$id)->first();
                $status = $getArtikel->update($input);
                
                return redirect('detailArtikel/'.$id.'')->with('success','Artikel Berhasil Diubah');
            }
}

