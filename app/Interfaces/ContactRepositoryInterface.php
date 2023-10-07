<?php

namespace App\Interfaces;

interface ContactRepositoryInterface {
    public function create($data);
    public function delete($id);
    public function getAll();
    public function getById($id, ?bool $jsonify = false);
    public function update($id, $data);
} 