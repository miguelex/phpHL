<?php

    namespace app\business;

    use app\exceptions\DataException;
    use app\interfaces\RepositoryInterface;

    class Delete
    {
        private RepositoryInterface $repository;

        public function __construct(RepositoryInterface $repository)
        {
            $this->repository = $repository;
        }

        public function delete(int $id)
        {
            if (!$this->repository->exists($id)) {
                throw new DataException('Data not found');
            }

            $this->repository->delete($id);
        }
    }
    