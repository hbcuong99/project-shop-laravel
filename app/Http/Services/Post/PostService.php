<?php

namespace App\Http\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Session;

class PostService
{
    public function getParent() {
        return Post::where('parent_id', 0)->get();
    }

    public function getAll(){
        return Post::orderbyDesc('id')->paginate(20);
    }

    public function create($request){
        try{
            Post::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (string) $request->input('active')
            ]);

            Session::flash('success', 'Create a successful');

        } catch (Exception $err){
            Session::flash('error', $err->getMessage());
            return false;

        }

        return true;

    }

    public function destroy($request){
        $id = (int) $request->input('id');
        $menu = Post::where('id', $id)->first();
        if($menu){
            return Post::where('id', $id)->orWhere('parent_id', $id)->delete();
        }

        return false;
    }

    public function update($request, $post) : bool
    {
        if ($request->input('parent_id') != $post->id){
            $post->parent_id = (int) $request->input('parent_id');
        }
        $post->name = (string) $request->input('name');
        $post->description = (string) $request->input('description');
        $post->content = (string) $request->input('content');
        $post->active = (string) $request->input('active');
        $post->save();

        Session::flash('success', 'Post update successful');
        return true;
    }

}
