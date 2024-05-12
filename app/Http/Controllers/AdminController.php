<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; 

class AdminController extends Controller
{
    public function home()
    {
        return view('Admin.home');
    }
    
    public function products()
    {
        $menus = Menu::all()->map(function ($menu) {
            
            $menu['pic'] = str_replace('public/', '', $menu['pic']);
            return $menu;
        });
        return view('Admin.product', compact('menus')); 
    }

    public function create()
    {
        $categorie=Categorie::all();
        return view('Admin.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'categorie' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'info' => 'required|string',
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'highlight' => 'required|boolean', 
        ]);
    
        
        $imageName = $request->file('pic')->getClientOriginalName();
    
        
        $request->file('pic')->storeAs('public/images', $imageName);
    
        
        $menu = new Menu();
        $menu->categorie = $request->categorie;
        $menu->name = $request->name;
        $menu->info = $request->info;
        $menu->pic = $imageName;
        $menu->highlight = $request->highlight; 
        $menu->highlight_note = $request->highlight_note;
        $menu->price = $request->price;
        $menu->save();
    
        return redirect()->route('admin.products');
    }

    

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $categorie=Categorie::all();
        return view('Admin.edit', compact(['menu','categories']));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'categorie' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'info' => 'required|string',
        'pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'price' => 'required|numeric',
        'highlight' => 'required|boolean', ]);

    $menu = Menu::findOrFail($id);

    
    if ($request->hasFile('pic')) {
        $imageName = $request->file('pic')->getClientOriginalName();
        $request->file('pic')->storeAs('public/images', $imageName);
        $menu->pic = $imageName;
    }

    $menu->categorie = $request->categorie;
    $menu->name = $request->name;
    $menu->info = $request->info;
    $menu->highlight = $request->highlight; 
    $menu->price = $request->price;
    $menu->highlight_note = $request->highlight_note;
    $menu->save();

    return redirect()->route('admin.home');
}

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('admin.products');
    }

    public function categories()
{
    return view('admin.categories');
}
    public function storeCategory()
    {   
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = new Categorie();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.categories');
    }
    public function editCategory($id)
    {
        $category = Categorie::findOrFail($id);
        return view('admin.editCategory', compact('category'));
    }
    public function updateCategory($id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = Categorie::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.categories');
    }
    public function destroyCategory($id)
    {
        $category = Categorie::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories');
    }
}