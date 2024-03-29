<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use Throwable;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('coupon_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if(Auth::user()->hasRole('admin')){
            $coupon = Coupon::with(['event'])->OrderBy('id','DESC')->get();
        }
        elseif(Auth::user()->hasRole('Organizer')){
            $coupon = Coupon::with(['event'])->where('user_id',Auth::user()->id)->OrderBy('id','DESC')->get();
        }

        return view('admin.coupon.index', compact('coupon'));
    }

    public function create()
    {
        abort_if(Gate::denies('coupon_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if(Auth::user()->hasrole('admin')){
            $event = Event::where('status',1)->orderBy('id','DESC')->get();
        }
        elseif(Auth::user()->hasrole('Organizer')){
            $event = Event::where([['status',1],['user_id',Auth::user()->id]])->orderBy('id','DESC')->get();
        }
        return view('admin.coupon.create', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required',
            'event_id' => 'bail|required',
            'discount' => 'bail|required',
            'discount_type'=>'bail|required',
            'start_date' => 'bail|required',
            'end_date' => 'bail|required',
            'max_use' => 'bail|required',
            'description' => 'bail|required',
            'minimum_amount'=> 'bail|required',
            'maximum_discount' => 'bail|required'
        ]);
        $data = $request->all();
        $data['coupon_code'] =  chr(rand(65,90)).chr(rand(65,90)).'-'.rand(9999,100000);
        $data['user_id']= Event::find($request->event_id)->user_id;

        Coupon::create( $data);
        return redirect()->route('coupon.index')->withStatus(__('Coupon has added successfully.'));
    }

    public function edit(Coupon $coupon)
    {
        abort_if(Gate::denies('coupon_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if(Auth::user()->hasrole('admin')){
            $event = Event::where('status',1)->orderBy('id','DESC')->get();
        }
        elseif(Auth::user()->hasrole('Organizer')){
            $event = Event::where([['status',1],['user_id',Auth::user()->id]])->orderBy('id','DESC')->get();
        }
        return view('admin.coupon.edit', compact( 'coupon','event'));
    }

    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'name' => 'bail|required',
            'event_id' => 'bail|required',
            'discount' => 'bail|required',
            'start_date' => 'bail|required',
            'end_date' => 'bail|required',
            'max_use' => 'bail|required',
            'description' => 'bail|required',
            'minimum_amount'=> 'bail|required',
            'maximum_discount' => 'bail|required'
        ]);
        $data = $request->all();
        $data['user_id']= Event::find($request->event_id)->user_id;

        Coupon::find($coupon->id)->update($data);
        return redirect()->route('coupon.index')->withStatus(__('Coupon has update successfully.'));
    }

    public function destroy(Coupon $coupon)
    {
        try{
            $coupon->delete();
            return true;
        }catch(Throwable $th){

            return response('Data is Connected with other Data', 400);
        }
    }
}
