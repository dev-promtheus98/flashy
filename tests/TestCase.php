<?php

namespace DevPromtheus98\Flashy\Tests;

use DevPromtheus98\Flashy\FlashyNotifier;
use Orchestra\Testbench\TestCase as Orchestra;
use DevPromtheus98\Flashy\FlashyServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Mockery as m;

class TestCase extends Orchestra
{
    protected $session;

    protected $flashy;

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'DevPromtheus98\\Flashy\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );

        $this->session = m::mock('DevPromtheus98\Flashy\SessionStore');
        $this->flashy = new FlashyNotifier($this->session);
    }

    protected function getPackageProviders($app)
    {
        return [
            FlashyServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_flashy_table.php.stub';
        $migration->up();
        */
    }

    /** @test */
    public function it_displays_default_flashy_notifications()
    {
        $this->session->shouldReceive('flashy')->with('flashy_notification.message', 'Welcome Aboard');
        $this->session->shouldReceive('flashy')->with('flashy_notification.link', '#');
        $this->session->shouldReceive('flashy')->with('flashy_notification.type', 'success');

        $this->flashy->message('Welcome Aboard');
    }

    /** @test */
    public function it_displays_info_flashy_notifications()
    {
        $this->session->shouldReceive('flashy')->with('flashy_notification.message', 'Welcome Aboard');
        $this->session->shouldReceive('flashy')->with('flashy_notification.link', '#');
        $this->session->shouldReceive('flashy')->with('flashy_notification.type', 'info');

        $this->flashy->info('Welcome Aboard');
    }

    /** @test */
    public function it_displays_success_flashy_notifications()
    {
        $this->session->shouldReceive('flashy')->with('flashy_notification.message', 'Welcome Aboard');
        $this->session->shouldReceive('flashy')->with('flashy_notification.link', '#');
        $this->session->shouldReceive('flashy')->with('flashy_notification.type', 'success');

        $this->flashy->success('Welcome Aboard');
    }

    /** @test */
    public function it_displays_error_flashy_notifications()
    {
        $this->session->shouldReceive('flashy')->with('flashy_notification.message', 'Uh Oh');
        $this->session->shouldReceive('flashy')->with('flashy_notification.link', '#');
        $this->session->shouldReceive('flashy')->with('flashy_notification.type', 'error');

        $this->flashy->error('Uh Oh');
    }

    /** @test */
    public function it_displays_warning_flashy_notifications()
    {
        $this->session->shouldReceive('flashy')->with('flashy_notification.message', 'Be careful!');
        $this->session->shouldReceive('flashy')->with('flashy_notification.link', '#');
        $this->session->shouldReceive('flashy')->with('flashy_notification.type', 'warning');

        $this->flashy->warning('Be careful!');
    }

    /** @test */
    public function it_displays_primary_flashy_notifications()
    {
        $this->session->shouldReceive('flashy')->with('flashy_notification.message', 'Thanks for signing up!');
        $this->session->shouldReceive('flashy')->with('flashy_notification.link', '#');
        $this->session->shouldReceive('flashy')->with('flashy_notification.type', 'primary');

        $this->flashy->primary('Thanks for signing up!');
    }

    /** @test */
    public function it_displays_primary_dark_flashy_notifications()
    {
        $this->session->shouldReceive('flashy')->with('flashy_notification.message', 'Thanks for signing up!');
        $this->session->shouldReceive('flashy')->with('flashy_notification.link', '#');
        $this->session->shouldReceive('flashy')->with('flashy_notification.type', 'primary-dark');

        $this->flashy->primaryDark('Thanks for signing up!');
    }

    /** @test */
    public function it_displays_muted_flashy_notifications()
    {
        $this->session->shouldReceive('flashy')->with('flashy_notification.message', 'Can you see me?');
        $this->session->shouldReceive('flashy')->with('flashy_notification.link', '#');
        $this->session->shouldReceive('flashy')->with('flashy_notification.type', 'muted');

        $this->flashy->muted('Can you see me?');
    }

    /** @test */
    public function it_displays_muted_dark_flashy_notifications()
    {
        $this->session->shouldReceive('flashy')->with('flashy_notification.message', 'Can you see me?');
        $this->session->shouldReceive('flashy')->with('flashy_notification.link', '#');
        $this->session->shouldReceive('flashy')->with('flashy_notification.type', 'muted-dark');

        $this->flashy->mutedDark('Can you see me?');
    }
}
