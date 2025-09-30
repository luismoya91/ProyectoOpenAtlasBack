<?php declare(strict_types=1);
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
   
class AuthController extends Controller
{
   

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
   
        if ($validator->fails()) {
            return response(['error' => $validator->errors()] , 422);
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] =  $user->name;
        $success['message'] = 'User created successfully.';
   
        return response($success,200);
    }

    public function login(Request $request)
    {
        if (Auth::attempt([
                'email' => $request->email, 
                'password' => $request->password
            ])) { 
            $authUser = Auth::user(); 
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken; 
            $success['name'] =  $authUser->name;
            $success['message'] = 'User signed in';
            
            return response($success, 200);
        } else { 
            return response(['error' => 'Invalid credentials'], 401);
        } 
    }
}
