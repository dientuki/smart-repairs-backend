<?php

namespace Tests\Unit\Http\Controllers;

use App\Login;
use Tests\TestCase;
use Illuminate\Support\Facades\Session;

class BrandsControllerTest extends TestCase
{
    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(Login::class)->create();
    }

    protected function successfulIndexRoute()
    {
        return route('brands.index');
    }

    public function testUserCanViewIndex()
    {
        $response = $this->actingAs($this->user)->get($this->successfulIndexRoute());

        $response->assertSuccessful();
        $response->assertViewIs('brands.index');
    }
}