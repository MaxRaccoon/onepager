<?php
/**
 * Created by PhpStorm.
 * User: Raccoon
 * Date: 28.09.17
 * Time: 9:28
 */
namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    use ResetsPasswords;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('login');
    }

    /**
     * Страница списка пользователей
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.users', []);
    }

    /**
     * Массив пользователей
     * @return mixed
     */
    public function getList()
    {
        return response()->json(User::orderBy('id', 'asc')->get());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOne($id)
    {
        return response()->json(User::find($id));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request, $id = null)
    {
        if (is_null($id)) {
            $user = new User;
            $user->created_at = new \DateTime();
        } else {
            $user = User::find($id);
        }
        if (!$user) {
            return response()->json(['success'=>'false', 'Пользователь не найден']);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->updated_at = new \DateTime();

        if (!empty($request->input('password')) && !empty($request->input('password_confirmation'))) {
            if ($request->input('password') == $request->input('password_confirmation')) {
                $user->password = bcrypt($request->input('password'));
            }
        }

        $user->save();
        return response()->json(['success'=>'true', 'user'=>$user]);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy(Request $request, $id) {
        if ($user = User::find($id)) {
            $user->delete();
        }
        return response()->json(['success'=>'true']);
    }
}