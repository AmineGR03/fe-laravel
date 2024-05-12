<?php

namespace App\Http\Controllers\API;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return response()->json($menus);
    }

    public function store(Request $request)
    {
        $request->validate([
            'categorie' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'info' => 'required|string',
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
        ]);
    
        
        $imageName = time() . '.' . $request->file('pic')->getClientOriginalExtension();
        $request->file('pic')->move(public_path('images'), $imageName);
    
       
        $menu = new Menu();
        $menu->categorie = $request->categorie;
        $menu->name = $request->name;
        $menu->info = $request->info;
        $menu->pic = $imageName; 
        $menu->price = $request->price;
        $menu->save();
    
        return redirect()->route('admin.products');
    }
    



    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return response()->json($menu);
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $request->validate([
            'categorie' => 'required',
            'name' => 'required',
            'info' => 'required',
            'pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $menu->categorie = $request->categorie;
        $menu->name = $request->name;
        $menu->info = $request->info;

        if ($request->hasFile('pic')) {
            $menu->pic = $request->file('pic')->store('public/menu_pics'); 
        }

        $menu->save();

        return response()->json($menu, 200);
    }

    public function destroy($id)
    {
        Menu::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}