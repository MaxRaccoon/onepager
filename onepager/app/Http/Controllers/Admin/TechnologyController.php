<?php
/**
 * Created by PhpStorm.
 * User: Raccoon
 * Date: 01.10.17
 * Time: 23:11
 */
namespace App\Http\Controllers\Admin;

use App\Technology;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TechnologyController extends Controller
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
        return view('admin.technologies', []);
    }

    /**
     * Массив данных
     * @return mixed
     */
    public function getList()
    {
        return response()->json(Technology::orderBy('id', 'asc')->get());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOne($id)
    {
        return response()->json(Technology::find($id));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request, $id = null)
    {
        if (is_null($id)) {
            $technology = new Technology;
            $technology->created_at = new \DateTime();
        } else {
            $technology = Technology::find($id);
        }
        if (!$technology) {
            return response()->json(['success'=>'false', 'Позиция не найдена']);
        }

        $technology->title = $request->input('title');
        $technology->description = $request->input('description');
        $technology->updated_at = new \DateTime();

        $technology->save();
        return response()->json(['success'=>'true', 'technology'=>$technology]);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy(Request $request, $id) {
        if ($technology = Technology::find($id)) {
            $technology->delete();
        }
        return response()->json(['success'=>'true']);
    }
}