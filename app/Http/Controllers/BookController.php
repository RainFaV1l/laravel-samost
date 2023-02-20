<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function Psy\debug;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create()
    {
        return view('books_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'file' => 'required|mimes:png,jpeg,jpg',
        ], [
            'name.min' => 'Минимальная длина 3 символа',
            'required' => 'Обязательна к заполнению',
            'description.min' => 'Минимальная длина 10 символов',
            'file.mimes' => 'Неверный формат',
        ], [
            'name' => 'название книги',
            'description' => 'описание книги',
            'file' => 'изображение книги',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $validated = $validator->validated();
        $validated['author_id'] = Auth::user()->getAuthIdentifier();

        if($request->file('file')) {
            $validated['path'] = $request->file('file')->store('public/images');
        }

        Book::query()->create($validated);

        return redirect()->route('index.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::query()->find($id);

        if($book === null) {
            abort(404);
        }

        return view('book_show', compact('book'));
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
    public function destroy(string $id)
    {
        //
    }
}
