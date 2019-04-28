<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function profile(){
        $profile = \App\DataUser::where('username',Auth::User()->username)->first();
        $data['data_profile'] = \App\DataUser::where('username',Auth::User()->username)->first();
        $data['data_masakan'] = \App\Post::where('id_data_user',$profile->id_data_user)->where('id_category','2')->get();
        $data['data_minuman'] = \App\Post::where('id_data_user',$profile->id_data_user)->where('id_category','1')->get();
        $data['data_cemilan'] = \App\Post::where('id_data_user',$profile->id_data_user)->where('id_category','3')->get();
        $data['data_artikel'] = \App\Artikel::where('id_data_user',$profile->id_data_user)->get();
        
        return view('profile/profile')->with($data);
    }

    public function ubah_profile(){
        $data['profile'] = \App\DataUser::where('username',Auth::User()->username)->first();
        $profile =  \App\DataUser::where('username',Auth::User()->username)->first();
   
        $data['data_hint'] = \App\dataHint::all();
        return view('profile/ubah_profile')->with($data);
    }

    public function update_profile(Request $request){
        $rules = [
            'nama' => 'required',
            'username' =>'required',
            'telp' =>'required',
            'email' =>'required',
            'jenkel',
            'id_hint',
            'jawab_hint',
            'foto'=>'image',
        ];
        $this->validate($request, $rules);
        $input = [];
        if(!empty($request['foto'])){
            $file = $request->file('foto');
            $input['nama_lengkap'] = $request['nama'];
            $input['email'] = $request['email'];
            $input['no_hp'] = $request['telp'];
            
            if(!empty($request['jenkel'])){
                $input['jenkel'] = $request['jenkel'];
            }

            $input['foto'] = $file->getClientOriginalName();
            $file->move('assets/images/icon/', $file->getClientOriginalName());
            $input['username'] = $request['username'];
            
            if(!empty($request['id_hint'])){
                $input['id_hint'] = $request['id_hint'];
            }
            if(!empty($request['jawab_hint'])){
                if(!empty($request['id_hint'])){
                    $input['jawab_hint'] = $request['jawab_hint'];
                }
                else{
                    return redirect('ubah_profile')->with('success','Pilih dulu pertanyaan Hint');
                }
            }
            $result = \App\DataUser::where('username',Auth::User()->username)->first();
            $status = $result->update($input);
            if($status)
            return redirect('profile')->with('success','Data Berhasil Diubah');
            else 
            return redirect('ubah_profile')->with('error','Data Gagal Diubah');
        }

        else{
            $input['nama_lengkap'] = $request['nama'];
            $input['username'] = $request['username'];
            $input['email'] = $request['email'];
            $input['no_hp'] = $request['telp'];
            if(!empty($request['jenkel'])){
                $input['jenkel'] = $request['jenkel'];
            }
            if(!empty($request['id_hint'])){
                $input['id_hint'] = $request['id_hint'];
            }
            if(!empty($request['jawab_hint'])){
                if(!empty($request['id_hint'])){
                    $input['jawab_hint'] = $request['jawab_hint'];
                }
                else{
                    return redirect('ubah_profile')->with('error','Pilih dulu pertanyaan Hint');
                }
            }
            $result = \App\DataUser::where('username',Auth::User()->username)->first();
            $status = $result->update($input);
            if($status) return redirect('profile')->with('success','Data Berhasil Diubah');
            else return redirect('ubah_profile')->with('error','Data Gagal Diubah');
        }
    }

    public function ubah_password(){
        return view('profile/ubah_password');
    }

    public function update_password(Request $request){
        $rules = [
            'password_lama' => 'required',
            'password' =>'required',
            'password2' =>'required',
        ];
        $this->validate($request, $rules);
        $user = \App\changePassword::where('username',Auth::User()->username)->first();
        if(Hash::check($request['password_lama'], $user->password)){
            if($request['password'] == $request['password2']){
                $input = [];
                $input['password'] = $request['password'];
                $status = $user->update($input);
                return redirect('ubah_password')->with('success','Password Berhasil Diubah');
            }
            else{
                return redirect('ubah_password')->with('error','Password Pertama dan Kedua Tidak Sama!');    
            }

        }
        else{
            return redirect('ubah_password')->with('error','Password Lama Salah!');
        }
    }
    
}
