<?php

namespace App\Http\Livewire\Users;

use App\Repositoryinterface\UserRepositoryinterface;
use Livewire\Component;

class Index extends Component
{
    protected UserRepositoryinterface $usersRepository;

    public function mount(UserRepositoryinterface $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function render()
    {
        $users = $this->usersRepository->getusers();

        return view('livewire.users.index',compact('users'));
    }
}
