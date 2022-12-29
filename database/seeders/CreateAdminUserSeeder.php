<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->firstname = 'Admin';
        $user->lastname = 'Admin';
        $user->name= 'Admin';
        $user->email= 'admin@gmail.com';
        $user->password= 'admin123';
        $user->username= 'admin';
        $user->gender= 'Male';
        $user->address1 = [
            'city1' => '',
            'post_code' => '',];
            $user->image= 'user-avatar.png';
        $user->role= 'superadmin';
        $user->status= '1';
        $user->save();

        $role = Role::create(['name' => 'admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}