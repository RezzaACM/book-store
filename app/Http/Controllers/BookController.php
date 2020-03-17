<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{


    public function __construct(Book $model)
    {
        $this->book = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['books'] = $this->book->get_book();
        return view('book/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('book/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            // 'qty' => 'required'
        ]);

        $book = $this->book;
        $book->title = $request->get('title');
        $book->description = $request->get('description');
        $book->qty = $request->get('qty');
        $book->publisher = $request->get('publisher');
        $book->save();

        return redirect('books')->with('status', 'New Record Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show detail data by id
        $data['getBookId'] = $this->book->get_book_id($id);
        // var_dump($data['getBookId'][0]->title);
        return view('book.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => 'required',
            // 'qty' => 'required'
        ]);
        $book = $this->book::find($id);
        $book->title = $request->get('title');
        $book->description = $request->get('description');
        $book->qty = $request->get('qty');
        $book->publisher = $request->get('publisher');
        $book->save();

        return redirect('books')->with('status', 'New Record Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('books')->where('id', $id)->delete();
        return redirect('books')->with('status', 'One Recorde Has Been Deleted');
    }
}
