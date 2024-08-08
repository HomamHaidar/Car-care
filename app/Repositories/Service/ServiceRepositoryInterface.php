<?php
namespace App\Repositories\Service;

interface ServiceRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(array $data, $serviceId);

    public function delete($id);

    public function find($id);
}
