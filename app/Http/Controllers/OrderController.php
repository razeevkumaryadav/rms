<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempOrder;
use App\Models\Table;
use App\Models\CategoryMenu;
use App\Models\SubCategoryMenu;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tab = Table::all();
        $subcategorymenu = SubCategoryMenu::all();
        return response()->json(['table'=>$tab,'food'=>$subcategorymenu],200);
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
                            // 'category_menu_id'=>'required',
                            'sub_category_menu_id'=>'required',
                            'quantity'=>'required',
                            'table_id'=>'required',
                            'food_type'=>'required'
                            ]);
    $temp = new TempOrder();

    foreach($request->sub_category_menu_id as $index=>$scm)
    {

                $temp->category_menu_id = $request['category_menu_id'][$index]?$request['category_menu_id'][$index]:0;
                $temp->sub_category_menu_id = $scm;
                $temp->quantity = $request['quantity'][$index];
                $temp->table_id = $request->table_id;
                $temp->food_type = $request['food_type'][$index];
                $temp->user_id =1;
             $save =   $temp->save();

     }
    // $save= $temp->insert($arr);
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
//         $temp = TempOrder::where('table_id',$id)->where('sub_category_menu_id', function($q){
//             $q->select('id')
//             ->from('sub_category_menus')
//             ->where('temp_orders.sub_category_menu_id', 'sub_category_menus.sub_category_menu_id');
//         })->orderBy('table_id')->get();

$temp=DB::table('temp_orders')->join('sub_category_menus','temp_orders.sub_category_menu_id','=','sub_category_menus.id')
    ->select(['temp_orders.*','sub_category_menus.price'])
    ->where('temp_orders.table_id',$id)
    ->get();
         dd($temp);
        if($temp)
        {
        return response()->json(['order'=>$temp],200);
        }
        else
        {
            return response()->json(['status'=>'404','message'=>'resources not found']);
        }
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
        $temp = TempOrder::where('table_id',$id);
        if($temp)
        {
        $val = $request->validate([
            // 'category_menu_id'=>'required',
            'sub_category_menu_id'=>'required',
            'quantity'=>'required',
            'table_id'=>'required',
            'food_type'=>'required'
            ]);


        foreach($request->sub_category_menu_id as $index=>$scm)
        {

         $save =  $temp->update([
            'category_menu_id' => $request['category_menu_id'][$index]?$request['category_menu_id'][$index]:0,
            'sub_category_menu_id' => $scm,
            'quantity' => $request['quantity'][$index],
            'table_id' => $request->table_id,
            'food_type' => $request['food_type'][$index],
            'user_id' =>1
            ]);

        }

        if($save)
        {
            return response()->json(['status'=>'success','message'=>'order Updated successfully']);
        }
        else
        {
        return response()->json(['status'=>'Error','message'=>'Something went fishy']);
        }
        }
        else{
            return response()->json(['status'=>'404','message'=>'requested result not found on server']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $temp = TempOrder::findOrFail($id);
        if($temp)
        {
            $temp->delete();

            return response()->json(['status'=>'success','message'=>'Billed Print Success fully']);
        }
        else{
            return response()->json(['status'=>'success','message'=>'Order not found']);
        }
    }
}
