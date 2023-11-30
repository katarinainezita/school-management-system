<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function store(Request $request)
    {
        $validatedRequest = $request->validate([
            'text' => ['required', 'string'],
            'section_id' => ['required']
        ]);

        Article::create($validatedRequest);

        toastr()->success('Berhasil menambahkan artikel');

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $validatedRequest = $request->validate([
            'text' => ['required', 'string'],
        ]);

        Article::find($request->article_id)->update($validatedRequest);

        toastr()->success('Berhasil mengedit artikel');

        return redirect()->back();
    }
}
