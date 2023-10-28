<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GeneralSetting;

class AdminSettings extends Component
{
    public $tab = null;
    public $default_tab = 'general_settings';
    protected $queryString = ['tab'];
    public $site_name, $site_email, $site_phone, $site_meta_keywords, $site_meta_description;


    public function selectTab($tab){
        $this->tab = $tab;
    }

    public function mount(){
        $this->tab = request()->tab ? request()->tab : $this->default_tab;

        //Populate for site_name, site_email...
        $this->site_name =get_settings()->site_name;
        $this->site_email =get_settings()->site_email;
        $this->site_phone =get_settings()->site_phone;
        $this->site_meta_keywords =get_settings()->site_meta_keywords;
        $this->site_meta_description =get_settings()->site_meta_description;
    }

    public function updateGeneralSettings(){
        //validate site_name and site_email
        $this->validate([
            'site_name'=>'required',
            'site_email'=>'required|email'
        ]);

        //update general settings
        $settings = new GeneralSetting();
        $settings = $settings->first();
        $settings->site_name = $this->site_name;
        $settings->site_email = $this->site_email;
        $settings->site_phone = $this->site_phone;
        $settings->site_meta_keywords = $this->site_meta_keywords;
        $settings->site_meta_description = $this->site_meta_description;
        $update = $settings->save();

        if ($update) {
            session()->flash('message', 'General settings have been successfully updated.');
            session()->flash('alert-class', 'alert-success');
        } else {
            session()->flash('message', 'Something went wrong.');
            session()->flash('alert-class', 'alert-danger');
        }
    }

    // public function showToastr($type, $message){
    //     return $this->dispatch('showToastr',[
    //         'type'=>$type,
    //         'message'=>$message
    //     ]);
    // }

    public function render()
    {
        return view('livewire.admin-settings');
    }
}
