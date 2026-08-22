<?php

namespace App\Modules\Authentication\Presentation\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Authentication\Domain\Services\Auth\AuthService;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class AuthController extends Controller
{

    public function __construct(private AuthService $authService)
    {

    }

    #[OA\Post(
        path: '/auth/send-code',
        summary: 'Send code to user',
        description: 'Send code to user',
        tags: ['Authentication'],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['phone'],
                properties: [
                    new OA\Property(
                        property: 'phone',
                        type: 'string',
                        example: '09123456789'
                    ),
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: 'send code'
            ),
            new OA\Response(
                response: 401,
                description: 'error'
            )
        ]
    )]
    public function sendCode(Request $request)
    {
        $res = $this->authService->sendCode($request->phone, 'user');

        if (!$res) {
            return error('error');
        }

        return success('send code');
    }

    #[OA\Post(
        path: '/auth/login',
        summary: 'login user',
        description: 'Login user and return token',
        tags: ['Authentication'],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['phone', 'code'],
                properties: [
                    new OA\Property(
                        property: 'phone',
                        type: 'string',
                        example: '09123456789'
                    ),
                    new OA\Property(
                        property: 'code',
                        type: 'string',
                        example: '1234'
                    ),
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: 'login'
            ),
            new OA\Response(
                response: 401,
                description: 'Error'
            )
        ]
    )]
    public function login(Request $request)
    {
        $res = $this->authService->loginWithPhone($request->phone, $request->code, 'user');

        if (!$res) {
            error('Error');
        }

        $token = $this->authService->createToken($res);
        // $this->authService->addAgent($token);
        
        return success('login', [
            'token' => $token
        ]);
    }
}