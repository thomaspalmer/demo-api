<?php

namespace App\Repositories;

use App\Models\User;
use Prettus\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository
{
    /***
     * @return string
     */
    function model(): string
    {
        return User::class;
    }
}
