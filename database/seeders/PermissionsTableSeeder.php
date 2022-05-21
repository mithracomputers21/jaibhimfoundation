<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'setting_access',
            ],
            [
                'id'    => 19,
                'title' => 'district_create',
            ],
            [
                'id'    => 20,
                'title' => 'district_edit',
            ],
            [
                'id'    => 21,
                'title' => 'district_show',
            ],
            [
                'id'    => 22,
                'title' => 'district_delete',
            ],
            [
                'id'    => 23,
                'title' => 'district_access',
            ],
            [
                'id'    => 24,
                'title' => 'block_create',
            ],
            [
                'id'    => 25,
                'title' => 'block_edit',
            ],
            [
                'id'    => 26,
                'title' => 'block_show',
            ],
            [
                'id'    => 27,
                'title' => 'block_delete',
            ],
            [
                'id'    => 28,
                'title' => 'block_access',
            ],
            [
                'id'    => 29,
                'title' => 'panchayat_create',
            ],
            [
                'id'    => 30,
                'title' => 'panchayat_edit',
            ],
            [
                'id'    => 31,
                'title' => 'panchayat_show',
            ],
            [
                'id'    => 32,
                'title' => 'panchayat_delete',
            ],
            [
                'id'    => 33,
                'title' => 'panchayat_access',
            ],
            [
                'id'    => 34,
                'title' => 'habitation_create',
            ],
            [
                'id'    => 35,
                'title' => 'habitation_edit',
            ],
            [
                'id'    => 36,
                'title' => 'habitation_show',
            ],
            [
                'id'    => 37,
                'title' => 'habitation_delete',
            ],
            [
                'id'    => 38,
                'title' => 'habitation_access',
            ],
            [
                'id'    => 39,
                'title' => 'member_create',
            ],
            [
                'id'    => 40,
                'title' => 'member_edit',
            ],
            [
                'id'    => 41,
                'title' => 'member_show',
            ],
            [
                'id'    => 42,
                'title' => 'member_delete',
            ],
            [
                'id'    => 43,
                'title' => 'member_access',
            ],
            [
                'id'    => 44,
                'title' => 'paymentmethod_create',
            ],
            [
                'id'    => 45,
                'title' => 'paymentmethod_edit',
            ],
            [
                'id'    => 46,
                'title' => 'paymentmethod_show',
            ],
            [
                'id'    => 47,
                'title' => 'paymentmethod_delete',
            ],
            [
                'id'    => 48,
                'title' => 'paymentmethod_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
