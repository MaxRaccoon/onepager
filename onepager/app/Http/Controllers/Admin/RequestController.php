<?php
namespace App\Http\Controllers\Admin;

use App\Request AS RequestEntity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
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
        return view('admin.requests', []);
    }

    /**
     * Массив данных
     * @return mixed
     */
    public function getList()
    {
        return response()->json(RequestEntity::orderBy('id', 'desc')->get());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOne($id)
    {
        return response()->json(RequestEntity::find($id));
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy(Request $request, $id) {
        if ($technology = RequestEntity::find($id)) {
            $technology->delete();
        }
        return response()->json(['success'=>'true']);
    }
}