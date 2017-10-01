<?php
/**
 * Created by PhpStorm.
 * User: Raccoon
 * Date: 01.10.17
 * Time: 12:43
 */
namespace App\Http\Controllers\Admin;

use App\LandingData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('login');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.landing', []);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData()
    {
        return response()->json(LandingData::orderBy('id', 'asc')->get());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOne($id)
    {
        return response()->json(LandingData::find($id));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request, $id = null)
    {
        if (is_null($id)) {
            $landingData = new LandingData;
            $landingData->created_at = new \DateTime();
        } else {
            $landingData = LandingData::find($id);
        }
        if (!$landingData) {
            return response()->json(['success'=>'false', 'Данные не найдены']);
        }

        $landingData->key_name = $request->input('key_name');
        $landingData->description = $request->input('description');
        $landingData->key_value = $request->input('key_value');
        $landingData->updated_at = new \DateTime();

        $landingData->save();
        return response()->json(['success'=>'true', 'data'=>$landingData]);
    }

}