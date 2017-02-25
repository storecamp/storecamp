<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Contracts\Console\Kernel;

/**
 * Class StoreCampTest
 */
class StoreCampTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * StoreCampTest constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Http\Kernel::class);

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Set up tests.
     */
    public function setUp()
    {
        parent::setUp();
        App::setLocale('en');
    }

    /**
     * Test Login Page.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->visit('/login')
            ->see('Sign in to start your session');
    }

    /**
     * Test Login.
     *
     * @return void
     */
    public function testLogin()
    {
        $faker = Faker::create();
        $user = factory(\App\Core\Models\User::class)->create(['name' => $faker->name, 'email' => $faker->email, "password" => "passw0RD"]);

        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('passw0RD', 'password')
            ->press('Sign In')
            ->seePageIs('/')
            ->see($user->name);
    }

    /**
     * Test Login.
     *
     * @return void
     */
    public function testLoginRequiredFields()
    {
        $this->visit('/login')
            ->type('', 'email')
            ->type('', 'password')
            ->press('Sign In')
            ->see('The email field is required')
            ->see('The password field is required');
    }

    /**
     * Test Register Page.
     *
     * @return void
     */
    public function testRegisterPage()
    {
        $this->visit('/register')
            ->see('Register a new membership');
    }

    /**
     * Test Password reset Page.
     *
     * @return void
     */
    public function testPasswordResetPage()
    {
        $this->visit('/password/reset')
            ->see('Reset Password');
    }

    /**
     * Test home page works with Authenticated Users.
     *
     * @return void
     */
    public function testHomePageForAuthenticatedUsers()
    {
        $user = factory(\App\Core\Models\User::class)->create();

        $this->actingAs($user)
            ->visit('/')
            ->see($user->name);
    }

    /**
     * Test log out.
     *
     * @return void
     */
    public function testLogout()
    {
        $user = factory(\App\Core\Models\User::class)->create();

        $form = $this->actingAs($user)->visit('/')->getForm('logout');

        $this->actingAs($user)
            ->visit('/')
            ->makeRequestUsingForm($form)
            ->seePageIs('/');
    }

    /**
     * Test 404 Error page.
     *
     * @return void
     */
    public function test404Page()
    {
        $this->get('asdasdjlapmnnk')
            ->seeStatusCode(404)
            ->see('Oops! Page not found.')
            ->see('404');
    }

    /**
     * Test user registration.
     *
     * @return void
     */
    public function testNewUserRegistration()
    {
        $this->artisan('db:seed');
        $this->visit('/register')
            ->type('Sergi Tur Badenas', 'name')
            ->type('sergiturbadenas@gmail.com', 'email')
            ->check('terms')
            ->type('passw0RD', 'password')
            ->type('passw0RD', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/')
            ->seeInDatabase('users', ['email' => 'sergiturbadenas@gmail.com',
                'name' => 'Sergi Tur Badenas',]);
    }

    /**
     * Test required fields on registration page.
     *
     * @return void
     */
    public function testRequiredFieldsOnRegistrationPage()
    {
        $this->visit('/register')
            ->press('Register')
            ->see('The name field is required')
            ->see('The email field is required')
            ->see('The password field is required');
    }

    /**
     * Test send password reset.
     *
     * @return void
     */
    public function testSendPasswordReset()
    {
        $user = factory(\App\Core\Models\User::class)->create();

        $this->visit('password/reset')
            ->type($user->email, 'email')
            ->press('Send Password Reset Link')
            ->see('We have e-mailed your password reset link!');
    }

    /**
     * Test send password reset user not exists.
     *
     * @return void
     */
    public function testSendPasswordResetUserNotExists()
    {
        $this->visit('password/reset')
            ->type('notexistingemail@gmail.com', 'email')
            ->press('Send Password Reset Link')
            ->see('We can\'t find a user with that e-mail address.');
    }
}