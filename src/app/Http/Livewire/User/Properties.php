<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Properties as property;

class Properties extends Component
{
    public
        $email,
        $contact_no,
        $line_id,
        $fax_no,
        $license_no,
        $hb_license_no,
        $no_listed_properties,
        $company_name,
        $registered_members,
        $comment_pr,
        $convey_message,
        $is_home_page,
        $photo_path,
        $photo_file,
        $price,
        $capacity,
        $home_page_url,
        $is_send_alert,
        $items_printed,
        $google_location,
        $postal_code,
        $is_profile_page,
        $location,
        $address;

    public function resetFields(){
        $this->email = '';
        $this->contact  = '';
        $this->line_id = '';
        $this->fax_no = '';
        $this->license = '';
        $this->registered_members = '';
        $this->comment_priority = '';
        $this->convey_message;
        $this->is_home_page = '';
        $this->photo_path = '';
        $this->photo_file = '';
        $this->price = '';
        $this->capacity = '';
        $this->home_page_url = '';
        $this->is_send_alert = '';
        $this->items_printed = '';
        $this->google_location = '';
        $this->postal_code = '';
        $this->is_profile_page = '';
        $this->location = '';
        $this->address = '';
    }
    public function rules(){
        return config('validation.validate.properties');
    }

    public function store(){
        // dd('dfdfd');
        $validate_input = $this->validate($this->rules());
        property::create($validate_input);
    }

    public function render()
    {
        return view('livewire.user.properties');
    }
}
