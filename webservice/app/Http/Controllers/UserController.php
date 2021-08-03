<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function register(UserRequest $request)
    {

        try {
            DB::beginTransaction();
            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => bcrypt($request->password),
            ]);

            $user->person()->create($request->all());
            $user->person;
            $user->token = $user->createToken($user->email)->accessToken;

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Registro realizado com sucesso!',
                'user' => $user,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Erro ao realizar registro!',
                'errors' => $e->getPrevious(),
            ], 405);
        }
    }

    public function destroy(Request $request, $id)
    {
        $user = $this->user->find($id);
        if ($user === null) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. Usuário não localizado'], 404);
        }
        try {
            DB::beginTransaction();
            $user->delete();
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Usuário excluído com sucesso!',
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Erro ao realizar registro!',
                'errors' => $e->getPrevious(),
            ], 405);
        }
    }

    public function update(UserRequest $request)
    {
        $data = $request->all();
        $user = $request->user();
        if (!$data['password']) {
        }

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else{
            unset($data['password']);
        }

        $person = $user->person;
        $person->fill($data);

        try {
            DB::beginTransaction();
            $user->save($data);
            $person->save();
            $user->token = $user->createToken($user->email)->accessToken;
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Atualização profile realizada com sucesso!',
                'user' => $user
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Erro ao realizado atualização profile!',
                'errors' => $e->getPrevious(),
            ], 405);
        }
    }






    /********************************************************************************************************************** */






    public function friends($id, Request $request)
    {
        $userLogged = $request->user();
        $userPage = User::find($id);
        $followers = $userPage->followers;

        if ($userLogged->id === $userPage->id) {
            $userPage = null;
        }

        return response()->json([
            'status' => true,
            'message' => 'Amigos seguidos!',
            'friendsPage' => $userPage ? $userPage->friends : [],
            'friendsProfile' => $userPage ? ($userLogged->friends()->find($userPage->id) ? true : false) : $userLogged->friends,
            'followers' => $followers,
        ], 201);
    }

    public function follow(Request $request)
    {
        $data = $request->all();
        $user = $request->user();
        $friend = User::find($data['id']);;
        if (!$friend) {
            return response()->json([
                'status' => false,
                'message' => 'Amigo não localizado!',
                'errors' => [],
            ], 201);
        }
        if ($user->id === $friend->id) {
            return response()->json([
                'status' => false,
                'message' => 'Usuário logado não pode seguir ele mesmo!',
                'errors' => [],
            ], 201);
        }
        try {
            $user->friends()->toggle($friend->id);
            return response()->json([
                'status' => true,
                'message' => 'Seguindo amigo!',
                'following' => $user->friends()->find($friend->id) ? true : false,
                'followers' => $friend->followers,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Erro ao seguir amigo!',
                'errors' => $e->getPrevious(),
            ], 201);
        }
    }


}
