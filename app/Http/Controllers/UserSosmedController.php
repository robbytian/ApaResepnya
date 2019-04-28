<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\DataUser;
use App\UserSosmed;
use Illuminate\Http\Request;
use Google_Service_People;
use Validator;
use Illuminate\Support\Facades\Hash;

class UserSosmedController extends Controller
{
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
            $status = \App\User::create($input);

            if($status){
                $input2=[];
                $input2['nama_lengkap'] = $request['nama'];
                $input2['email'] = $request['email'];
                $input2['no_hp'] = $request['telp']; 
                $input2['foto']=null;
                $input2['username'] = $request['username'];
                $input2['status'] = '1';
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
}
