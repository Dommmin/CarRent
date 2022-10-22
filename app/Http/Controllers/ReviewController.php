<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RentStoreRequest;
use App\Models\Car;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Car $car, RentStoreRequest $rentStoreRequest)
    {
        $review = new Review();
        $review->user_id = Auth::id();
        $review->car_id = $request['car'];
        $review->rating = $request['rating'];
        $review->description = $request['description'];
        $review->save();

        return redirect()->route('cars.show', ['car' => $car->slug]);
    }
}
