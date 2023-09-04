<?php

namespace App\Http\Livewire\Dashboard\Users;

use App\Repositoryinterface\UserRepositoryinterface;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $pg = 30;
    protected $paginationTheme = 'bootstrap';

    public function render(UserRepositoryinterface $usersRepository)
    {
        // $this->usersRepository =  $usersRepository;
        $users =   $usersRepository->getusers($this->pg);

        return view('livewire.dashboard.users.index', compact('users'));
    }
}
