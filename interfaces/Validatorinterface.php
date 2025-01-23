<?php 

    namespace app\interfaces;

    interface ValidatorInterface
    {
        public function validateAdd ($data): bool;
        public function validateUpdate ($data): bool;
        public function getError(): string;
    }