<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class MyPage extends Component
{
    public $edit_name, $edit_email, $edit_password, $user_id;

    public function render()
    {
        if(session()->has('LoggedUser')){
            $user = User::where('id', '=', session('LoggedUser'))->first();
            // $data = [
            //     'LoggedUserInfo' => 1
            // ];
        }

        return view('livewire.admin.my-page');
    }

    public function OpenEditAdminInformation($id){
        $info = User::find($id);
        $this->edit_name = $info->name;
        $this->edit_email = $info->email;
        $this->user_id = $info->id;
        $this->dispatchBrowserEvent('OpenEditAdminInformation',[
            'id' => $id
        ]);
    }

    public function update(){
        $user_id = $this->user_id;
        $this->validate([
            'edit_name' => 'required',
            'edit_email' => 'required'
        ]);

        $update = User::find($user_id)->update([
            'name' => $this->edit_name,
            'email' => $this->edit_email,
            'password' => Hash::make($this->edit_password),
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseUpdateModal');
        }
    }

}
