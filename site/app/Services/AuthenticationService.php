<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Http;

class AuthenticationService
{
    public function __construct(
        private readonly User $user
    )
    {
    }

    public function createToken(): string
    {
        $length = config('auth.token_lenght');
        $chaine = random_bytes($length / 2);

        $this->user->authentication_token = bin2hex($chaine);
        $this->user->authentication_token_generated_at = now();

        $this->user->save();

        return bin2hex($chaine);
    }

    public function checkToken(string $token): bool {
        if ($token != $this->user->authentication_token) {
            return false;
        }

        if ($this->user->authentication_token_generated_at->diffInHours(now()) >= 24) {
            return false;
        }

        return true;
    }
}
