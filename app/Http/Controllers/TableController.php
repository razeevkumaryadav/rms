<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tab = Table::all();

         return response()->json(['table'=>$tab],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
    'name'=>'required',
    'type'=>'required'
    ]);
    $tab = new Table();
    $tab->name = $request->name;
    $tab->type = $request->type;
    $save=$tab->save();
    if($save)
    {
        return response()->json(['status'=>'success','message'=>'Successfully save table data']);
    }
    else{
         return response()->json(['status'=>'Error','message'=>'somethine went fishy']);
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
        $tab = Table::findOrFail($id);
        return response()->json(['table'=>$tab],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tab = Table::findOrFail($id);
        return response()->toJson(['table'=>$tab],200);
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


         $val = $request->validate([
             'name'=>'required',
             'type'=>'required'
             ]);
            $tab = Table::findOrFail($id);
             $tab->name = $request->name;
             $tab->type = $request->type;
             $save=$tab->save();
             if($save)
             {
                 return response()->json(['status'=>'success','message'=>'Successfully save table data']);
             }
             else{
                  return response()->json(['status'=>'Error','message'=>'somethine went fishy']);
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
         $tab = Table::findOrFail($id);
         $del =$tab->delete();
         if($del)
         {
             return response()->json(['status'=>'success','message'=>' Table Deleted successfully']);
         }
         else{
            return response()->json(['status'=>'Error','message'=>' Table was not Deleted']);
         }
    }
}
