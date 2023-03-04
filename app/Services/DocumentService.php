<?php

namespace App\Services;

use App\Models\Document;
use App\Repositories\DocumentRepository;
use Illuminate\Support\Facades\Storage;

class DocumentService
{
    protected $documents;

    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documents = $documentRepository;
    }

    public function getAllDocument($attrs)
    {
        $documents = $this->documents->getAll($attrs);

        return view('documents.show', compact('documents'));
    }

    public function getDocumentById(int $id)
    {
        return $this->documents->getById($id);
    }

    public function createDocument(array $attrs)
    {
        $data = $this->handleFieldInput($attrs);
        $this->documents->store($data);

        return redirect()->route('documents.index')->with('success', 'Thêm tài liệu thành công');
    }

    public function updateDocumentById(int $id, array $attrs)
    {
        $checkFile = Document::select('file_name')->find($id);
        $data = $this->handleFieldInput($attrs, $checkFile->file_name);
        $this->documents->updateById($id, $data);

        return redirect()->route('documents.index')->with('success', 'Cập nhật tài liệu thành công'); 
    }


    public function deleteDocumentById(int $id)
    {
        //Delete file
        $checkFile = Document::select('file_name')->find($id);
        Storage::delete('contract/' . $checkFile->file_name);
        $this->documents->deleteById($id);

        return redirect()->route('documents.index')->with('success', 'Xóa tài liệu thành công'); 
    }

    public function storageDocument($file, $fileName)
    {
        return $file->storeAs('contract', $fileName);
    }

    public function handleFieldInput(array $attrs, $checkFile='')
    {
        //Storage file
        if (isset($attrs['file_name']) && $attrs['file_name'] != null) {

            if ($checkFile == $attrs['file_name']->getClientOriginalName() ) {
                unset($attrs['file_name']);

            } else {
                $fileName = time() . $attrs['file_name']->getClientOriginalName();
                $this->storageDocument($attrs['file_name'], $fileName);
                $attrs['file_name'] = $fileName;
            }
        }

        if (!isset($attrs['author_id'])) {
            $attrs['author_id'] = auth()->id();
        }

        return $attrs;
    }
}