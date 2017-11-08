<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Beer;
use App\Brewery;
use App\Style;

class BeerController extends Controller
{
	//return all beers
    public function index()
    {
        return Beer::all()->pluck('name');
    }

    //add a new beer
    public function store(Request $request)
    {
        $fields = $request->all();

        //fill in user id
        $fields['user_id'] = \Auth::user()->user_id;

        //check when last beer was created by user
        $last_created = Beer::where('user_id', $fields['user_id'])->orderby('created_at','desc')->first();
        $created_at = new \Carbon($last_created->created_at);
        $difference = $created_at->diffInHours(\Carbon::now());
        if ($difference < 24) {
            return response()->json(
                array('message' => 'Sorry, you can only add one beer per day (part of our responsible drinking program:)'),
                403);
        }

        //fill in brewery id (return list of valid if doesn't exist)
        if (!isset($fields['brewery'])) {
            return response()->json(array('message' => 'Please specify the brewery'),400);
        }
        $brewery = Brewery::where('name', $fields['brewery'])->first();
        if (is_null($brewery)) {
            return response()->json(
                array('message' => 'Can\'t find that brewery - please select one from the list or contact support to have it added',
                      'breweries' => Brewery::all()->pluck('name')), 
                404);
        }
        $fields['brewery_id'] = $brewery->brewery_id;

        //fill in style id (add if doesn't exist)
        if (!isset($fields['style'])) {
            return response()->json(array('message' => 'Please specify the style'), 400);
        }
        $style = Style::firstOrCreate(array('name' => $fields['style']));
        $fields['style_id'] = $style->style_id;

        //validate & create
        $validation = Validator::make($fields, Beer::$rules);
        if ($validation->passes())
        {
            $beer = Beer::create($fields);
            return response()->json($beer, 201);
        } else {
            return response()->json(
                array('message' => 'Couldn\'t add your beer - validation failed', 
                      'errors' => $validation->errors()->all()), 
                400);
        }

    }
}
