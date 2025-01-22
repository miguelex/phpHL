<?php 

    namespace app\interfaces;

    interface ValidatorInterface
    {
        public function create ($data);
        public function get(): array;
    }