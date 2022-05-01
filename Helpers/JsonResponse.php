<?php

class JsonResponse
{

    public function __construct(
        public string $error,
        public string $message,
        public $data
    ) {
    }
}