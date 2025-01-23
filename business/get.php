<?php

    namespace app\business;

    use app\interfaces\RepositoryInterface;

    class Get
    {
        private RepositoryInterface $repository;

        public function __construct(RepositoryInterface $repository)
        {
            $this->repository = $repository;
        }

        public function get($id)
        {
            return $this->repository->get();
        }
    }