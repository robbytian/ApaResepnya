<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
class BuatResepController extends Controller
{
    public function buatresep($category, Request $request){
        $data['check'] = $category;
            if( $request->path() == 'buat_resep/masakan'){
                $data['sub_category'] = \App\SubCategory::where('id_category','2')->get();
            }
            if( $request->path() == 'buat_resep/minuman'){
                $data['sub_category'] = \App\SubCategory::where('id_category','1')->get();
            }
            if( $request->path() == 'buat_resep/cemilan'){
                $data['sub_category'] = \App\SubCategory::where('id_category','3')->get();
            }
            return view('buat_resep/buat_resep')->with($data);
    }

    public function postresep(Request $request){
        $rules = [
            'judul' => 'required|max:100',
            'deskripsi' =>'required',
            'sub_category' =>'required',
            'cover'=>'image|max:10000',
            'cover-link',
            'video'=>'mimetypes:video/mp4|max:100000',
            'video-link',
            'bahan'=>'required',
            'langkah'=>'required',
            'porsi'=>'required|max:3',
            'waktu'=>'required|max:10',
        ];
        
        $user = \App\DataUser::where('username',Auth::User()->username)->first();
        $checkJudul = \App\Post::where('id_data_user', $user->id_data_user)->first();
        $this->validate($request, $rules);
        if(!empty($checkJudul->judul)){
            if($request['judul'] != $checkJudul->judul){
                $input = [];
                if(empty($request['cover']) && empty($request['cover-link'])){
                    return back()->with('error','Cover Tidak Boleh Kosong(Pilih 1, lewat URL atau memakai foto cover sendiri)')->withInput();
                }
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
                        return back()->with('error','URL yang anda masukan pada Cover bukanlah sebuah gambar!')->withInput();
                    }
                }

                if(!empty($request['video']) && !empty($request['video-link'])){
                    return back()->with('error','Hanya Bisa memasukan 1 video!(Pilih 1, lewat URL atau memakai video sendiri)')->withInput();
                }
                if(!empty($request['video']) && empty($request['video-link'])){
                    $video = $request['video'];
                    $filename = $video->store('assets/images/video');
                    $video->move('assets/images/video', substr($filename, 11, strlen($filename)-1));
                    $input['video_header'] = $filename;
                }
                if(empty($request['video']) && !empty($request['video-link'])){
                    if(substr($request['video-link'],0,32) == 'https://www.youtube.com/watch?v=' || substr($request['video-link'],0,24) == 'www.youtube.com/watch?v='){
                        if(substr($request['video-link'],0,4) == 'www.'){
                            $input['video_header'] = substr($request['video-link'],24);
                        }
                        if(substr($request['video-link'],0,4) == 'http'){
                            $input['video_header'] = substr($request['video-link'],32);
                        }
                    }
                    else{
                        return back()->with('error','Format Url Salah!')->withInput();
                    }
                }
                if(  $request->path() == 'buat_resep/masakan'){
                    $request['id_cat'] = '2';
                }
                if(  $request->path() == 'buat_resep/minuman'){
                    $request['id_cat'] = '1';
                }
                if(  $request->path() == 'buat_resep/cemilan'){
                    $request['id_cat'] = '3';
                }   
                    $input['judul'] = $request['judul'];
                    $input['deskripsi'] = $request['deskripsi'];
                    $input['porsi'] = $request['porsi'];
                    $input['waktu_masak'] = $request['waktu'];
                    $input['id_category'] = $request['id_cat'];
                    $input['id_sub_post'] = $request['sub_category'];
                    $input['id_data_user'] = $user->id_data_user;
                    $input['status'] = '1';
                
                    $status = \App\Post::create($input);

                    if($status){
                        $tutorial = \App\Post::where('id_data_user',$user->id_data_user)->where('judul',$request['judul'])->where('deskripsi',$request['deskripsi'])->first();
                        $input = [];
                        $input2 = [];
                        foreach($request->langkah as $row){
                            $input['langkah'] = $row;
                            $input['id_tutorial'] = $tutorial->id_tutorial;
                            $status2 = \App\LangkahTutorial::create($input);
                        }
                        foreach($request->bahan as $row){
                            $input2['bahan'] = $row;
                            $input2['id_tutorial'] = $tutorial->id_tutorial;
                            $status3 = \App\BahanTutorial::create($input2);
                        }
                        $view_data = \App\Post::where('judul',$request['judul'])->where('deskripsi',$request['deskripsi'])->first();
                        return redirect('detailPost/'.$view_data->id_tutorial.'')->with('success','Resep Berhasil Dibuat');
                    }
                    else{
                        return redirect('masakan/buat_resep')->with('error','Data Gagal Dibuat')->withInput();
                    }
                }
            
            else{
                return back()->with('error','Judul jangan sama dengan Post yang sudah anda upload!')->withInput();
            }
        }
        else{
            $input = [];
                if(empty($request['cover']) && empty($request['cover-link'])){
                    return back()->with('error','Cover Tidak Boleh Kosong(Pilih 1, lewat URL atau memakai foto cover sendiri)')->withInput();
                }
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
                        return back()->with('error','URL yang anda masukan pada Cover bukanlah sebuah gambar!')->withInput();
                    }
                }

                if(!empty($request['video']) && !empty($request['video-link'])){
                    return back()->with('error','Hanya Bisa memasukan 1 video!(Pilih 1, lewat URL atau memakai video sendiri)')->withInput();
                }
                if(!empty($request['video']) && empty($request['video-link'])){
                    $video = $request['video'];
                    $filename = $video->store('assets/images/video');
                    $video->move('assets/images/video', substr($filename, 11, strlen($filename)-1));
                    $input['video_header'] = $filename;
                }
                if(empty($request['video']) && !empty($request['video-link'])){
                    if(substr($request['video-link'],0,32) == 'https://www.youtube.com/watch?v=' || substr($request['video-link'],0,24) == 'www.youtube.com/watch?v='){
                        if(substr($request['video-link'],0,4) == 'www.'){
                            $input['video_header'] = substr($request['video-link'],24);
                        }
                        if(substr($request['video-link'],0,4) == 'http'){
                            $input['video_header'] = substr($request['video-link'],32);
                        }
                    }
                    else{
                        return back()->with('error','Format Url Salah!')->withInput();
                    }
                }
                if( $request->path() == 'buat_resep/masakan'){
                    $request['id_cat'] = '2';
                }
                if( $request->path() == 'buat_resep/minuman'){
                    $request['id_cat'] = '1';
                }
                if( $request->path() == 'buat_resep/cemilan'){
                    $request['id_cat'] = '3';
                }   
                    
                    $input['judul'] = $request['judul'];
                    $input['deskripsi'] = $request['deskripsi'];
                    $input['porsi'] = $request['porsi'];
                    $input['waktu_masak'] = $request['waktu'];
                    $input['id_category'] = $request['id_cat'];
                    $input['id_sub_post'] = $request['sub_category'];
                    $input['id_data_user'] = $user->id_data_user;
                    $input['status'] = '1';

                    $status = \App\Post::create($input);

                    if($status){
                        $tutorial = \App\Post::where('id_data_user',$user->id_data_user)->where('judul',$request['judul'])->where('deskripsi',$request['deskripsi'])->first();
                        $input = [];
                        $input2 = [];
                        foreach($request->langkah as $row){
                            $input['langkah'] = $row;
                            $input['id_tutorial'] = $tutorial->id_tutorial;
                            $status2 = \App\LangkahTutorial::create($input);
                        }
                        foreach($request->bahan as $row){
                            $input2['bahan'] = $row;
                            $input2['id_tutorial'] = $tutorial->id_tutorial;
                            $status3 = \App\BahanTutorial::create($input2);
                        }
                        $view_data = \App\Post::where('judul',$request['judul'])->where('deskripsi',$request['deskripsi'])->first();
                        return redirect('detailPost/'.$view_data->id_tutorial.'')->with('success','Resep Berhasil Dibuat');
                    }
                    else{
                        return back()->with('error','Data Gagal Dibuat')->withInput();
                    }
        }
    }
    public function editresep($id, Request $request){
        $data_resep = \App\Post::where('id_tutorial',$id)->first();
        $data['data_resep'] = \App\Post::where('id_tutorial',$id)->first();
        $data['sub_category'] = \App\SubCategory::where('id_category',$data_resep->id_category)->get();
        $data['langkah'] = \App\LangkahTutorial::where('id_tutorial',$data_resep->id_tutorial)->get();
        $data['bahan'] = \App\BahanTutorial::where('id_tutorial',$data_resep->id_tutorial)->get();
        return view('buat_resep/edit_resep')->with($data);
    }
    public function update_resep(Request $request,$id){
        $rules = [
                'judul' => 'required|max:100',
                'deskripsi' =>'required',
                'sub_category' =>'required',
                'cover'=>'image|max:10000',
                'cover-link',
                'video'=>'mimetypes:video/mp4|max:100000',
                'video-link',
                'bahan'=>'required',
                'langkah'=>'required',
                'porsi'=>'required|max:3',
                'waktu'=>'required|max:10',    
        ];
        $this->validate($request, $rules);
        $input = [];
        $input['judul'] = $request['judul'];
        $input['deskripsi'] = $request['deskripsi'];
        $input['id_sub_post'] = $request['sub_category'];
        $input['porsi'] = $request['porsi'];
        $input['waktu_masak'] = $request['waktu'];
        $getResep = \App\Post::where('id_tutorial',$id)->first();

 
        if(!empty($request['cover']) && !empty($request['cover-link'])){
            return back()->with('error','Hanya Bisa memasukan 1 cover!(Pilih 1, lewat URL atau memakai foto cover sendiri)');
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
                return back()->with('error','URL yang anda masukan pada Cover bukanlah sebuah gambar!');
            }
        }

        if(!empty($request['video']) && !empty($request['video-link'])){
            return back()->with('error','Hanya Bisa memasukan 1 video!(Pilih 1, lewat URL atau memakai video sendiri)')->withInput();
        }
        if(!empty($request['video']) && empty($request['video-link'])){
            $video = $request['video'];
            $filename = $video->store('assets/images/video');
            $video->move('assets/images/video', substr($filename, 11, strlen($filename)-1));
            $input['video_header'] = $filename;
        }
        if(empty($request['video']) && !empty($request['video-link'])){
            if(substr($request['video-link'],0,32) == 'https://www.youtube.com/watch?v=' || substr($request['video-link'],0,24) == 'www.youtube.com/watch?v='){
                if(substr($request['video-link'],0,4) == 'www.'){
                    $input['video_header'] = substr($request['video-link'],24);
                }
                if(substr($request['video-link'],0,4) == 'http'){
                    $input['video_header'] = substr($request['video-link'],32);
                }
            }
            else{
                return back()->with('error','Format Url Salah!')->withInput();
            }
        }
        $status = $getResep->update($input);
        
        if($status){
         $getLangkah = \App\LangkahTutorial::where('id_tutorial',$id)->delete();
   
            $input = [];
            foreach($request->langkah as $row){
                $input['langkah'] = $row;
                $input['id_tutorial'] = $id;
                $status2 = \App\LangkahTutorial::create($input);
            }
        $getBahan = \App\BahanTutorial::where('id_tutorial',$id)->delete();
            $input2 = [];
            foreach($request->bahan as $row){
                $input2['bahan'] = $row;
                $input2['id_tutorial'] = $id;
                $status3 = \App\BahanTutorial::create($input2);
            }
            
            return redirect('detailPost/'.$id.'')->with('success','Resep Berhasil Diubah');
        }
        else{
            return back()->with('error','Data Gagal Dibuat')->withInput();
        }
    }
}
