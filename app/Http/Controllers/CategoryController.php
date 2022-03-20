<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categoryData = Category::select('id', 'name')->get();

        $subCatData = Category::with(['subcategory' => function($query){
                $query->addSelect('id', 'name', 'category_id');
        }])
        ->select('id', 'name')
        ->get();

        $subSubCatData = Category::with(['subcategory' => function($query){
            $query->with('subSubCategory');
        }])
        ->select('id', 'name')->get();

        // echo "<pre>";
        // print_r($data);die;
        return view('home', ['data' => $categoryData, 'subcat' => $subCatData, 'subsubcat' => $subSubCatData]);

    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.addcategory', ['is_form' => '1']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            
         ]);

         $category = new Category;
         $category->name = $request->name;
         $category->save();

         return redirect(route('home'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return view('category.editcategory', ['editcategory' => $id]);
        
        $data = Category::find($id);
        return view('category.editcategory', ['is_form' => '1','data' => $data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Category::where('id',$id)->update([
            'name' => $request->name,
        ]);
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('home');
    }
}
