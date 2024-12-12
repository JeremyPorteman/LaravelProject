<?php

use App\Services\AuthenticationService;

test('token creation of a new user and the length of the token', function () {

    $user = \App\Models\User::factory()->create();
    $authService = new AuthenticationService($user);
    $tokenToTest = $authService->createToken();

    // vérifier qu'un token a bien été ajouté au model User
    expect($user->authentication_token)->toBeString($tokenToTest)

    // vérifier que le token est une chaine de caractères de taille 20
        ->and(checkLength($tokenToTest, 20))->toBeTrue();

});

test('token check method of the authenticationService class', function () {

    $user = \App\Models\User::factory()->create();
    $authService = new AuthenticationService($user);
    $tokenToTest = $authService->createToken();

    //first check
    expect($authService->checkToken($tokenToTest))->toBeTrue();// cas normal
    $tokenToTest = $tokenToTest . "error";
    expect($authService->checkToken($tokenToTest))->toBeFalse();// cas avec error

    //second check
    



});

function checkLength(String $token, Int $length): bool
{
    if(strlen($token) == $length) {
        return true;
    }
    return false;
}
