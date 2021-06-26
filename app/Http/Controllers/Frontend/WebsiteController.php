<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Chalet;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Reservation;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WebsiteController extends Controller
{
    //Home Page
    public function home() {
        $chalets = Chalet::all();
        return view('website.index',['chalets'=>$chalets]);
    }

    public function search(Request $request){
        $search = $request->input('search');
        $chalets = Chalet::where('name', 'LIKE', "%{$search}%")->get();
        return view('website.search',['chalets'=>$chalets]);
    }



    //Visitor Page
    public function visitor() {
        $chalets = Chalet::all();
        return view('website.visitor',['chalets'=>$chalets]);
    }




    //Chalet Page
    public function chalets() {
        $chalets = Chalet::paginate(5);
        $chalets_Hprice = Chalet::orderBy('price', 'DESC')->get();
        $chalets_Lprice = Chalet::orderBy('price', 'ASC')->get();
        $chalets_rated = Chalet::orderBy('price', 'DESC')->get();
        $states = State::with('chalets')->where('status', '=', 'Active')->get();
        return view('website.chalets',[
            'chalets'=>$chalets,
            'states'=>$states,
            'chalets_Lprice'=>$chalets_Lprice,
            'chalets_Hprice'=>$chalets_Hprice,
            'chalets_rated'=>$chalets_rated,
            // 'avg_rated' => $avg_rated,
        ]);
    }



    //Details Page
    public function details($id) {
        $chalet = Chalet::findOrfail($id);
        $comments = $chalet->comments()->orderBy('created_at', 'DESC')->take(3)->get();
        $avg_rated = Comment::whereHas('chalet', function($query) use ($id){
            $query->where('id', '=', $id);
        })->avg('rated');
        return view('website.details',[
            'chalet'=>$chalet,
            'comments'=>$comments,
            'avg_rated' => $avg_rated
        ]);
    }




    public function comment(Request $request, $id){
        $chalet = Chalet::find($id);
        $request->validate([
            'comment' => 'required',
            'rated' => 'required'
           ]);
        $comment = new Comment();
        $comment->user_id = Auth()->user()->id;
        $comment->chalet_id = $chalet->id;
        $comment->comment = $request->get('comment');
        $comment->rated = $request->get('rated');
        $IsSaved = $comment->save();
        if($IsSaved){
            session()->flash('alert-type','alert-success');
            session()->flash('messege','تمت عملية الحجز بنجاح');
            // return redirect()->route('website.details');
        }else {

            session()->flash('alert-type','alert-danger');
            session()->flash('messege','تمت عملية الحجز بنجاح');
        }
    }



    //Booking Page
    public function booking($id) {
        $chalet = Chalet::findOrfail($id);
        return view('website.booking',['chalet'=>$chalet]);
    }




    public function process(Request $request, $id) {
        $chalet = Chalet::find($id);
        $request->validate([
            'time'=>'required',
            'date' => 'required|unique:reservations,date,'.$id.',id,time,'.$request->get('time').',chalet_id,'.$chalet->id,
        ],['date.unique' => 'هذا التوقيت محجوز']);
           $reservation = new Reservation();
           $reservation->user_id = Auth()->user()->id;
           $reservation->chalet_id = $chalet->id;
           $reservation->date = $request->get('date');
           $reservation->time = $request->get('time');
           $reservation->status = 'قيد المتابعة';
           $IsSaved = $reservation->save();
           if($IsSaved){
               session()->flash('alert-type','alert-success');
               session()->flash('messege','تمت عملية الحجز بنجاح');
               return redirect()->back();
           }else{
               session()->flash('alert-type','alert-danger');
               session()->flash('messege','فشلت عملية الحجز');
               return redirect()->back();
           }
    }



    //Reservations Page
    public function reservations() {
        $user = Auth()->user();
        $reservations = Reservation::where('user_id', '=', $user->id)->paginate(4);
        return view('website.reservations',[
            'reservations'=>$reservations,
            'user'=>$user
        ]);
    }



    //Favorite Page
    public function favorite() {
        // $chalet = Chalet::find($id);
        $user = Auth()->user();
        $favorites = Favorite::where('user_id', '=', $user->id)->paginate(3);
        return view('website.favorite',[
            'favorites'=>$favorites,
            // 'chalet'=>$chalet
        ]);
    }

    public function addFavorite(Request $request, $id) {
        $chalet = Chalet::find($id);
        $request->validate([
            // 'user_id'=>'required|exists:users,id',
            'chalet_id'=>'exists:chalets,id|unique:chalets,id',
           ]);
           $favorite = new Favorite();
           $favorite->user_id = Auth()->user()->id;
           $favorite->chalet_id = $chalet->id;
           $IsSaved= $favorite->save();
           if($IsSaved){
            return response()->json([
                'title'=>'Success',
            ]);

        }else{
            return response()->json([
                'title'=>'Failed',
            ]);


        //    return redirect()->back();

        }

    }

    public function deleteFavorite($id) {
        $isDeleted = Favorite::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'تم الحذف بنجاح',
                'icon'=>'success'
            ]);

        }else{
            return response()->json([
                'title'=>'Failed',
                'text'=>'خطأ في عملية الحذف',
                'icon'=>'error'
            ]);

        }
    }



    //Profile Page
    public function profile() {
        $user = User::all();
        $states = State::where('status', '=', 'Active')->get();
        return view('website.profile',['user'=>$user, 'states'=>$states]);
    }




    public function editProfile(Request $request,$id){
        $request->validate([
            'state_id'=>'required|integer|exists:states,id',
            'first_name' => 'required|string|min:3|max:10',
            'last_name' => 'required|string|min:3|max:10',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'image' => 'image',
        ]);
        $user =User::findOrfail($id);
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->mobile = $request->get('mobile');
        $user->password = Hash::make('pass123$');
        $user->state_id = $request->get('state_id');
        $user->birth_date = $request->get('birth_date');
        $user->status = 'Active';
        if ($request->hasFile('image')) {
            $userImage = $request->file('image');
            $name = time() . '_' . $request->get('first_name') . '.' . $userImage->getClientOriginalExtension();
            $userImage->move('images/user', $name);
            $user->image = $name;
        }

        $updated = $user->save();
        if($updated){
            session()->flash('alert-type','alert-success');
            session()->flash('message','تم تحديث بياناتك بنجاح');
            return redirect()->back();
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message','فشلت عمليةالتحديث');
            return redirect()->back();
        }
    }
}
