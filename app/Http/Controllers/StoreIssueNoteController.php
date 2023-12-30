<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIssueNoteRequest;
use App\Models\StoreIssueNote;
use App\Services\StoreIssueNoteService;
use Illuminate\Http\Request;

class StoreIssueNoteController extends Controller
{
    private $storeIssueNoteService;

    public function __construct(StoreIssueNoteService $storeIssueNoteService){
        $this->storeIssueNoteService = $storeIssueNoteService;
    }

    public function index() {
        $issueNotes = StoreIssueNote::all();

        return view('store-issue-note.index', compact('issueNotes'));
    }

    public function create() {
        $title = 'Store Issue Note';
        return view('store-issue-note.create', compact('title'));
    }
    
    public function store(StoreIssueNoteRequest $request) {
        $data = $request->except('_token','id');
        $this->storeIssueNoteService->findUpdateOrCreate(StoreIssueNote::class, ['id'=>!empty(request('id')) ? request('id') : null], $data);
        $message =  !empty(request('id')) ? config('constants.update') : config('constants.add');
        session()->flash('message', $message);

        return redirect('store-issue-note.list');
    }
}
