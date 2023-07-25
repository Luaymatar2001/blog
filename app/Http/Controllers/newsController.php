<?php

namespace App\Http\Controllers;

use App\Events\NewNewsEvent;
use App\Http\Requests\newsRequest;
use App\Models\news;
use App\Models\User;
use App\Notifications\blogNotifiaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class newsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news =  news::with('users')->paginate(10);
        // dd($news->toArray());

        return view('news.index')->with('news', $news);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(newsRequest $request)
    {
        $request['user_id'] = Auth::id();
        // $request['user_id'] = 1;
        $file = $request->file('image');
        $path = $file->store('news', ['disk' => 'public']);
        // $pathName = random_int(1 ,100000).time(). $file->getClientOriginalExtension();
        // $path = 'storage/news/' ;
        // $stoage_path = Storage::disk('public')->put('news', $path.$pathName );
        // dd($path);
        $request['images'] = $path;
        $status = news::create($request->only([
            'title', 'subject', 'user_id', 'source_news', 'image'
        ]));
        $status->image = $path;
        $status->save();
        $user = User::where('id', $status->user_id)->first();
        // dd($user->user);
        // $user->user->notify(
        //     new blogNotifiaction($status)
        // );

        event(new NewNewsEvent($status));
        if (!$status) {
            return redirect()->back()->with('status', false);
        }
        return redirect()->back()->with('status', true);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {

        $news = news::where('slug', $slug)->with(['reviews' => function ($query) {
            $query->latest('updated_at')->limit(8);
        }])->first();

        // dd($news->toArray());
        return view('blog.blog_details')->with(['news_details' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $news = news::where('slug', $slug)->first();
        Storage::disk('public')->delete($news->image);
        News::destroy($news->id);
        return redirect()->back()->with('status', true);
    }
}
