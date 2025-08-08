<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class UserTests extends TestCase
{
    public function test_user_fillable_attributes()
    {
        $user = new User();
        $this->assertEquals([
            'name', 'username', 'email', 'password', ' job_title', 'profile_image', 'about_me'
        ], $user->getFillable());
    }

    public function test_user_hidden_attributes()
    {
        $user = new User();
        $this->assertEquals(['password', 'remember_token'], $user->getHidden());
    }

    public function test_user_casts()
    {
        $user = new User();
        $this->assertEquals(['email_verified_at' => 'datetime'], $user->getCasts());
    }

    public function test_user_has_many_projects()
    {
        $user = new User();
        $this->assertInstanceOf(HasMany::class, $user->projects());
    }

    public function test_user_belongs_to_many_issues()
    {
        $user = new User();
        $this->assertInstanceOf(BelongsToMany::class, $user->issues());
    }

    public function test_user_belongs_to_many_watching()
    {
        $user = new User();
        $this->assertInstanceOf(BelongsToMany::class, $user->watching());
    }

    public function test_user_can_be_created_with_factory()
    {
        $user = User::factory()->create();
        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }

    public function test_user_can_have_roles()
    {
        $user = User::factory()->create();
        $user->assignRole('admin');
        $this->assertTrue($user->hasRole('admin'));
    }

    public function test_user_email_must_be_unique()
    {
        User::factory()->create(['email' => 'test@example.com']);

        $this->expectException(\Illuminate\Database\QueryException::class);

        User::factory()->create(['email' => 'test@example.com']);
    }

}
