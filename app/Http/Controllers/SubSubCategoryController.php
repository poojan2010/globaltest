<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;


class SubSubCategoryController extends Controller
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
    public function create()
    {
        $categoryData = Category::get();
        return view('category.addcategory', ['is_form' => '3', 'data' => $categoryData]);
    }

    public function getSubCategory(Request $request)
    {
        // dd('ghere');
        $subcategoryData = SubCategory::where('category_id', $request->cat)->get();

        // echo "<pre>";
        // print_r($subcategoryData);die;
        return $subcategoryData;
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
         $this->validate($request,[
            'name'=>'required',
            'subcategory' => 'required'
         ]);

            $sub_sub_category = new SubSubCategory;
            $sub_sub_category->sub_category_id = $request->subcategory;
            $sub_sub_category->name = $request->name;
            $sub_sub_category->save();

            return redirect(route('home'));
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
        $data = SubSubCategory::find($id);
        $categoryData = Category::get();
        return view('category.editcategory', ['is_form' => '3', 'data' => $categoryData, 'subsubcategory' => $data]);
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
        SubSubCategory::where('id',$id)->update([
            'sub_category_id'  => $request->subcategory,
            'name' => $request->name,
        ]);

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subsubcategory = SubSubCategory::find($id);
        $subsubcategory->delete();
        return redirect('home');
    }
}
