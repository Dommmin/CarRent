<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\ResponseFactory;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response|ResponseFactory
     */
    public function index()
    {
        $cars = Car::with('favorites')
            ->with('reviews')
            ->limit(6)
            ->get();

        foreach ($cars as $car) {
            $rate = $car->reviews()->average('rating');
            $car->car_rating = $rate === null ? null : number_format($rate, 1);
        }

        return inertia('Cars/Index', compact('cars'));
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Inertia\Response|ResponseFactory
     */
    public function show($slug)
    {
        $car = Car::with('reviews')->where('slug', $slug)->first();
        $car->has_review = $car->reviews()->where('user_id', Auth::id())->pluck('user_id')->first() === Auth::id();

        return inertia('Cars/Show', compact('car'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addFavorite(Car $car)
    {
        $favorite = new Favorite();
        $favorite->user_id = Auth::id();
        $favorite->car_id = $car->id;
        $favorite->save();

        return redirect()->route('car.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeFavorite(Request $request)
    {
        $favorite = Favorite::where('user_id', Auth::id())
            ->where('car_id', $request['car'])
            ->first();

        $favorite->delete();

        return redirect()->route('car.index');
    }
}
