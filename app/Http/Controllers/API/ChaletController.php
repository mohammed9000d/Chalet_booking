<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerHelper;
use App\Models\Chalet;
use App\Models\Comment;
use Illuminate\Http\Request;

class ChaletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function chalets()
    {
        //
        $chalets = Chalet::paginate(5);
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'chalets' => $chalets,
        ]);
    }

           /**
     * Search for a name.
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        //
        $result = Chalet::where('name', 'LIKE', "%{$name}%")->paginate(5);
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'result' => $result
        ]);
    }

        /**
     * Top Rated Chalets.
     *
     * @return \Illuminate\Http\Response
     */
    public function hightPrice()
    {
        //
        $chalets = Chalet::orderBy('price', 'DESC')->paginate(5);
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'chalets' => $chalets,
        ]);
    }

            /**
     * Top Rated Chalets.
     *
     * @return \Illuminate\Http\Response
     */
    public function lowPrice()
    {
        $chalets = Chalet::orderBy('price', 'ASC')->paginate(5);
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'chalets' => $chalets,
        ]);
    }
}
