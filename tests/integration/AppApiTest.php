<?php

/*
 * This file is part of Jitamin.
 *
 * Copyright (C) Jitamin Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once __DIR__.'/BaseApiTest.php';

class AppApiTest extends BaseApiTest
{
    public function testGetTimezone()
    {
        $this->assertEquals('UTC', $this->app->getTimezone());
    }

    public function testGetVersion()
    {
        $this->assertEquals('master', $this->app->getVersion());
    }

    public function testGetApplicationRoles()
    {
        $roles = $this->app->getApplicationRoles();
        $this->assertCount(3, $roles);
        $this->assertEquals('Administrator', $roles['app-admin']);
        $this->assertEquals('Manager', $roles['app-manager']);
        $this->assertEquals('User', $roles['app-user']);
    }

    public function testGetProjectRoles()
    {
        $roles = $this->app->getProjectRoles();
        $this->assertCount(3, $roles);
        $this->assertEquals('Project Manager', $roles['project-manager']);
        $this->assertEquals('Project Member', $roles['project-member']);
        $this->assertEquals('Project Viewer', $roles['project-viewer']);
    }

    public function testGetDefaultColor()
    {
        $this->assertEquals('yellow', $this->user->getDefaultTaskColor());
    }

    public function testGetDefaultColors()
    {
        $colors = $this->user->getDefaultTaskColors();
        $this->assertNotEmpty($colors);
        $this->assertArrayHasKey('red', $colors);
    }

    public function testGetColorList()
    {
        $colors = $this->user->getColorList();
        $this->assertNotEmpty($colors);
        $this->assertArrayHasKey('red', $colors);
        $this->assertEquals('Red', $colors['red']);
    }
}