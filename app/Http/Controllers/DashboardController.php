<?php

namespace App\Http\Controllers;

use App\Product;
use App\Produkdata;
use Illuminate\Http\Request;
use Session;

class Dashboardcontroller extends Controller
{
    public function index()
    {
        $data['menu'] = 'dashboard';
        $data['name'] = Session::get('name');
        $data['total'] = count(Product::all());
        $data['ready'] = count(Product::whereNull('status')->get());
        $data['sold'] = count(Product::where('status', 'sold')->get());

        return view('dashboard.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
