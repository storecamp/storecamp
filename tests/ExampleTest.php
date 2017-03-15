<?php


class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->artisan('migrate');
        $this->artisan('db:seed');

        $this->visit('/home')
             ->see('Navigation');
    }
}
