<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user_list',
           'user_create',
           'user_edit',
           'user_delete',
           'user_activation',
           'log_view',
           'change_logo',
           'view_settings',
           'view_color_list',
           'color_create',
           'color_edit',
           'color_delete',
           'calander_list',
           'calander_create',
           'calander_edit',
           'calander_delete',
           'organizational_unit_list',
           'organizational_unit_create',
           'organizational_unit_edit',
           'organizational_unit_delete',
           'view_employee_plan',
           'view_plan_report',
           'approve_plan',
           'view_previous_plan',
           'insert_plan',
           'edit_plan',
           'delete_plan',
           'update_planing_time',
           'view_assigned_permission',
           'motivation_list',
           'motivation_create',
           'motivation_edit',
           'motivation_delete'

        ];
      
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}