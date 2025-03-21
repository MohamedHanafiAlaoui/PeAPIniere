<?php
namespace App\Http\Controllers;
  
use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;
  
/**
 * @OA\Tag(
 *     name="Utilisateurs",
 *     description="API pour gérer les utilisateurs"
 * )
 */
  
class UserController extends Controller
{
 

    /**
     * @OA\Post(
     *     path="/api/enregistrer",
     *     summary="Créer un nouvel utilisateur",
     *     tags={"Utilisateurs"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name","email","password"},
     *             @OA\Property(property="name", type="string", example="Jean"),
     *             @OA\Property(property="email", type="string", format="email", example="jean@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="motdepasse123")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Utilisateur créé avec succès"),
     *     @OA\Response(response=400, description="Erreur de validation")
     * )
     */



    public function register() {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);
  
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
  
        $user = new User;
        $user->name = request()->name;
        $user->email = request()->email;
        $user->password = bcrypt(request()->password);
        $user->save();
  
        return response()->json($user, 201);
    }
  
        /**
     * @OA\Post(
     *     path="/api/connexion",
     *     summary="Connexion de l'utilisateur",
     *     tags={"Utilisateurs"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email","password"},
     *             @OA\Property(property="email", type="string", format="email", example="jean@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="motdepasse123")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Connexion réussie"),
     *     @OA\Response(response=401, description="Identifiants incorrects")
     * )
     */
  

    public function login()
    {
        $credentials = request(['email', 'password']);
  
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
  
        return $this->respondWithToken($token);
    }
  
        /**
     * @OA\Get(
     *     path="/api/moi",
     *     summary="Obtenir les informations de l'utilisateur connecté",
     *     tags={"Utilisateurs"},
     *     @OA\Response(response=200, description="Opération réussie")
     * )
     */
    public function me()
    {
        return response()->json(auth()->user());
    }
  
        /**
     * @OA\Post(
     *     path="/api/deconnexion",
     *     summary="Déconnexion de l'utilisateur",
     *     tags={"Utilisateurs"},
     *     @OA\Response(response=200, description="Déconnexion réussie")
     * )
     */
    public function logout()
    {
        auth()->logout();
  
        return response()->json(['message' => 'Successfully logged out']);
    }
  
        /**
     * @OA\Post(
     *     path="/api/rafraichir",
     *     summary="Rafraîchir le token d'accès",
     *     tags={"Utilisateurs"},
     *     @OA\Response(response=200, description="Token mis à jour avec succès")
     * )
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
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
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
