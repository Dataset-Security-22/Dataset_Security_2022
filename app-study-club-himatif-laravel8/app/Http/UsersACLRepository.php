<?php

namespace App\Http;

use Alexusmai\LaravelFileManager\Services\ACLService\ACLRepository;
use Illuminate\Support\Facades\Session;

class UsersACLRepository implements ACLRepository
{
    /**
     * Get user ID
     *
     * @return mixed
     */
    public function getUserID()
    {
        // dd(\Auth::user());
        return \Auth::id();
    }

    /**
     * Get ACL rules list for user
     *
     * @return array
     */
    public function getRules(): array
    {
        if (\Auth::id() === 1) {
            return [
                ['disk' => 'disk-name', 'path' => '*', 'access' => 2],
            ];
        }
        
        return [
            ['disk' => 'disk-name', 'path' => '/', 'access' => 1],
            ['disk' => 'disk-name', 'path' => 'users', 'access' => 1],
            ['disk' => 'disk-name', 'path' => 'users/'. \Auth::user()->name, 'access' => 1],
            ['disk' => 'disk-name', 'path' => 'users/'. \Auth::user()->name .'/*', 'access' => 2],
        ];
    }
}