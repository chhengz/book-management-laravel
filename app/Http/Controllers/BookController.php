<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    // view
    public function create()
    {
        return view('book.create');
    }

    // display book
    public function show()
    {
        // $book = Book::find($book->id);
        $books = Book::orderBy('id', 'desc')->get();
        // dd($books->toArray());
        return view('book.show', compact('books'));
    }

    // store book
    public function store(Request $request)
    {

        // validate the request
        $book = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'description' => 'required|max:1000',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // book model title	slug	description	cover
        $book = new Book();
        $book->title = $request->title;
        // $book->slug = $request->slug;
        $book->slug = strtolower(str_replace(' ', '-', $request->slug));
        $book->description = $request->description;

        $extension = $request->file('cover')->extension();
        // $filename = time() . '.' . $extension;
        $filename = date('YmdHis') . '.' . $extension; // output: 20231005123456.jpg
        $request->file('cover')->move(public_path('uploads'), $filename);
        $book->cover = $filename;

        // dd($book->toArray());

        $book->save();
        return redirect()->route('book.show')->with('success', 'Book created successfully');
    }

    // edit book
    public function edit($id)
    {
        // $book = Book::find($id);
        $book = Book::where('id', $id)->first();
        return view('book.edit', compact('book'));
    }

    // update book
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'description' => 'required|max:1000',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $book = Book::where('id', $id)->first();

        if ($request->hasFile('cover')) {
            $request->validate([
                'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if (file_exists(public_path('uploads/' . $book->cover)) and !empty($book->cover)) {
                unlink(public_path('uploads/' . $book->cover));
            }
            // cover
            $extension = $request->file('cover')->extension();
            $filename = date('YmdHis') . '.' . $extension;
            $request->file('cover')->move(public_path('uploads'), $filename);
        }

        // if ($request->hasFile('cover')) {
        //     $extension = $request->file('cover')->extension();
        //     $filename = date('YmdHis') . '.' . $extension;
        //     $request->file('cover')->move(public_path('uploads'), $filename);
        // }

        $book = Book::find($id);
        $book->title = $request->title;
        $book->slug = strtolower(str_replace(' ', '-', $request->slug));
        $book->description = $request->description;
        $book->cover = $filename;


        $book->update();
        return redirect()->route('book.show')->with('success', 'Book updated successfully');

    }

    // delete book
    public function delete($id)
    {
        $book = Book::where('id', $id)->first();
        if (file_exists(public_path('uploads/' . $book->cover)) and !empty($book->cover)) {
            unlink(public_path('uploads/' . $book->cover));
        }
        $book->delete();
        return redirect()->route('book.show')->with('success', 'Book deleted successfully');
    }

    // public function delete()
    // {

    // }




    // delete all book
    // public function destroyAll()
    // {
    //     $books = Book::all();
    //     foreach ($books as $book) {
    //         if (file_exists(public_path('uploads/' . $book->cover)) and !empty($book->cover)) {
    //             unlink(public_path('uploads/' . $book->cover));
    //         }
    //     }
    //     Book::truncate();
    //     return redirect()->route('book.show')->with('success', 'All books deleted successfully');
    // }
}
