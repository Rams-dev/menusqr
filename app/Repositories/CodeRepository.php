<?php

namespace App\Repositories;
use App\Models\Codes;

class CodeRepository extends BaseRepository{

    public function __construct(Codes $codes){
        parent::__construct($codes);
    }
}