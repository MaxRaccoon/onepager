<?php
/**
 * Created by PhpStorm.
 * User: Raccoon
 * Date: 01.10.17
 * Time: 18:36
 */
namespace App\Http\Controllers\Admin;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        return view('admin.products', []);
    }

    /**
     * Массив данных
     * @return mixed
     */
    public function getList()
    {
        return response()->json(Product::orderBy('id', 'asc')->get());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOne($id)
    {
        return response()->json(Product::find($id));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request, $id = null)
    {
        if (is_null($id)) {
            $product = new Product;
            $product->created_at = new \DateTime();
        } else {
            $product = Product::find($id);
        }
        if (!$product) {
            return response()->json(['success'=>'false', 'Позиция не найдена']);
        }

        $product->image = $request->input('image');
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->image_thumb = $request->input('image_thumb');
        $product->updated_at = new \DateTime();

        $product->save();
        return response()->json(['success'=>'true', 'product'=>$product]);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy(Request $request, $id) {
        if ($user = Product::find($id)) {
            $user->delete();
        }
        return response()->json(['success'=>'true']);
    }
}