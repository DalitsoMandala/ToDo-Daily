<?php

namespace App\Livewire;


use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use PhpParser\Node\Stmt\TryCatch;

class Settings extends Component
{



    public $first_name;

    public $last_name;
    public $phone_number;

    public $email;

    // Password-related fields
    public $oldPassword;
    public $newPassword;
    public $newPassword_confirmation;


    public function personalDetails()
    {

        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' =>
            [
                'required',
                Rule::unique('users')->ignore(auth()->user()->id),
            ],
        ]);

        try {
            //code...

            $person = User::find(Auth::user()->id);

            $person->email = $this->email;
            $person->phone = $this->phone_number;
            $person->save();

            if ($person->setting) {
                $person->setting()->update([
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                ]);
            } else {
                $person->setting()->create([
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                ]);
            }



            session()->flash('status', __('Personal details updated successfully!'));
            $this->reset();
        } catch (\Throwable $th) {
            //throw $th;

            session()->flash('error-message', __('Error, something went wrong!'));
        }
    }

    public function credentials()
    {



        $this->validate([
            'oldPassword' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Your old password  was entered incorrectly. Please try again.');
                    }
                },
            ],


            'newPassword' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        try {
            //code...
            $user = User::find(Auth::user()->id);

            $user->update([
                'password' => Hash::make($this->newPassword),
            ]);

            session()->flash('status', __('Password updated successfully!'));
            $this->reset();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error-message', __('Error, something went wrong!'));
        }
    }

    public function logout()
    {
        Auth::logout();
        $this->redirect(route('password.request'));
    }
    public function render()
    {
        $user = User::find(Auth::user()->id);
        if ($user && $user->setting) {
            $this->fill([
                'first_name' => $user->setting->first_name,
                'last_name' => $user->setting->last_name,
                'phone_number' => $user->phone,
                'email' => $user->email
            ]);
        }


        return view('livewire.settings');
    }
}
