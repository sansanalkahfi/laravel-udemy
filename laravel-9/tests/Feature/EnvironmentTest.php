<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function PHPUnit\Framework\assertEquals;

class EnvironmentTest extends TestCase
{
    public function test_env()
    {
        $appName = env("ENV_TEST");
        self::assertEquals("Sansan Al Kahfi", $appName);
    }

    public function test_envDefaultValue()
    {
        $defaultTest = env("DEFAULT_TEST", "yah gak ada");
        self::assertEquals("yahgak ada", $defaultTest);
    }
}
