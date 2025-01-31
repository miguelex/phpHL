<?php

    namespace app\business;

    use app\exceptions\ValidatorException;
    use app\exceptions\DataException;
    use app\interfaces\RepositoryInterface;
    use app\interfaces\ValidatorInterface;

    class Update
    {
        private RepositoryInterface $repository;
        private ValidatorInterface $validator;

        public function __construct(RepositoryInterface $repository, ValidatorInterface $validator)
        {
            $this->repository = $repository;
            $this->validator = $validator;
        }

        public function update($data)
        {
            if (!$this->validator->validateUpdate($data)) {
                throw new ValidatorException($this->validator->getError());
            }

            if (!$this->repository->exists((int)$data['id'])) {
                throw new DataException('Data not found');
            }

            $this->repository->update($data);
        }
    }