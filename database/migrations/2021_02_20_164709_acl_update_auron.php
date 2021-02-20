<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class AclUpdateAuron extends Migration
{

    /**
     * This could be done as a function rather than a migration but imo it is better suited to a migration
     *  as a run only once type of deal
     */

    public const PERMISSIONS = [
        'admin.permissions',
        'projects.view',
        'project.issue.create',
        'project.issues.view',
        'project.view.taskboard',
        'issues.view',
        'issues.view.priority',
        'issues.view.status',
        'issue.view',
        'issue.update',
        'issue.delete',
        'tasks.view',
        'tasks.assigned',
        'tasks.reported',
        'tasks.viewed',
        'tasks.watching',
        'profile.view',
        'profile.edit',
        'profile.update',
        'fast.logout'
    ];

    public function up(): void
    {
        $permissions = collect (self::PERMISSIONS)->mapWithKeys(static function ($permission) {
            return [$permission => Permission::create(['name' => $permission])];
        });

        $guestPermissions = [ 'projects.view', 'project.issues.view'];

        // give all new permissions to all roles except guest
        Role::findByName('super_admin')->givePermissionTo(self::PERMISSIONS);
        Role::findByName('admin')->givePermissionTo(self::PERMISSIONS);
        Role::findByName('manager')->givePermissionTo(self::PERMISSIONS);
        Role::findByName('coder')->givePermissionTo(self::PERMISSIONS);
        Role::findByName('tester')->givePermissionTo(self::PERMISSIONS);
        Role::findByName('reporter')->givePermissionTo(self::PERMISSIONS);
        Role::findByName('guest')->givePermissionTo($guestPermissions);

        // admin
        Role::findByName('admin')->revokePermissionTo('tasks.view');
        Role::findByName('admin')->revokePermissionTo('tasks.assigned');
        Role::findByName('admin')->revokePermissionTo('tasks.reported');
        Role::findByName('admin')->revokePermissionTo('tasks.viewed');
        Role::findByName('admin')->revokePermissionTo('tasks.watching');

        // manager
        Role::findByName('manager')->revokePermissionTo('admin.permissions');
        Role::findByName('manager')->revokePermissionTo('fast.logout');


        // coder
        Role::findByName('coder')->revokePermissionTo('admin.permissions');
        Role::findByName('coder')->revokePermissionTo('issue.delete');
        Role::findByName('coder')->revokePermissionTo('fast.logout');

        // tester
        Role::findByName('tester')->revokePermissionTo('admin.permissions');
        Role::findByName('tester')->revokePermissionTo('issue.delete');
        Role::findByName('tester')->revokePermissionTo('fast.logout');


        // reporter
        Role::findByName('reporter')->revokePermissionTo('admin.permissions');
        Role::findByName('reporter')->revokePermissionTo('project.view.taskboard');
        Role::findByName('reporter')->revokePermissionTo('issues.view.priority');
        Role::findByName('reporter')->revokePermissionTo('issues.view.status');
        Role::findByName('reporter')->revokePermissionTo('issue.update');
        Role::findByName('reporter')->revokePermissionTo('issue.delete');
        Role::findByName('reporter')->revokePermissionTo('tasks.assigned');
        Role::findByName('reporter')->revokePermissionTo('fast.logout');
    }

    public function down(): void
    {
        collect(self::PERMISSIONS)->transform(static function (string $permission) {
            return Permission::findByName($permission);
        })->each(static function (Permission $permission) {
            return $permission->delete();
        });
    }
}
