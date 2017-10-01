<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandingData;
use App\Menu;
use App\Slider;
use App\Technology;
use App\Product;

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
}
