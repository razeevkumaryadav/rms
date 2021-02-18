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
            'category_menu_id'=>'required',
            'name'=>'required',
            'unit'=>'required',
            'price'=>'required',
            'food_type'=>'required',
        ]);
      
        $subcate = new SubCategoryMenu();
        $subcate->category_menu_id = $request->category_menu_id;
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
        $category = CategoryMenu::select('id','name')->get();
        return $category->toJson();

     }
     public function showsubcategorymenu()
     {
         $subcategory = SubCategoryMenu::with('categorymenus')->get();
         return $subcategory->toJson();
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editcategorymenu($id)
    {
        $categorymenu = CategoryMenu::find($id);
        return $categorymenu->toJson();
    }

    public function editsubcategorymenu($id)
    {
        $subcategorymenu = SubCategoryMenu::find($id);
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
        $category = CategoryMenu::find($id);
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
        $subcate = SubCategoryMenu::find($id);
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
        $categorymenu = CategoryMenu::find($id);
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
        $categorymenu = SubCategoryMenu::find($id);
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
}
