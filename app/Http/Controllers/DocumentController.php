<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Services\DocumentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    protected $documents;

    /**
     * Controller constructor.
     *
     * @param  \App\  $documents
     */
    public function __construct(DocumentService $documents)
    {
        $this->documents = $documents;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->documents->getAllDocument($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(DocumentRequest $request)
    {
        return $this->documents->createDocument($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $document = $this->documents->getDocumentById($id);

        return response()->json($document, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(int $id, Request $request)
    {
        return $this->documents->updateDocumentById($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        return $this->documents->deleteDocumentById($id);
    }

    /**
     * Edit a document.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *  
     */
    public function edit(int $id)
    {
        $document = $this->documents->getDocumentById($id);

        return view('documents.edit', compact('document'));
    }

    /**
     * Create a document.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Download a file.
     *
     * @param  \Illuminate\Http\Request  $request
     *  
     */
    public function download($file)
    {
        return Storage::download('contract/' . $file);
    }
}
