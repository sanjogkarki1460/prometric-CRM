<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use App\Http\Requests\CategoryValidator;

class CategoryController extends Controller
{
    protected $catrgory = null;

    public function __construct(Category $category)
    {
        $this->catrgory = $category;
    }

    public function index()
    {
        $category = $this->catrgory->orderBy('id', 'desc')->get();
        return view('Admin.Category.Index')->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Category.Add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryValidator $request)
    {
        $data = $request->all();
//        dd($data);
        $this->catrgory->fill($data);
        $success = $this->catrgory->save();
        if ($success) {
            return redirect()->route('Category.index')->with('success', 'Category Created Successfully');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrfail($id);
        return view('Admin.Category.Update')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryValidator $request, $id)
    {
        $this->catrgory=$this->catrgory->find($id);
        $data=$request->all();
        $this->catrgory->fill($data);
        $success = $this->catrgory->save();
        return redirect()->route('Category.index')->with('success','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrfail($id);
        $success= $category->delete();
        if ($success) {
            return redirect()->route('Category.index')->with('success', 'Category Deleted Successfully');
        }



    }
}
