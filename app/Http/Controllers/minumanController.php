<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class minumanController extends Controller
{
    public function index(){
        $data['minuman'] = \App\Post::where('id_category','1')->where('status','=','1')->paginate(18);
        return view('minuman/index')->with($data);
    }

    // public function buatresep(){
    //     return view('minuman/buat_resep');
    // }

    // public function postresep(Request $request){
    //     $rules = [
    //         'judul' => 'required|max:100',
    //         'deskripsi' =>'required',
    //         'sub_category' =>'required',
    //         'cover'=>'image',
    //         'cover-link',
    //         'video'=>'mimetypes:video/mp4',
    //         'video-link',
    //         'bahan'=>'required',
    //         'langkah'=>'required',
    //         'porsi'=>'required|max:3',
    //         'waktu'=>'required|max:10',
    //     ];
    //     $user = \App\DataUser::where('username',Auth::User()->username)->first();
    //     $checkJudul = \App\Post::where('id_data_user', $user->id_data_user)->first();
    //     $this->validate($request, $rules);
    //     if(!empty($checkJudul->judul)){
    //         if($request['judul'] != $checkJudul->judul){
    //             $input = [];
    //             if(empty($request['cover']) && empty($request['cover-link'])){
    //                 return redirect('minuman/buat_resep')->with('error','Cover Tidak Boleh Kosong(Pilih 1, lewat URL atau memakai foto cover sendiri)');
    //             }
    //             if(!empty($request['cover']) && !empty($request['cover-link'])){
    //                 return redirect('minuman/buat_resep')->with('error','Hanya Bisa memasukan 1 cover!(Pilih 1, lewat URL atau memakai foto cover sendiri)');
    //             }
    //             if(!empty($request['cover']) && empty($request['cover-link'])){
    //                 $photo = $request['cover'];
    //                 $filename = $photo->store('assets/images/thumbnail');
    //                 $photo->move('assets/images/thumbnail', substr($filename, 11, strlen($filename)-1));
    //                 $input['thumbnail'] = $filename;
                
    //             }
    //             if(empty($request['cover']) && !empty($request['cover-link'])){
    //                 $input['thumbnail'] = $request['cover-link'];
    //                 if (empty(GetImageSize($request['cover-link']))) {
    //                     return redirect('minuman/buat_resep')->with('error','URL yang anda masukan pada Cover bukanlah sebuah gambar!');
    //                 }
    //             }

    //             if(!empty($request['video']) && !empty($request['video-link'])){
    //                 return redirect('minuman/buat_resep')->with('error','Hanya Bisa memasukan 1 video!(Pilih 1, lewat URL atau memakai video sendiri)');
    //             }
    //             if(!empty($request['video']) && empty($request['video-link'])){
    //                 $video = $request['video'];
    //                 $filename = $video->store('assets/images/video');
    //                 $video->move('assets/images/video', substr($filename, 11, strlen($filename)-1));
    //                 $input['video_header'] = $filename;
    //             }
    //             if(empty($request['video']) && !empty($request['video-link'])){
    //                 if(substr($request['video-link'],0,32) == 'https://www.youtube.com/watch?v=' || substr($request['video-link'],0,24) == 'www.youtube.com/watch?v='){
    //                     if(substr($request['video-link'],0,4) == 'www.'){
    //                         $input['video_header'] = substr($request['video-link'],24);
    //                     }
    //                     if(substr($request['video-link'],0,4) == 'http'){
    //                         $input['video_header'] = substr($request['video-link'],32);
    //                     }
    //                 }
    //                 else{
    //                     return back()->with('error','Format Url Salah!');
    //                 }
    //             }
                    
    //                 $input['judul'] = $request['judul'];
    //                 $input['deskripsi'] = $request['deskripsi'];
    //                 $input['porsi'] = $request['porsi'];
    //                 $input['waktu_masak'] = $request['waktu'];
    //                 $input['id_category'] = '1';
    //                 $input['id_sub_post'] = $request['sub_category'];
    //                 $input['id_data_user'] = $user->id_data_user;
    //                 $input['status'] = '1';

    //                 $status = \App\Post::create($input);

    //                 if($status){
    //                     $tutorial = \App\Post::where('id_data_user',$user->id_data_user)->where('judul',$request['judul'])->where('deskripsi',$request['deskripsi'])->first();
    //                     $input = [];
    //                     $input2 = [];
    //                     foreach($request->langkah as $row){
    //                         $input['langkah'] = $row;
    //                         $input['id_tutorial'] = $tutorial->id_tutorial;
    //                         $status = \App\LangkahTutorial::create($input);
    //                     }
    //                     foreach($request->bahan as $row){
    //                         $input['bahan'] = $row;
    //                         $input['id_tutorial'] = $tutorial->id_tutorial;
    //                         $status = \App\BahanTutorial::create($input);
    //                     }
                        
    //                     return redirect('data_minuman')->with('success','Resep Berhasil Dibuat');
    //                 }
    //                 else{
    //                     return redirect('minuman/buat_resep')->with('error','Data Gagal Dibuat');
    //                 }
    //             }
            
    //         else{
    //             return redirect('minuman/buat_resep')->with('error','Judul jangan sama dengan Post yang sudah anda upload!');
    //         }
    //     }
    //     else{
    //         $input = [];
    //             if(empty($request['cover']) && empty($request['cover-link'])){
    //                 return redirect('minuman/buat_resep')->with('error','Cover Tidak Boleh Kosong(Pilih 1, lewat URL atau memakai foto cover sendiri)');
    //             }
    //             if(!empty($request['cover']) && !empty($request['cover-link'])){
    //                 return redirect('minuman/buat_resep')->with('error','Hanya Bisa memasukan 1 cover!(Pilih 1, lewat URL atau memakai foto cover sendiri)');
    //             }
    //             if(!empty($request['cover']) && empty($request['cover-link'])){
    //                 $photo = $request['cover'];
    //                 $filename = $photo->store('assets/images/thumbnail');
    //                 $photo->move('assets/images/thumbnail', substr($filename, 11, strlen($filename)-1));
    //                 $input['thumbnail'] = $filename;
                
    //             }
    //             if(empty($request['cover']) && !empty($request['cover-link'])){
    //                 $input['thumbnail'] = $request['cover-link'];
    //                 if (empty(GetImageSize($request['cover-link']))) {
    //                     return redirect('minuman/buat_resep')->with('error','URL yang anda masukan pada Cover bukanlah sebuah gambar!');
    //                 }
    //             }

    //             if(!empty($request['video']) && !empty($request['video-link'])){
    //                 return redirect('minuman/buat_resep')->with('error','Hanya Bisa memasukan 1 video!(Pilih 1, lewat URL atau memakai video sendiri)');
    //             }
    //             if(!empty($request['video']) && empty($request['video-link'])){
    //                 $video = $request['video'];
    //                 $filename = $video->store('assets/images/video');
    //                 $video->move('assets/images/video', substr($filename, 11, strlen($filename)-1));
    //                 $input['video_header'] = $filename;
    //             }
    //             if(empty($request['video']) && !empty($request['video-link'])){
    //                 if(substr($request['video-link'],0,32) == 'https://www.youtube.com/watch?v=' || substr($request['video-link'],0,24) == 'www.youtube.com/watch?v='){
    //                     if(substr($request['video-link'],0,4) == 'www.'){
    //                         $input['video_header'] = substr($request['video-link'],24);
    //                     }
    //                     if(substr($request['video-link'],0,4) == 'http'){
    //                         $input['video_header'] = substr($request['video-link'],32);
    //                     }
    //                 }
    //                 else{
    //                     return back()->with('error','Format Url Salah!');
    //                 }
    //             }
                    
    //                 $input['judul'] = $request['judul'];
    //                 $input['deskripsi'] = $request['deskripsi'];
    //                 $input['porsi'] = $request['porsi'];
    //                 $input['waktu_masak'] = $request['waktu'];
    //                 $input['id_category'] = '1';
    //                 $input['id_sub_post'] = $request['sub_category'];
    //                 $input['id_data_user'] = $user->id_data_user;
    //                 $input['status'] = '1';

    //                 $status = \App\Post::create($input);

    //                 if($status){
    //                     $tutorial = \App\Post::where('id_data_user',$user->id_data_user)->where('judul',$request['judul'])->where('deskripsi',$request['deskripsi'])->first();
    //                     $input = [];
    //                     $input2 = [];
    //                     foreach($request->langkah as $row){
    //                         $input['langkah'] = $row;
    //                         $input['id_tutorial'] = $tutorial->id_tutorial;
    //                         $status = \App\LangkahTutorial::create($input);
    //                     }
    //                     foreach($request->bahan as $row){
    //                         $input['bahan'] = $row;
    //                         $input['id_tutorial'] = $tutorial->id_tutorial;
    //                         $status = \App\BahanTutorial::create($input);
    //                     }
                        
    //                     return redirect('data_minuman')->with('success','Resep Berhasil Dibuat');
    //                 }
    //                 else{
    //                     return redirect('minuman/buat_resep')->with('error','Resep Gagal Dibuat');
    //                 }
    //     }
    // }
    public function destroy(Request $request){
        $deleteMinuman=$request->input('konfirmasiDelete');
        $result = \App\Post::where('id_tutorial', $deleteMinuman)->first();
        $status = $result->delete();

        if($status) return redirect('data_minuman')->with('success','Resep berhasil dihapus');
        else return redirect('data_minuman')->with('error','Resep gagal dihapus');
      }

    public function filter(Request $request){
           
        $filter = $request->get('filter');
        $data['filter']= $filter;
        if($filter == 'top'){
        $data['minuman_filter'] = \App\Post::where('id_category','1')->where('status','=','1')->orderBy('created_at','DESC')->paginate(18);
        }
        if($filter == 'terbaru'){
        $data['minuman_filter'] = \App\Post::where('id_category','1')->where('status','=','1')->orderBy('created_at','DESC')->paginate(18);
        }
        if($filter == 'populer'){
        $data['minuman_filter'] = \App\Post::where('id_category','1')->where('status','=','1')->orderBy('created_at','DESC')->paginate(18);
        }

        $category = \App\SubCategory::where('id_category',1)->get();
        foreach($category as $row){
            if($filter == $row->nama){
                $data['minuman_filter'] = \App\Post::where('id_sub_post',$row->id_sub_post)->where('status','=','1')->paginate(18);
            }
        }
        return view('minuman/result')->with($data);
    }
}
