<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'settings_access',
            'permission_create',
            'permission_edit',
            'permission_show',
            'permission_delete',
            'permission_access',
            'patient_access',
            'patient_create',
            'patient_edit',
            'patient_show',
            'patient_delete',
            'role_access',
            'role_create',
            'role_edit',
            'role_show',
            'role_delete',
            'user_access',
            'user_create',
            'user_show',
            'user_edit',
            'user_delete',
            'client_access',
            'client_create',
            'client_show',
            'client_edit',
            'client_delete',
            'user_management_access',
            'calendar_access',
            'calendar_create',
            'calendar_show',
            'calendar_edit',
            'calendar_delete',
            'medical_record_access',
            'medical_record_create',
            'medical_record_show',
            'medical_record_edit',
            'medical_record_delete',
            'staff_access',
            'staff_show',
            'staff_edit',
            'staff_delete',
            'appointment_access',
            'appointment_create',
            'appointment_show',
            'appointment_edit',
            'appointment_delete',
        ];        

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
