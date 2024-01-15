<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class SampleTest extends TestCase
{
    public function setUp() : void
    {
        parent::setUp();
        // Artisan::call('config:clear');
        Artisan::call('migrate:refresh');
        
        // Userモデル10件
        User::factory(10)
            ->create();
    }

    /**
     * ユーザー一覧取得
     *
     * @author s_sakamoto
     * @category ユーザー
     * @return void
     */
    public function test_user_get_list() : void
    {
        ### Arrange
        // Nothing to do.

        ### Act
        $users = User::all();

        ### Assert
        $this->assertNotNull($users);
        $this->assertNotEmpty($users);
        $this->assertSame(10, $users->count(), 'User count is not same as expected.');
    }

    /**
     * ユーザ詳細取得
     *
     * @author s_sakamoto
     * @category ユーザー
     * @return void
     */
    public function test_user_get_detail() : void
    {
        ### Arrange
        // Nothing to do.

        ### Act
        $user = User::query()
            ->where('id', 1)
            ->get();

        ### Assert
        $this->assertNotNull($user);
        $this->assertNotEmpty($user);
        $this->assertSame(1, $user->count(), 'User count is not same as expected.'); // わざと期待値を間違えている
    }
}
