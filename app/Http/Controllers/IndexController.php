<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $books = Book::query()->get();
        return view('index', compact('books'));
    }

    public function login() {
        return view('login');
    }

    public function register() {
        return view('register');
    }
}
