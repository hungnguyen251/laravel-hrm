<?php

namespace App\Interfaces;

interface RepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function store($attrs = []);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, $attrs = []);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function deleteById($id);
}