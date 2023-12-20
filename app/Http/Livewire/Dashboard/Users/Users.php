<?php

namespace App\Http\Livewire\Dashboard\Users;

use App\Repositoryinterface\UserRepositoryinterface;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
        use WithPagination;

        public $pg = 30,$search;
        protected $paginationTheme = 'bootstrap';
        public function updatedSearch()
        {
            $this->resetPage();
        }
    public function render(UserRepositoryinterface $usersRepository)
    {
        // $this->usersRepository =  $usersRepository;
        $users =   $usersRepository->getusers($this->pg,$this->search);

        return view('livewire.dashboard.users.index', compact('users'));
    }
}
