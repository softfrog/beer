<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Review;
use App\Beer;

class ReviewController extends Controller
{
	//add a new review for a beer
    public function store(Request $request)
    {
        $fields = $request->all();

        //fill in user id
        $fields['user_id'] = \Auth::user()->user_id;

        //fill in beer id (return list of valid if doesn't exist)
        if (!isset($fields['beer'])) {
            return response()->json(array('message' => 'Please specify the beer'),400);
        }
        $beer = Beer::where('name', $fields['beer'])->first();
        if (is_null($beer)) {
            return response()->json(
                array('message' => 'Can\'t find that beer - please select one from the list or add it before reviewing',
                      'beers' => Beer::all()->pluck('name')), 
                404);
        }
        $fields['beer_id'] = $beer->beer_id;

        //validate & create
        $validation = Validator::make($fields, Review::$rules);
        if ($validation->passes())
        {
            //calculate overall score
            $fields['overall'] = (isset($fields['aroma'])?$fields['aroma']:0) +
                                 (isset($fields['appearance'])?$fields['appearance']:0) +
                                 (isset($fields['taste'])?$fields['taste']:0);
            $review = Review::create($fields);
            return response()->json($review, 201);
        } else {
            return response()->json(
                array('message' => 'Couldn\'t add your review - validation failed', 
                      'errors' => $validation->errors()->all()), 
                400);
        }
    }

    //return all reviews for a beer
    public function show($beer)
    {
        $beer = Beer::where('name', $beer)->first();
        if (is_null($beer)) {
            return response()->json(
                array('message' => 'Can\'t find that beer - please select one from the list',
                      'beers' => Beer::all()->pluck('name')), 
                404);
        }

        return Review::where('beer_id', $beer->beer_id)->get();
    }

    //return overall rating for a beer
    public function overall($beer)
    {
        $beer = Beer::where('name', $beer)->first();
        if (is_null($beer)) {
            return response()->json(
                array('message' => 'Can\'t find that beer - please select one from the list',
                      'beers' => Beer::all()->pluck('name')), 
                404);
        }

        return response()->json($beer->overall(), 201);
    }

}
