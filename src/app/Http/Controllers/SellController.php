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
    public function index($item_id = null)
    {
        $conditions = Condition::all();
        $selectedConditionId = null;
        $selectedCategoryId = null;

        if ($item_id) {
            $item = Item::find($item_id);
            $selectedConditionId = $item->condition_id;
            $selectedCategoryId = $item->categories->first()->id;
        }

        $parentCategories = Category::whereNull('parent_id')->with('children')->get();
        $selectCategories = $parentCategories->flatMap(function ($parent) use ($selectedCategoryId) {
            return $parent->children->map(function ($child) use ($parent, $selectedCategoryId) {
                return [
                    'id' => $child->id,
                    'name' => $parent->name . ' - ' . $child->name,
                    'selected' => $child->id == $selectedCategoryId
                ];
            });
        });

        $data = [
            'conditions' => $conditions,
            'selectedConditionId' => $selectedConditionId,
            'selectCategories' => $selectCategories,
            'item' => $item ?? null,
            'item_id' => $item_id ?? null,
        ];

        return view('sell', $data);
    }

    public function create(Request $request)
    {
        $form = $request->all();

        $file = $request->file('img_url');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('uploads', $filename, 'public');
        $form['img_url'] = Storage::url($path);
        $form['price'] = str_replace(',', '', $form['price']);
        $newItem = Item::create($form);

        $categoryItems = new Category_item();
        $categoryItems->item_id = $newItem->id;
        $categoryItems->category_id = $request->category_id;
        $categoryItems->save();

        return redirect()->back()->with('success', '出品しました');
    }

    public function edit(Request $request,$item_id) {
        $form = $request->all();
        unset($form['_token']);

        if(isset($form['img_url'])) {
            $file = $request->file('img_url');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');
            $form['img_url'] = Storage::url($path);
        }

        if(isset($form['price'])) {
            $form['price'] = str_replace(',','',$form['price']);
        }

        Item::find($item_id)->update($form);

        return redirect()->back()->with('success', '変更しました');
    }
}
