<?php

namespace App\Modules\Authentication\Domain\Services\Auth;

use Illuminate\Support\Facades\Hash;
use App\Enum\RoleEnum;
use App\Service\Agent\AgentService;
use Illuminate\Database\Eloquent\Model;

class AuthService
{
  /*
    This method works to register Admin and User and other different roles
  */
  public function registerWithPassword(string $email, string $userName, string $password, string $role): Model
  {
    $modelClass = RoleEnum::from($role)->resolve(); // gets role string and returns model class

    $createdRoleModel = $modelClass::create([
      'user_name' => $userName,
      'email' => $email,
      'password' => Hash::make($password)
    ]);

    return $createdRoleModel;
  }

  public function registerWithPhone(string $phone, string $role): Model
  {
    $modelClass = RoleEnum::from($role)->resolve();

    $createdRoleModel = $modelClass::create([
      'phone' => $phone
    ]); 

    return $createdRoleModel;
  }

  public function loginWithPassword(string $userName, string $password, string $role): bool
  {
    $modelClass = RoleEnum::from($role)->resolve();
    $modelClass::where(['userName' => $userName, 'password' => Hash::make($password)])->first();

    if (!$modelClass) {
      return false;
    }

    return true;
  }

  public function loginWithPhone(string $phone, string $code, string $role): bool|Model
  {
    $modelClass = RoleEnum::from($role)->resolve();
    $foundedRole = $modelClass::where('phone', $phone)->first();

    if (!$foundedRole) {
      return false;
    }

    if ($foundedRole->code == $code) {
      return $foundedRole;
    }

    return false;
  }

  public function createToken(Model $model)
  {
    $token = $model->createToken('auth token');

    return $token;
  }

  public function addAgent($token): bool
  {
    $agentService = new AgentService();
    $agent = $agentService->getAgent();

    $token->accessToken->forceFill([
        'device_name'      => $agent->device(),
        'platform'         => $agent->platform(),
        'platform_version' => $agent->version($agent->platform()),
        'browser'          => $agent->browser(),
        'browser_version'  => $agent->version($agent->browser()),
        'is_mobile'        => $agent->isMobile(),
        'ip'               => $agent->ip(),
        'last_used_at'     => $agent->last_used_at(),
    ])->save();

    return true;
  }

  public function sendCode(string $phone, string $role): bool
  {
    $code = rand(1000, 9999);

    $modelClass = RoleEnum::from($role)->resolve();
    $foundedRole = $modelClass::where('phone', $phone)->first();

    if (!$foundedRole) {
      $foundedRole = $modelClass::create([
        'phone' => $phone
      ]);
    }

    $foundedRole->update([
      'code' => $code
    ]);

    // send code to user via sms

    return true;
  }
}