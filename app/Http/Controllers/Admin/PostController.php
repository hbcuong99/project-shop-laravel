<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreateFormRequest;
use App\Http\Services\Post\PostService;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService) {
        $this->postService = $postService;
    }

    public function create() {
        return view('admin.post.add', [
            'title' => 'Add new post',
            'posts' => $this->postService->getParent()
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $this->postService->create($request);

        return redirect()->back();
    }

    public function index(){
        return view('admin.post.list', [
            'title' => 'Posts List',
            'posts' => $this->postService->getAll()
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->postService->destroy($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Successfully deleted the item'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function show(Post $post){
        return view('admin.post.edit', [
            'title' => 'Edit category: ' . $post->name,
            'post' => $post,
            'posts' =>$this->postService->getParent()
        ]);

    }

    public function update(Post $post, CreateFormRequest $request ) {
        $this->postService->update($request, $post);

        return redirect('/admin/posts/list');


    }
}
