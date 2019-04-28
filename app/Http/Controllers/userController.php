<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{

    public function indexRegister(){
        return view('auth/register');
    }

    public function register(Request $request){
        
        $rules = [
            'nama' => 'required|max:50',
            'telp' =>'required|max:13',
            'email' =>'required|max:30',
            'username' =>'required|max:25|unique:users',
            'password' => 'required|max:100',
            'password2'=>'required|max:100',
        ];
        $this->validate($request, $rules);
        
        if($request['password'] == $request['password2']){
            $input = [];
            $input['username'] = $request['username'];
            $input['password'] = Hash::make($request['password']);
            $input['level'] = '2';
            $input['status'] = '1';
            $status = \App\User::create($input);

            if($status){
                $input2=[];
                $input2['nama_lengkap'] = $request['nama'];
                $input2['email'] = $request['email'];
                $input2['no_hp'] = $request['telp']; 
                $input2['foto']=null;
                $input2['username'] = $request['username'];
                $input2['id_hint']=null;
                $input2['jawab_hint']=null;
                $status2 = \App\DataUser::create($input2);
                return redirect('register')->with('success2','User Berhasil Dibuat, <a href="login" class="alert-link">Login Disini</a>');
            }
            else{
                return redirect('register')->with('error','User Gagal Dibuat')->withInput();
            }
        }

        else{
            return redirect('register')->with('error','Password dan Password Konfirmasi Harus Sama!')->withInput();
        }
    }

    public function forgot(){
            return view('auth/forgotpass');
    }

    public function forgot2(Request $request){
        $username = $request->get('username');
        $email = $request->get('email');
        $data['data_hint'] = \App\dataHint::all();
        $data['profile'] = \App\DataUser::where('username',$username)->first();
        $check_user = \App\DataUser::where('username',$username)->where('email',$email)->get();
        if($check_user->count('id_data_user') > 0){
            return view('auth/forgotpass2',compact('username','email'))->with($data);
        }
        else{
            return back()->with('error','Data Tidak Diteukan');
        }  
    }   

    public function forgot3(Request $request){
        
        $username = $request->get('username');
        $email = $request->get('email');
        $id_hint = $request->get('id_hint');
        $jawab_hint = $request->get('jawab_hint');
        $check_user = \App\DataUser::where('username',$username)->where('email',$email)->first();
        if(empty($check_user->id_hint) || empty($check_user->jawab_hint)){
            return back()->with('error','Akun ini belum memilih hint');
        }
        else{
            if($check_user->id_hint  == $id_hint  && $check_user->jawab_hint == $jawab_hint){
                return view('auth/forgotpass3',compact('username','email','id_hint','jawab_hint '));
            }
            else{
                return view('auth/forgotpass')->with('error','Hint Salah');
            }  
        }
    }  
    
    public function forgot4(Request $request){
        $username = $request->get('username');
        $email = $request->get('email');
        $check_user = \App\User::where('username',$username)->first();
        if($request['password'] == $request['confirm_password']){
            $password = Hash::make($request['password']);
            $input = [];
            $input['password'] = $password;
            $status = $check_user->update($input);
            return redirect('login')->with('success','Password berhasil diubah');
        }
        else{
            return redirect('login')->with('error','gagal diubah');
        }
    }
}

