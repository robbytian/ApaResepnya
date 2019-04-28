<?php
namespace App\Http\Traits;
use App\User;
use App\DataUser;
use App\Models\SocialAccount;
use Laravel\Socialite\Contracts\User as ProviderUser;
trait SocialCheckService
{
    protected function checkUser(ProviderUser $providerUser, $provider)
    {
        $account = SocialAccount::whereProvider($provider)
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account){
            $this->updateIfExistUser($providerUser, $account->user);
            return $account->user;
        }else{
            $existEmail = DataUser::whereEmail($providerUser->getEmail())->first();
            if($existEmail){
                $this->updateIfExistUser($providerUser, $existEmail);
                $user = $existEmail;
            }else{
                $user = User::firstOrCreate([
                    'username' => $providerUser->getNickname(),
                    'level' => '2', 
                ]);
                $user = DataUser::firstOrCreate([
                    'email' => $providerUser->getEmail(),
                    'nama_lengkap' => $providerUser->getName(),
                    'no_hp' => '08123',
                    'username' => $providerUser->getNickname(),
                    'foto' => $providerUser->getAvatar(),
                    'username' => $providerUser->getName(),
                    'status' => '1',
                    'id_hint' => null ,
                    'jawab_hint' => null ,
                ]);
            }
            $account = $user->socialAccount()->create([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider,
            ]);
        }
        return $user;
    }
    // Jika emailnya pernah daftar update user where email sama dengan yang login
    private function updateIfExistUser($providerUser, $existEmail)
    {
        $existEmail->update([
            'username' => $providerUser->getNickname(),
        ]);
    }
}