<?php

namespace App\Http\Livewire\Dashboard\Users;

use App\Repositoryinterface\UserRepositoryinterface;
use Livewire\Component;

class CreateUser extends Component
{
    protected UserRepositoryinterface $usersRepository;

    public function mount(UserRepositoryinterface $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function render()
    {
        $users = $this->usersRepository->getusers();

        return view('livewire.dashboard.users.create-user');
    }
}
