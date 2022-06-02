<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['category'] = Category::all();
        return view('category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $category = new Category();
            $category->name = $request->category_name;
            $category->save();
            // foreach ($request->name as $key => $value) {
            //     $sub = new Subcategory();
            //     $sub->category_id = $category->id; 
            //     $sub->name = $request->name[$key];
            //     $sub->save();
            // }
            $status = [
                'status' => 'success',
                'text' => 'Data berhasil di simpan',
                'data' => $category
            ];
            DB::commit();
            return redirect()->route('category.index')->with(['message'=> $status]);
        } catch (\Throwable $th) {
            throw $th;
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
        $data['category'] = Category::find($id);
        $data['subs'] = Subcategory::where('category_id', $id)->get();
        return view('category.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        DB::beginTransaction();
        try {
            
            $category = Category::find($id);
            $category->name = $request->category_name;
            $category->save();
            // foreach($request->sub_id as $s => $key){ 
            //     $sub = Subcategory::where('id', $request->sub_id[$s])->first();
            //     $sub->name = $request->sub[$s];
            //     $sub->save();
            // }
            // if($request->name){
            //     foreach($request->name as $n => $key){
            //         $sub = new Subcategory();
            //         $sub->category_id = $category->id;
            //         $sub->name = $request->name[$n];
            //         $sub->save();
            //     }
            // }
            $status = [
                'status' => 'success',
                'text' => 'Data berhasil di simpan',
                'data' => $category
            ];
            DB::commit();
            return redirect()->route('category.index')->with(['message' => $status]);
        } catch (\Throwable $th) {
            throw $th;
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
        try {
            $data = Category::find($id)->delete();
            if($data){
                $msg = [
                    'text' =>  'success to delete data',
                    'status' => 'success',
                    'data' => $data
                ];
                return redirect()->route('category.index')->with(['message' => $msg]);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    // public function deleteSub($id){
    //     try {
    //         $data = Subcategory::find($id)->delete();
    //         if($data){
    //             $msg = [
    //                 'text' =>  'success to delete data',
    //                 'status' => 'success',
    //                 'adta' => $data
    //             ];
    //             return $msg;
    //         }
    //     } catch (\Throwable $th) {
    //         //throw $th;
    //     }
    // }
}
