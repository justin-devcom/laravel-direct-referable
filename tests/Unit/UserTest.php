<?php

namespace Jxclsv\Referable\Tests\Unit;

use Jxclsv\Referable\Models\User;
use Jxclsv\Referable\Tests\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function creates_initial_test_user()
    {
        $this->assertEquals('tester', $this->user->name);
        $this->assertEquals('tester@tester.com', $this->user->email);
        $this->assertCount(1, User::all());
    }
}
