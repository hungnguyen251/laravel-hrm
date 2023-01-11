<?php

namespace App\Interfaces;

interface RepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll($attrs);

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function getById(int $id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function store(array $attrs);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function updateById(int $id, array $attrs);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function deleteById(int $id);
}