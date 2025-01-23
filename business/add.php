<?php

    namespace app\business;

    use app\exceptions\ValidatorException;
    use app\interfaces\RepositoryInterface;
    use app\interfaces\ValidatorInterface;

    class Add
    {
        private RepositoryInterface $repository;
        private ValidatorInterface $validator;

        public function __construct(RepositoryInterface $repository, ValidatorInterface $validator)
        {
            $this->repository = $repository;
            $this->validator = $validator;
        }

        public function add($data)
        {
            if (!$this->validator->validateAdd($data)) {
                throw new ValidatorException($this->validator->getError());
            }

            $this->repository->create($data);
        }
    }