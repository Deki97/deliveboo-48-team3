<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Dish;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\User;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;

        $restaurants = Restaurant::where('user_id',$id)->get();
           
        // dd($restaurant);

        return view ('admin.restaurants.index',compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $id = Auth::user()->id;
        $restaurants = Restaurant::where('user_id',$id)->get();
        

        if($restaurants->isEmpty()){
            return view ('admin.restaurants.create');
        }else{
            return redirect()->route('admin.restaurants.index');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        $new_restaurant = new Restaurant();

        $new_restaurant->fill($form_data);
        $new_restaurant->user_id = Auth::id();
        $new_restaurant->slug = Restaurant::getUniqueSlugFromName($form_data['restaurant_name']);
        if(isset($form_data['image'])) {
            $path_img = Storage::put('restaurant_images', $form_data['image']);
            $new_restaurant->path_img = $path_img;
        }
        $new_restaurant->save();

        return redirect()->route('admin.restaurants.index', ['restaurant' => $new_restaurant->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::FindOrFail($id);

        return view('admin.restaurants.show',compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
