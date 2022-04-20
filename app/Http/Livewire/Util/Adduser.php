<?php

namespace App\Http\Livewire\Util;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Adduser extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name, $email, $password, $username, $role;
    public function create()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'username' => 'required|unique:users,username',
            'role' => 'required',
        ]);

        User::create([
            'name' => ucwords($this->name),
            'username' => strtolower($this->username),
            'email' => strtolower($this->email),
            'password' => bcrypt($this->password),
            'role' => $this->role,
        ]);

        session()->flash('success', 'User added.');

    }

    public function update()
    {
        $this->userData = User::find($this->uId)->update([
            'name'=>$this->name ,
            'email'=>$this->email ,
            'username'=>$this->username ,
            'role'=>$this->role ,
            'password' >= bcrypt($this->password),
        ]);
        session()->flash('success', 'User updated.');
    }
    public $userData,$uId;
    public function edit($userId)
    {
        $this->userData=User::find($userId);
        $this->uId=$userId;
        $this->name=$this->userData->name;
        $this->email = $this->userData->email;
        $this->username = $this->userData->username;
        $this->role = $this->userData->role;
    }

    public function render()
    {
        $data=User::orderBy('id','ASC')->paginate(10);;
        return view('livewire.util.adduser',['data'=>$data]);
    }
}
