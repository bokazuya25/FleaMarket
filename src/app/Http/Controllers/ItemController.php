<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Item;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    private function loadItemWithRelations($item_id)
    {
        return Item::with('comments.user', 'categories', 'condition')->findOrFail($item_id);
    }

    private function checkUserLiked($item)
    {
        return $item->likeUsers()->where('user_id', Auth::id())->exists();
    }

    public function index($item_id)
    {
        $item = $this->loadItemWithRelations($item_id);
        $userLiked = $this->checkUserLiked($item);

        $category = $item->categories->first();
        $parentId = $category->parent_id;
        if ($parentId) {
            $categories = [
                'parentCategory' => Category::find($parentId)->name,
                'childCategory' => $category->name,
            ];
        } else {
            $categories = [
                'parentCategory' => $category->name,
            ];
        }

        $data = [
            'item' => $item,
            'likesCount' => $item->likeUsers->count(),
            'commentsCount' => $item->comments->count(),
            'categories' => $categories,
            'condition' => $item->condition->condition,
            'link' => "/item/comment/{$item_id}",
            'userLiked' => $userLiked,
        ];

        return view('item', $data);
    }

    public function comment($item_id)
    {
        $item = $this->loadItemWithRelations($item_id);
        $userLiked = $this->checkUserLiked($item);
        $comments = $item->comments;

        $comments =  $comments->map(function ($comment) {
            return [
                'comment' => $comment->comment,
                'userId' => $comment->user->id,
                'userName' => $comment->user->name,
                'userIcon' => $comment->user->img_url,
            ];
        });

        $data = [
            'item' => $item,
            'likesCount' => $item->likeUsers->count(),
            'commentsCount' => $item->comments->count(),
            'comments' => $comments,
            'link' => "/item/{$item_id}",
            'userLiked' => $userLiked,
        ];

        return view('comment', $data);
    }

    public function store(Request $request, $item_id)
    {
        $userId = Auth::user()->id;
        $commentText = $request->input('comment');

        $comment = new Comment();
        $comment->user_id = $userId;
        $comment->item_id = $item_id;
        $comment->comment = $commentText;
        $comment->save();

        return redirect()->back();
    }

    public function like($item_id)
    {
        $like = new Like();
        $like->user_id = Auth::id();
        $like->item_id = $item_id;
        $like->save();

        return redirect()->back();
    }

    public function unlike($item_id)
    {
        Auth::user()->likeItems()->detach($item_id);
        return redirect()->back();
    }
}
