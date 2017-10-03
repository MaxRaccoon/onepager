<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandingData;
use App\Menu;
use App\Slider;
use App\Technology;
use App\Product;
use App\Request AS RequestEntity;
use Mail;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var \Illuminate\Database\Eloquent\Collection $collection */
        $collection = LandingData::orderBy('id', 'asc')->get();
        $keyArray = [];
        foreach ($collection->toArray() AS $item) {
            $keyArray[$item['key_name']] = $item['key_value'];
        }
        unset($collection);

        /** @var \Illuminate\Database\Eloquent\Collection $collection */
        $collection = Menu::orderBy('id', 'asc')->get();
        $menuArray = [];
        foreach ($collection->toArray() AS $item) {
            $menuArray[] = $item;
        }
        unset($collection);

        /** @var \Illuminate\Database\Eloquent\Collection $collection */
        $collection = Slider::orderBy('id', 'asc')->get();
        $slideArray = [];
        foreach ($collection->toArray() AS $item) {
            $slideArray[] = $item;
        }
        unset($collection);

        /** @var \Illuminate\Database\Eloquent\Collection $collection */
        $collection = Technology::orderBy('id', 'asc')->get();
        $technologyArray = [];
        foreach ($collection->toArray() AS $item) {
            $technologyArray[] = $item;
        }
        unset($collection);

        /** @var \Illuminate\Database\Eloquent\Collection $collection */
        $collection = Product::orderBy('id', 'asc')->get();
        $productsArray = [];
        foreach ($collection->toArray() AS $item) {
            $productsArray[] = $item;
        }
        unset($collection);

        return view('welcome', [
            'keys' => $keyArray,
            'menu' => $menuArray,
            'slides' => $slideArray,
            'technologies' => $technologyArray,
            'products' => $productsArray
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendRequest(Request $request)
    {
        try {
            $name = $request->input('name');
            $dtBorn = $request->input('dt_born');
            $placeBorn = $request->input('place_born');
            $postAddress = $request->input('post_address');
            $phone = $request->input('phone');
            $email = $request->input('email');

            $requestEntity = new RequestEntity();
            $requestEntity->name = $name;
            $requestEntity->dt_born = $dtBorn;
            $requestEntity->place_born = $placeBorn;
            $requestEntity->post_address = $postAddress;
            $requestEntity->phone = $phone;
            $requestEntity->email = $email;
            $requestEntity->created_at = new \DateTime();

            $requestEntity->save();

            Mail::send('emails.request', ['request'=>$requestEntity], function ($message) {
                $message->from('noreply@gmate.ru', 'Gmate');
                $message->to('gmate.rus@gmail.com')->cc('enot.work@gmail.com');
            });

            return response()->json(['success'=>true]);
        } catch (\Exception $e) {
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]);
        }
    }
}
