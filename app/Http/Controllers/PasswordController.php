<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\PasswordUpdateForm;

class PasswordController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PasswordUpdateForm $request, User $user)
    {
        $user->update(['password' => $request->password]);
        session()->flash('password_updated', 'Password has been updated!');
        return back();
    }
}
