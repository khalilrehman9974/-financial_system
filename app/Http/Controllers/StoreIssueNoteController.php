<?php

namespace App\Http\Controllers;

use App\Models\StoreIssueNote;
use Illuminate\Http\Request;

class StoreIssueNoteController extends Controller
{
    public function __construct(){

    }

    public function index() {
        $issueNotes = StoreIssueNote::all();

        return view('store-issue-note.index', compact('issueNotes'));
    }

    public function create() {
        $title = 'Store Issue Note';
        return view('store-issue-note.create', compact('title'));
    }
    public function store() {

    }
}
