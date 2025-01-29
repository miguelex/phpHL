<?php 

    namespace app\validators;

    use app\interfaces\ValidatorInterface;

    class Validator implements ValidatorInterface
    {
        private string $error;

        public function getError(): string
        {
            return $this->error;
        }

        public function validateAdd($data): bool
        {
            if (empty($data['name'])) {
                $this->error = 'Name is required';
                return false;
            }

            return true;
        }

        public function validateUpdate($data): bool
        {
            if(empty($data['id'])) {
                $this->error = 'ID is required';
                return false;
            }

            if (empty($data['name'])) {
                $this->error = 'Name is required';
                return false;
            }

            return true;
        }
    }