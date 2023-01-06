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

    public function getAllUser()
    {
        return $this->users->getAll();
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

        if (isset($attrs['decentralization'])) {
            if ('Trùm' == $attrs['decentralization']) {
                $attrs['decentralization'] = 'super_admin';
            } else if ('Quản trị viên' == $attrs['decentralization']) {
                $attrs['decentralization'] = 'admin';
            } else if ('Kế toán' == $attrs['decentralization']) {
                $attrs['decentralization'] = 'accountant';
            } else {
                $attrs['decentralization'] = 'staff';
            }
        }

        if (isset($attrs['staff_id'])) {
            $staffId = Staff::select('id')->where('code', $attrs['staff_id'])->first();
            $attrs['staff_id'] = $staffId->id;
        }

        return $attrs;
    }
}