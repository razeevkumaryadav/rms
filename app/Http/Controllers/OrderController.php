<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempOrder;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $tab = Table::all();
//         $order = TempOrder::all();
//         return response()->json(['table'=>$tab,'order'=>$order],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $val = $request->validate([
                            'category_menu_id'=>'required',
                            'sub_category_menu_id'=>'required',
                            'quantity'=>'required',
                            'table_id'=>'required',
                            'food_type'=>'required'
                            ]);
    $temp = new TempOrder();

    foreach($request->sub_category_menu_id as index=>$scm)
    {
     $arr[]=[
                $temp->category_menu_id = $request->category_menu_id[index],
                $temp->sub_category_menu_id = $request->sub_category_menu_id[index],
                $temp->quantity = $request->quantity[index],
                $temp->table_id = request->table_id,
                $temp->food_type = request->food_type[index],
                $temp->user_id =1

            ];
     }
    $save= $temp->insert($arr);
    if($save)
    {
        return response()->json(['status'=>'success','message'=>'order placed successfully']);
    }
    else
    {
        return response()->json(['status'=>'Error','message'=>'Something went fishy']);
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
