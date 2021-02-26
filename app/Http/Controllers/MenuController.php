<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryMenu;
use App\Models\SubCategoryMenu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createcategorymenu(Request $request)
    {
        $validate = $request->validate([
            'name'=>'required'
        ]);
        $category = new CategoryMenu();
        $category->name = $request->name;
       $save = $category->save();
       if($save)
       {
           return response()->Json(["success"=>"inserted successfully"]);
       }
       else{
           return response()->Json(["fail"=>"some issues went during insertion opertaion"]);

       }
    }

    public function creatsubcategorymenu(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            // 'category_menu_id'=>'required',
            'name'=>'required',
            'unit'=>'required',
            'price'=>'required',
            'food_type'=>'required',
        ]);

        $subcate = new SubCategoryMenu();
        $subcate->category_menu_id = $request->category_menu_id?$request->category_menu_id:0;
        $subcate->image = $request->image;
        $subcate->name= $request->name;
        $subcate->unit = $request->unit;
        $subcate->price = $request->price;
        $subcate->food_type = $request->food_type;
        $save = $subcate->save();
        // dd($save);
       if($save)
       {
           return response()->json([
               "status"=>"success",
               "message"=>"inserted successfully"
               ]);
       }
       else{
           return response()->json([
               "status"=>"Error",
               "fail"=>"some issues went during insertion opertaion"
               ]);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showcategorymenu()
    {
        $categorymenu = CategoryMenu::select('id','name')->get();
//         return $category->toJson();
            return response()->json(['categorymenu'=>$categorymenu]);
     }
     public function showsubcategorymenu()
     {
         $category = SubCategoryMenu::all();
         return response()->json(['food'=>$category]);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editcategorymenu($id)
    {
        $categorymenu = CategoryMenu::findOrFail($id);
        return response()->json(['categorymenu'=>$categorymenu]);
    }

    public function editsubcategorymenu($id)
    {
        $subcategorymenu = SubCategoryMenu::findOrFail($id);
        $categorymenu = CategoryMenu::all();

        return response()->json(["subcategorymenu"=>$subcategorymenu,"categorymenu"=>$categorymenu],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatecategorymenu(Request $request, $id)
    {
        $category = CategoryMenu::findOrFail($id);
        $category->name = $request->name;
        $update = $category->update();

        if($update)
        {
            return response()->json([
                'status'=>'success',
                'messagge'=>'Menu Updated Successfully'
            ]);
        }

    }

    public function updatesubcategorymenu(Request $request, $id)
    {
    //  dd($request->all());
         $validate = $request->validate([
                    'category_menu_id'=>'required',
                    'name'=>'required',
                    'unit'=>'required',
                    'price'=>'required',
                    'food_type'=>'required',
                ]);
        $subcate = SubCategoryMenu::findOrFail($id);
        $subcate->category_menu_id = $request->category_menu_id;
        $subcate->image = $request->image;
        $subcate->name= $request->name;
        $subcate->unit = $request->unit;
        $subcate->price = $request->price;
        $subcate->food_type = $request->food_type;
        $save = $subcate->update();
        // dd($save);
       if($save)
       {
           return response()->json([
               "status"=>"success",
               "message"=>"Sub Menu Updated successfully"
               ]);
       }
       else{
           return response()->json([
               "status"=>"Error",
               "fail"=>"some issues went during update opertaion"
               ]);

    }
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroycategorymenu($id)
    {
        $categorymenu = CategoryMenu::findOrFail($id);
        $delete = $categorymenu->delete();

        if($delete)
        {
            return response()->json([
                'status'=>'success',
                'message'=>'menu deleted successfully'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>'Error',
                'message'=>"Some issues went during deleting process"
            ]);
        }

    }

    public function destroysubcategorymenu($id)
    {
        $categorymenu = SubCategoryMenu::findOrFail($id);
        $delete = $categorymenu->delete();

        if($delete)
        {
            return response()->json([
                'status'=>'success',
                'message'=>' Sub menu deleted successfully'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>'Error',
                'message'=>"Some issues went during deleting process"
            ]);
        }

    }
}
