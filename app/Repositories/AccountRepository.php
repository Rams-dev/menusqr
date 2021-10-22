<?php

namespace App\Repositories;
use App\Models\Account;

class AccountRepository extends BaseRepository{
    
    public function __construct(Account $account){
        parent::__construct($account);

    }
    
}