<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CarRequest;
use App\Models\Car;
use App\Transforms\CarTransform;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index() {
        $cars = Car::paginate(15);
        return $this->response->paginator($cars, new CarTransform());
    }

    public function store(CarRequest $car) {
        $newCar = new Car();
        $newCar->car_id = $car->car_id;
        $newCar->model = $car->model;
        $newCar->save();

        return $this->response->item($newCar, new CarTransform());
    }

    public function get(Car $car) {
        return $this->response->item($car, new CarTransform());
    }

}
