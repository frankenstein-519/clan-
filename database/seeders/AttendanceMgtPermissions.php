<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AttendanceMgtPermissions extends Seeder
{
    /**
     * Run the database seeds.
      */
      public function run(): void
      {
         // Define the permissions
         $permissions = [
          'register-hr-attendance',
          'view-hr-attendance',
          'edit-hr-attendance',
          'delete-hr-attendance'
      ];
  
      // Create each permission
      foreach ($permissions as $permission) {
          Permission::firstOrCreate(['name' => $permission]);
      }
      $adminRole = Role::where('name', 'admin')->first();
          if (!$adminRole) {
              $adminRole = Role::create(['name' => 'admin']);
          }
  
          foreach ($permissions as $permission) {
              $adminRole->givePermissionTo($permission);
          }
      }
  }
  