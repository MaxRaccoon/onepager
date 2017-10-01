<?php
/**
 * Created by PhpStorm.
 * User: Raccoon
 * Date: 01.10.17
 * Time: 18:36
 */
namespace App\Http\Controllers\Admin;

use App\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('login');
    }

    /**
     * Страница списка
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.menus', []);
    }

    /**
     * Массив данных
     * @return mixed
     */
    public function getList()
    {
        return response()->json(Menu::orderBy('id', 'asc')->get());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOne($id)
    {
        return response()->json(Menu::find($id));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request, $id = null)
    {
        if (is_null($id)) {
            $user = new Menu;
            $user->created_at = new \DateTime();
        } else {
            $user = Menu::find($id);
        }
        if (!$user) {
            return response()->json(['success'=>'false', 'Позиция не найдена']);
        }

        $user->url = $request->input('url');
        $user->title = $request->input('title');
        $user->updated_at = new \DateTime();

        $user->save();
        return response()->json(['success'=>'true', 'user'=>$user]);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy(Request $request, $id) {
        if ($user = Menu::find($id)) {
            $user->delete();
        }
        return response()->json(['success'=>'true']);
    }
}