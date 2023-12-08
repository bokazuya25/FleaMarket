<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Category_item;
use App\Models\Condition;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SellController extends Controller
{
    public function index()
    {
        $conditions = Condition::all();

        $parentCategories = Category::whereNull('parent_id')->with('children')->get();
        $selectCategories = $parentCategories->flatMap(function ($parent) {
            return $parent->children->map(function ($child) use ($parent) {
                return ['id' => $child->id, 'name' => $parent->name . ' - ' . $child->name];
            });
        });

        return view('sell', compact('conditions','selectCategories'));
    }

    public function create(Request $request)
    {
        $form = $request->all();

        $file = $request->file('img_url');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('uploads', $filename, 'public');
        $imgUrl = Storage::url($path);
        $newItem = Item::create(array_merge($form, ['imgUrl' => $imgUrl]));

        $categoryItems = new Category_item();
        $categoryItems->item_id = $newItem->id;
        $categoryItems->category_id = $request->category_id;
        $categoryItems->save();

        session()->flash('success', '出品しました。');
        return redirect()->back();
    }
}
