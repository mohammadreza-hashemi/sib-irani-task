<?php

namespace App\Services;

use App\Repository\Interfaces\MovieRepositoryInterface;
use App\Services\Interfaces\MovieServiceInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MovieService extends BaseService implements MovieServiceInterface
{
    private MovieRepositoryInterface $movieRepository;

    /**
     * @param MovieRepositoryInterface $movieRepository
     */
    public function __construct(MovieRepositoryInterface $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->movieRepository->store($data);
    }

    /**
     * @param int $id
     * @return void
     */
    public function show(int $id)
    {
        return $this->movieRepository->show($id);
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id)
    {
        return $this->movieRepository->update($data, $id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id)
    {
        return $this->movieRepository->destroy($id);
    }

}
