<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Document;
use Exception;
use Illuminate\Support\Facades\Config;

class DocumentRepository implements RepositoryInterface
{
    protected $document;

    public function __construct(Document $document) 
    {
        $this->document = $document;
    }

    public function getAll($attrs)
    {
        return $this->document->filter($attrs)->paginate(Config::get('app.limit_results_returned'));
    }

    public function getById(int $id)
    {
        return $this->document->findOrFail($id);
    }

    public function store(array $attrs)
    {
        try {
            return $this->document->create($attrs);

        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    public function updateById(int $id, $attrs)
    {
        try {
            $data =  $this->document->findOrFail($id);

            return (bool) $data->update($attrs);
        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }


    public function deleteById(int $id)
    {
        $data = $this->document->findOrFail($id);

        return (bool) $data->delete();
    }
}