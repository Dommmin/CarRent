<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarStoreRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Inertia\Response;
use Inertia\ResponseFactory;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AdminCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response|ResponseFactory
     */
    public function index(Car $car)
    {
        $cars = Car::all();

        return inertia('Admin/Car/Index', compact('cars', 'car'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response|ResponseFactory
     */
    public function create()
    {
        return inertia('Admin/Car/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request, CarStoreRequest $carStoreRequest)
    {
        $images = [];

        if ($carStoreRequest->validated()) {
            $car = new Car();
            $car->name = $request['name'];
            $car->year = $request['year'];
            $car->fuel = $request['fuel'];
            $car->fuel_consumption = $request['fuel_consumption'];
            $car->seats = $request['seats'];
            $car->gearbox = $request['gearbox'];
            $car->price = $request['price'];
            $car->horsepower = $request['horsepower'];
            $car->torque = $request['torque'];
            $car->acceleration = $request['acceleration'];
            $car->engine = $request['engine'];
            $car->drivetrain = $request['drivetrain'];

            if ($request->files) {
                $files = $request->files;

                foreach ($files as $values) {
                    foreach ($values as $items) {
                        foreach ($items as $value) {
                            $file = $value;
                            $fileName = date('YmdHi') . $file->getClientOriginalName();
                            $file->move(public_path('images'), $fileName);
                            $images[] = $fileName;
                        }
                    }
                }
            }

            $car->images = $images;
            $car->main = $car->images[0] ?? '';
            $car->description = $request['description'];
            $car->save();
        }

        return redirect()->route('admin.car.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Car $car
     * @return Response|ResponseFactory
     */
    public function edit(Car $car)
    {
        return inertia('Admin/Car/Edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, Car $car, CarStoreRequest $carStoreRequest)
    {
        $images = [];
        $oldImages = $car->images;

//        if ($carStoreRequest->validated()) {
            $car->name = $request['name'];
            $car->year = $request['year'];
            $car->fuel = $request['fuel'];
            $car->fuel_consumption = $request['fuel_consumption'];
            $car->seats = $request['seats'];
            $car->gearbox = $request['gearbox'];
            $car->price = $request['price'];
            $car->horsepower = $request['horsepower'];
            $car->torque = $request['torque'];
            $car->acceleration = $request['acceleration'];
            $car->engine = $request['engine'];
            $car->drivetrain = $request['drivetrain'];


            if ($request->files) {
                $files = $request->files;

                foreach ($files as $values) {
                    foreach ($values as $items) {
                        foreach ($items as $value) {
                            $file = $value;
                            $fileName = date('YmdHi') . $file->getClientOriginalName();
                            $file->move(public_path('images'), $fileName);
                            $images[] = $fileName;
                        }
                    }
                }
            }

//            $oldImages = $car->images;
            $newImages = $oldImages + $images;
//            dd($newImages);

            if ($images != []) {
                $car->images = $images;
            }

            dump($newImages);

            $car->images = $newImages;
            $car->main = $car->images[0] ?? '';
            $car->description = $request['description'];
            $car->update();
//        }

        return redirect()->route('admin.car.index');
    }

    /**
     * @param Car $car
     * @return RedirectResponse
     */
    public function available(Car $car)
    {
        $car->available = true;
        $car->update();

        return redirect()->route('admin.car.index');
    }

    /**
     * @param Car $car
     * @return RedirectResponse
     */
    public function unAvailable(Car $car)
    {
        $car->available = false;
        $car->update();

        return redirect()->route('admin.car.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Car $car
     * @return RedirectResponse
     */
    public function destroy(Car $car): RedirectResponse
    {
        foreach ($car->images as $filename) {
            if (File::exists("images/$filename")) {
                File::delete("images/$filename");
            }
        }

        $car->rents()->delete();
        $car->favorites()->delete();
        $car->delete();

        return redirect()->route('admin.car.index');
    }
}
