<?php

namespace App\Http\Controllers\Api\Auth;

use Dingo\Api\Http\Response;
use Saritasa\LaravelControllers\Api\JWTAuthApiController;
use Saritasa\LaravelControllers\Requests\LoginRequest;
use Saritasa\LaravelControllers\Responses\AuthSuccess;
use Saritasa\Transformers\IDataTransformer;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends JWTAuthApiController
{
    /**
     * Authentication API.
     *
     * @param JWTAuth $auth Jwt guard
     * @param IDataTransformer|null $transformer
     */
    public function __construct(
        JWTAuth $auth,
        ?IDataTransformer $transformer = null
    ) {
        parent::__construct($auth, $transformer);
    }

    /**
     * Adds token
     *
     * @param LoginRequest $request
     *
     * @return Response
     */
    public function login(LoginRequest $request): Response
    {
        $credentials = $request->only(['email', 'password']);
        try {
            if (!$token = $this->jwtAuth->attempt($credentials)) {
                $this->response->errorNotFound('Invalid username or password');
            }
        } catch (JWTException $e) {
            $this->response->errorInternal('Could not create token');
        }
    }

    /**
     * Logout user.
     *
     * @return Response
     */
    public function logout(): Response
    {
        return parent::logout();
    }

    /**
     * Validate token and checks if users exists.
     * {@inheritdoc}
     *
     * @return Response
     */
    public function refreshToken(): Response
    {
        try {
            $token = $this->jwtAuth->parseToken()->refresh();
            $payload = $this->jwtAuth->setToken($token)->payload();
            if (!$this->userService->getRepository()->findWhere([User::ID => $payload->get('sub')])) {
                $this->jwtAuth->invalidate();
                $this->response->errorForbidden();
            }

            return $this->json(new AuthSuccess($token));
        } catch (JWTException $e) {
            $this->response->errorUnauthorized(trans('controllers::auth.jwt_refresh_error'));
        }
    }
}
