<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
class ForumController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        $posts = Post::query()
            ->when($query, function ($q) use ($query) {
                return $q->where('title', 'like', '%'.$query.'%')
                        ->orWhere('content', 'like', '%'.$query.'%');
            })
            ->paginate(10);

        return view('post.index', compact('posts'));
    }

    public function show(Forum $forum)
    {
        return view('post.show',compact('post'));
    } 

    public function destroy($id) 
    {
       $posts = Post::where('id', $id)->firstorfail()->delete();
       return redirect()->route('post.index')
       ->with('success','Forum post has been deleted successfully');
    }
}