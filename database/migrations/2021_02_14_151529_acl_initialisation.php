<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AclInitialisation extends Migration

{
    public const PERMISSIONS = [
        'admin.view',
        'admin.create.project',
        'admin.update.project',
        'admin.delete.project',
        'admin.update.project_users'
    ];

    public function up(): void
    {
        $permissions = collect (self::PERMISSIONS)->mapWithKeys(static function ($permission) {
            return [$permission => Permission::create(['name' => $permission])];
        });

        Role::findByName('super_admin')->givePermissionTo(self::PERMISSIONS);
        Role::findByName('admin')->givePermissionTo(self::PERMISSIONS);
        Role::findByName('manager')->givePermissionTo(self::PERMISSIONS);
    }

    public function down(): void
    {
        Role::findByName('super_admin')->revokePermissionTo(self::PERMISSIONS);
        Role::findByName('admin')->revokePermissionTo(self::PERMISSIONS);
        Role::findByName('manager')->revokePermissionTo(self::PERMISSIONS);

        collect(self::PERMISSIONS)->transform(static function (string $permission) {
            return Permission::findByName($permission);
        })->each(static function (Permission $permission) {
            return $permission->delete();
        });
    }

}
