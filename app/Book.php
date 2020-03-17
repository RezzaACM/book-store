<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    // public $table = 'book';
    // query get data book from db
    public function get_book()
    {
        $sql = DB::select('select * from books');
        return $sql;
    }

    public function get_book_id($id)
    {
        $sql = DB::select('select * from books where id =' . $id);
        return $sql;
    }

    // public function updateBook($id)
    // {
    //     $sql = DB::table('users')->where('id',$id)->update();
    //     return $sql;
    // }
}
