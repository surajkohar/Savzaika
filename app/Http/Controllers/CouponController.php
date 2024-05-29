<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use ProtoneMedia\Splade\SpladeTable;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.coupons.index',[
            'coupons'=>SpladeTable::for(Coupon::class)
         
            ->withGlobalSearch(columns: ['coupon_name', 'coupon_code','coupon_type'])
            ->column('coupon_name',sortable:true)
            ->column('coupon_code',sortable:true)
            ->column('coupon_type',sortable:true)
            ->column('discount_value',sortable:true)
            ->column('start_date',sortable:true)
            ->column('expiration_date',sortable:true)
            ->column('is_active',sortable:true)
            ->column('usage_limit',sortable:true)
             ->column('action')
             ->column('created_at', sortable: true, hidden: true)
             ->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $details = [
            'url' => route('admin.coupons.store'),
            'method' => 'POST',
            'title' => 'Create new coupon',
            'type' => 'create'
        ];
    return view('admin.coupons.create', [
        'details' => $details,
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCouponRequest $request)
    {
    // dd($request->all());
        Coupon::create([
            'coupon_name' => $request->coupon_name,
            'coupon_code' => $request->coupon_code,
            'coupon_type' => $request->coupon_type,
            'discount_value' => $request->discount_value,
            'start_date' => $request->start_date,
            'minimum_amount'=> $request->minimum_amount,
            'expiration_date' => $request->expiration_date,
            'is_active' => $request->is_active,
            'usage_limit' => $request->usage_limit,
           
        ]);
        return redirect()->route('admin.coupons.index');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        $details = [
            'url' => route('admin.coupons.update',$coupon),
            'method' => 'PUT',
            'title' => 'Update Coupon',
            'type' => 'update'
        ];
        $defaults = [
            'coupon_name' => $coupon->coupon_name,
            'coupon_code' => $coupon->coupon_code,
            'coupon_type' => $coupon->coupon_type,
            'minimum_amount'=> $coupon->minimum_amount,
            'discount_value' => $coupon->discount_value,
            'start_date' => $coupon->start_date,
            'expiration_date' => $coupon->expiration_date,
            'is_active' => $coupon->is_active,
            'usage_limit' => $coupon->usage_limit,
           
        ];
        // dd($defaults);
    return view('admin.coupons.create')->with('defaults', $defaults)->with('details', $details);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        $coupon->update([
            'coupon_name' => $request->coupon_name,
            'coupon_code' => $request->coupon_code,
            'coupon_type' => $request->coupon_type,
            'discount_value' => $request->discount_value,
            'minimum_amount'=> $request->minimum_amount,
            'start_date' => $request->start_date,
            'expiration_date' => $request->expiration_date,
            'is_active' => $request->is_active,
            'usage_limit' => $request->usage_limit,
           
        ]);
        return redirect()->route('admin.coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('admin.coupons.index');
    }
}
