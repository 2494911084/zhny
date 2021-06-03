<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-09 12:09:28
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-14 11:04:18
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\app\Http\Controllers\AuthController.php
 */

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','refresh']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['username', 'password']);
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        try {
            return $this->respondWithToken(auth()->refresh());
        } catch (\Throwable $th) {
            return response()->json(['code'=>401,'error'=>'刷新失败，重新登录'])->setStatusCode(401);
        }
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'refresh_ttl' => config('jwt.refresh_ttl') * 60,
        ]);
    }
    // public function tokenValidator($request,$jwt){
    //     #检测request中header头是否带了token

    //     if(is_null($token = \request() ->header('authorization'))){
    //     $this->response(400,'Authorization Failed，未携带Authorization');

    //     }

    //     #提取token中用户数据

    //     try{
    //     $user = $jwt->parseToken()->toUser()->toArray();

    //     if(! $user){
    //     $this->response(200,'用户不存在','');

    //     }

    //     }catch (TokenExpiredException $exception){
    //     #异常处理 token过有效期,进行刷新

    //     try{
    //         $token = $jwt->refresh();

    //         $access_token = 'Bearer'.$token;

    //         $request->headers->set('Authorization',$access_token);

    //         }catch(JWTException $exception){
    //         #refresh 也过期,重新登录

    //         $this->response(400,'Authorization过期，重新登录');

    //         }

    //     }

    // }
}
