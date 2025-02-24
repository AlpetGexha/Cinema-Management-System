<?php

namespace App\Filament\Page;

use Filament\Forms\Form;
use Filament\Pages\Auth\Login as BaseAuth;

class Login extends BaseAuth
{
    public function mount(): void
    {
        parent::mount();

        $this->form->fill([
            'email' => 'test@example.com',
            'password' => 'password',
            'remember' => true,
        ]);
    }
}
