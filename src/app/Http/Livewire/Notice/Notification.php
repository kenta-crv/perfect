<?php

namespace App\Http\Livewire\Notice;

use Livewire\Component;
use App\Models\Notifications;
class Notification extends Component
{

    public 
           $target_stores,
           $date_in,
           $time_in,
           $date_out,
           $time_out,
           $date_content,
           $title,
           $content,
           $flag,
           $mail_flag;

    public function render()
    {
        return view('livewire.notice.notification');
    }

    public function resetFields(){
        $this->target_stores = '';
        $this->date_in = '';
        $this->time_in = '';
        $this->date_out = '';
        $this->time_out = '';
        $this->date_content = '';
        $this->title = '';
        $this->content = '';
        $this->flag = '';
        $this->mail_flag = '';
    }

    public function save(){

        $this->validate([
            'target_stores' => 'required',
            'date_in' => 'required',
            'time_in' => 'required',
            'date_out' => 'required',
            'time_out' => 'required',
            'date_content' => 'required',
            'title' => 'required',
            'content' => 'required',
            'flag' => 'required',
            'mail_flag' => 'required',
        ]);

        $save = Notifications::insert([
            'target_store' => $this->target_stores,
            'date_in' => $this->date_in,
            'time_in' => $this->time_in,
            'date_out' => $this->date_out,
            'time_out' => $this->time_out,
            'date_content' => $this->date_content,
            'title' => $this->title,
            'content' => $this->content,
            'flag' => $this->flag,
            'mail_flag' => $this->mail_flag
        ]);

        if($save){
            $this->dispatchBrowserEvent('InsertedSuccessfully');
            $this->resetFields();
        }
    }
}
