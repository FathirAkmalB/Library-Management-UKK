<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookLend;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = Auth::user();
        // $categories = Category::all();

        // return view('User.book', ['user' => $user, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $categories = Category::all();

        return view('User.form.add_book', ['user' => $user, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_code' => ['required', 'string', 'max:25'],
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'max:255'],
            'category_id' => ['required', 'max:255'],
            'stock' => ['required'],
            'cover' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2000'],
            'description' => ['required', 'max:255'],
        ]);

        // dd($request);
        // Buat buku baru
        $data = [
            'book_code' => $request->book_code,
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
            'description' => $request->description,
        ];


        // Simpan gambar di direktori 'avatar' di storage public
        if ($request->hasFile('cover')) {
            $fileName = uniqid() . '.' . $request->file('cover')->getClientOriginalExtension();
            $pathImage = $request->file('cover')->storeAs('cover', $fileName, 'public');
            $data['cover'] = $pathImage;
        } else {
            // Jika tidak ada file cover yang diunggah, gunakan cover default
            $data['cover'] = 'cover/defaultCover.png';
        }

        Book::create($data);
        return redirect()->route('books');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        $createdAtFormatted = Carbon::parse($book->created_at)->format('d M Y');
        $book->formatted_created_at = $createdAtFormatted;

        $collection = Collection::where('book_id', $id)->first();
        $avgRating = $book->ratings->avg('rating');

        $ratings = Rating::with('user')->where('book_id', $id)->get();

        $userId = Auth::user()->id;
        
        $bookLend = BookLend::where('book_id', $id)
        ->where('user_id', $userId)
        ->first();
        $bookLend = $bookLend ?? null;

        if ($collection) {
            // Cek apakah ada user_id yang sama dengan user_id yang sedang login
            $sameUser = Collection::with('user')->where('user_id', $userId)->exists();
            
            // Jika ada user_id yang sama, atur nilai boolean false ke variabel datetime
            $collectionDateTime = $sameUser ? false : $collection->created_at;
        } else {
            // Jika tidak ada koleksi, atur nilai null ke variabel datetime
            $collectionDateTime = null;
        }

        return view('User.Detail.detail_book', compact('book', 'ratings', 'bookLend', 'collection', 'collectionDateTime', 'avgRating'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::all();
        return view('User.Form.add_book', ['book' => $book, 'categories' => $categories, 'action' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'max:255'],
            'category_id' => ['required', 'max:255'],
            'status' => ['required'],
            'stock' => ['required'],
            'description' => ['required', 'max:255'],
        ]);
        // dd($request);

        $book = Book::findOrFail($id);

        // Update data buku
        $book->title = $request->title;
        $book->author = $request->author;
        $book->category_id = $request->category_id;
        $book->stock = $request->stock;
        $book->status = $request->status;
        $book->description = $request->description;

        if ($request->hasFile('cover')) {
            $fileName = uniqid() . '.' . $request->file('cover')->getClientOriginalExtension();
            $pathImage = $request->file('cover')->storeAs('cover', $fileName, 'public');
            $book->cover = $pathImage;
        } else {
            $book->avatar = 'cover/defaultCover.png';
        }

        $book->save();

        return redirect()->route('books');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function storeRating(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Rating::create([
            'user_id' => auth()->user()->id,
            'book_id' => $request->book_id,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Rating added successfully.');
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }
}
