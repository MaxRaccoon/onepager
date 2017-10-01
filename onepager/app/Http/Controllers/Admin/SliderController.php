<?php
/**
 * Created by PhpStorm.
 * User: Raccoon
 * Date: 01.10.17
 * Time: 18:36
 */
namespace App\Http\Controllers\Admin;

use App\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
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
        return view('admin.sliders', []);
    }

    /**
     * Массив данных
     * @return mixed
     */
    public function getList()
    {
        return response()->json(Slider::orderBy('id', 'asc')->get());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOne($id)
    {
        return response()->json(Slider::find($id));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request, $id = null)
    {
        if (is_null($id)) {
            $slider = new Slider;
            $slider->created_at = new \DateTime();
        } else {
            $slider = Slider::find($id);
        }
        if (!$slider) {
            return response()->json(['success'=>'false', 'Позиция не найдена']);
        }

        $slider->image = $request->input('image');
        $slider->title = $request->input('title');
        $slider->image_thumb = $request->input('image_thumb');
        $slider->updated_at = new \DateTime();

        $slider->save();
        return response()->json(['success'=>'true', 'slider'=>$slider]);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy(Request $request, $id) {
        if ($user = Slider::find($id)) {
            $user->delete();
        }
        return response()->json(['success'=>'true']);
    }
}