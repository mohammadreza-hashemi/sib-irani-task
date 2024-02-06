<?php

namespace App\Services\Interfaces;


interface MovieServiceInterface extends ServiceInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data);

    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id);

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id);


}
