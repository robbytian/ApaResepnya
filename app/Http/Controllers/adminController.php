<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        $data['masakan'] =\App\Post::where('id_category','2')->get();
        $data['minuman'] =\App\Post::where('id_category','1')->get();
        $data['cemilan'] =\App\Post::where('id_category','3')->get();
        $data['artikel'] =\App\Artikel::all();
        $data['laporan_resep']= \App\LaporPost::where('id_artikel',null)->get();
        $data['laporan_artikel'] = \App\LaporPost::where('id_tutorial',null)->get();
        $data['semua_user'] = \App\User::where('level','2')->orWhere('level','0')->orderByRaw("FIELD(level,'3','2') ASC ")->get();
        return view('admin_tool/dashboard')->with($data);
    }

    public function tambah_category(){
        $data['category']= \App\Category::all();
        $data['ctgr_makanan'] = \App\SubCategory::where('id_category',2)->get();
        $data['ctgr_minuman'] = \App\SubCategory::where('id_category',1)->get();
        $data['ctgr_cemilan'] = \App\SubCategory::where('id_category',3)->get();
        $data['ctgr_artikel'] = \App\SubArtikel::all();
        return view('admin_tool/tambah_category')->with($data);
    }

    public function addcategory(Request $request){
        $rules = [
            'nama'=>'required',
            'sub_category'=>'required',
        ];
        $this->validate($request, $rules);
        $input = [];
        $input['nama'] = $request['nama'];
        $input['id_category'] = $request['sub_category'];
        $status = \App\SubCategory::create($input);
        if($status)return back()->with('success', 'Sub Category berhasil ditambahkan');
        else return back()->with('error', 'Sub Category gagal ditambahkan');
    }

    public function addcategoryArtikel(Request $request){
        $rules = [
            'nama'=>'required',
        ];
        $this->validate($request, $rules);
        $input = [];
        $input['nama'] = $request['nama'];
        $status = \App\SubArtikel::create($input);
        if($status)return back()->with('success', 'Sub Category Artikel berhasil ditambahkan');
        else return back()->with('error', 'Sub Category Artikel gagal ditambahkan');
    }


    public function data_masakan(){
        $data['semua_masakan'] = \App\Post::where('id_category','2')->get();
        return view('admin_tool/data_masakan_all')->with($data);
    }
    
    public function data_minuman(){
        $data['semua_minuman'] = \App\Post::where('id_category','1')->get();
        return view('admin_tool/data_minuman_all')->with($data);
    }
    
    public function data_cemilan(){
        $data['semua_cemilan'] = \App\Post::where('id_category','3')->get();
        return view('admin_tool/data_cemilan_all')->with($data);
    }
    
    public function data_artikel(){
        $data['semua_artikel'] = \App\Artikel::all();
        return view('admin_tool/data_artikel_all')->with($data);
    }
    
    public function data_user(){
        $data['semua_user'] = \App\User::all();
        return view('admin_tool/data_user')->with($data);
    }
    
    public function riwayat_laporan(){
        $data['laporan_resep']= \App\LaporPost::where('id_artikel',null)->get();
        $data['laporan_artikel'] = \App\LaporPost::where('id_tutorial',null)->get();
        return view('admin_tool/riwayat_laporan')->with($data);
    }

    public function hapusMasakan(Request $request){
        $deleteMasakan=$request->input('konfirmasiDelete');
        $result = \App\Post::where('id_tutorial', $deleteMasakan)->first();
        $result2 = \App\BlockPost::where('id_tutorial',$deleteMasakan)->get();
        if(count($result2)>0){
            $result2 = \App\BlockPost::where('id_tutorial',$deleteMasakan)->first();
            $status2 = $result2->delete();
        }
        $status = $result->delete();

        if($status && $result2) return back()->with('success','Resep berhasil dihapus');
        else back()->with('error','Resep gagal dihapus');
    }

    public function blockMasakan(Request $request){
        $rules = [
            'alasan'=>'required|max:200',
            'blockKey'=>'required',
        ];
        $this->validate($request, $rules);
        $input = [];
        $input['alasan'] = $request['alasan'];
        $input['id_artikel'] = null;
        $input['id_tutorial'] = $request['blockKey'];
        $status = \App\BlockPost::create($input);
        if($status){
            $input2 = [];
            $input2['status'] = '-1';
            $result = \App\StatusPost::where('id_tutorial',$request['blockKey'])->first();
            $status2 = $result->update($input2);
            return back()->with('success','Resep berhasil diblock');
        }
    }

    public function unblockMasakan(Request $request){
        $unblock=$request->input('unblock');
        $block = \App\BlockPost::where('id_block',$unblock)->first();
        $input = [];
        $input['status'] = '1';
        $result = \App\StatusPost::where('id_tutorial',$block->id_tutorial)->first();
        $status = $result->update($input);
        if($status){
            $status2 = $block->delete();
            return back()->with('success','Resep berhasil diunblock');
        }
        
    }

    public function hapusArtikel(Request $request){
        $deleteMasakan=$request->input('konfirmasiDelete');
        $result = \App\Artikel::where('id_artikel', $deleteMasakan)->first();
        $result2 = \App\BlockPost::where('id_artikel',$deleteMasakan)->get();
        if(count($result2)>0){
            $result2 = \App\BlockPost::where('id_artikel',$deleteMasakan)->first();
            $status2 = $result2->delete();
        }
        $status = $result->delete();

        if($status && $result2) return back()->with('success','Artikel berhasil dihapus');
        else back()->with('error','Artikel gagal dihapus');
    }

    public function blockArtikel(Request $request){
        $rules = [
            'alasan'=>'required|max:200',
            'blockKey'=>'required',
        ];
        $this->validate($request, $rules);
        $input = [];
        $input['alasan'] = $request['alasan'];
        $input['id_artikel'] = $request['blockKey'];
        $input['id_tutorial'] = null;
        $status = \App\BlockPost::create($input);
        if($status){
            $input2 = [];
            $input2['status'] = '-1';
            $result = \App\StatusArtikel::where('id_artikel',$request['blockKey'])->first();
            $status2 = $result->update($input2);
            return back()->with('success','Artikel berhasil diblock');
        }
    }

    public function unblockArtikel(Request $request){
        $unblock=$request->input('unblock');
        $block = \App\BlockPost::where('id_block',$unblock)->first();
        $input = [];
        $input['status'] = '1';
        $result = \App\StatusArtikel::where('id_artikel',$block->id_artikel)->first();
        $status = $result->update($input);
        if($status){
            $status2 = $block->delete();
            return back()->with('success','Artikel berhasil diunblock');
        }
        
    }

    public function blockUser(Request $request){
        $rules = [
            'alasan'=>'required|max:200',
            'blockKey'=>'required',
        ];
        $this->validate($request, $rules);
        $input = [];
        $input['alasan'] = $request['alasan'];
        $input['username'] = $request['blockKey'];
        $status = \App\BlockUser::create($input);
        if($status){
            $input2 = [];
            $input2['status'] = '0';
            $result = \App\User::where('username',$request['blockKey'])->first();
            $status2 = $result->update($input2);
            return back()->with('success','Akun Telah Diblock!');
        }
    }

    public function unblockUser(Request $request){
        $unblock=$request->input('unblock');
        $block = \App\BlockUser::where('id_block',$unblock)->first();
        $input = [];
        $input['status'] = '1';
        $result = \App\User::where('username',$block->username)->first();
        $status = $result->update($input);
        if($status){
            $status2 = $block->delete();
            return back()->with('success','User berhasil diunblock');
        }
    }
}

