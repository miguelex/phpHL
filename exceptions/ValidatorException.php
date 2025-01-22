<?php 

    namespace app\exceptions;

    use Exception;

    class ValidatorException extends Exception
    {
        public function __construct($message)
        {
            parent::__construct($message);
        }
    }