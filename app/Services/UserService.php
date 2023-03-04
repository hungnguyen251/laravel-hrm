<?php

namespace App\Services;

use App\Models\Staff;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $users;

    public function __construct(UserRepository $userRepository)
    {
        $this->users = $userRepository;
    }

    public function getAllUser($attrs)
    {
        return $this->users->getAll($attrs);
    }

    public function getUserById(int $id)
    {
        return $this->users->getById($id);
    }

    public function createUser(array $attrs)
    {
        $data = $this->handleFieldInput($attrs);

        return $this->users->store($data);
    }

    public function updateUserById(int $id, array $attrs)
    {
        $data = $this->handleFieldInput($attrs);

        return $this->users->updateById($id, $data);
    }


    public function deleteUserById(int $id)
    {
        return $this->users->deleteById($id);
    }

    public function handleFieldInput(array $attrs)
    {
        if (isset($attrs['_token'])) {
            unset($attrs['_token']);
        }

        if (isset($attrs['_method'])) {
            unset($attrs['_method']);
        }

        if (isset($attrs['status']) && 'on' == $attrs['status']) {
            $attrs['status'] = 'active';
        } else {
            $attrs['status'] = 'inactive';
        }

        if (isset($attrs['password'])) {
            $attrs['password'] = Hash::make($attrs['password']);
        }

        if (isset($attrs['staff_id'])) {
            $staffId = Staff::select('id')->where('code', $attrs['staff_id'])->first();
            $attrs['staff_id'] = $staffId->id;
        }

        return $attrs;
    }
}