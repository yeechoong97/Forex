<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Forum;
use App\Comment;
use App\User;
use App\Account;
use App\Order;
use App\Trades;
use Illuminate\Support\Facades\Hash;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    protected $user;
    protected $currentpassword="";

    public function setUp():void {
        parent::setUp(); // performs set up
        $this->currentpassword =  Str::random(10);
        $this->user = User::create([
            'user_id' => 'EST'.$this->faker->randomDigit,
            'name' => $this->faker->name,
            'username' => $this->faker->firstName(),
            'phone' => '0123456789',
            'avatar' => $this->faker->randomElement(["https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-1.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-2.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-3.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-4.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-5.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-6.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-7.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-8.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-9.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-10.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037856/Avatar/Avatar-11.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037856/Avatar/Avatar-12.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037856/Avatar/Avatar-13.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037856/Avatar/Avatar-14.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-15.png","https://res.cloudinary.com/fyp202105/image/upload/v1614037855/Avatar/Avatar-16.png"]),
            'email' => $this->faker->unique()->safeEmail,
            'tutorial' => $this->faker->randomElement([1,0]),
            'password' => Hash::make($this->currentpassword)
        ]);
        $this->be($this->user);
    }
    /**
     * @runInSeparateProcess
    */
    public function testProfileIndex()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $response = $this->get('profile/index');
        $response->assertStatus(200);
        $this->assertTrue(count(User::all())>1);
    }

        /**
     * @runInSeparateProcess
    */
    public function testChangeAvatar()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('profile/avatar',[
            'avatar_list' => $this->faker->text($maxNbChars = 20)
        ]);
        $response->assertStatus(302);
    }

    /**
     * @runInSeparateProcess
    */
    public function testUpdateProfile()
    {
        $this->withoutExceptionHandling();
        $response = $this->put('profile/profile/update',[
            'name' =>  $this->faker->name,
            'phone' => '0123456789',
            'email' => $this->faker->safeEmail,
        ]);
        $response->assertStatus(302);
        $response->assertSessionHas('alert', 'Profile is updated successfully!');
    }

        /**
     * @runInSeparateProcess
    */
    public function testExceptionHandlingUpdateProfile()
    {
        $this->withExceptionHandling();
        $response = $this->put('profile/profile/update',[]);
        $response->assertStatus(500);
    }

    /**
     * @runInSeparateProcess
    */
    public function testUpdatePassword()
    {
        $this->withoutExceptionHandling();
        $currentPassword = $this->currentpassword;
        $password = Str::random(10);
        $response = $this->put('profile/password/update',[
            'current_password' => $currentPassword,
            'password' => $password,
            'password_confirmation' => $password,
        ]);
        $response->assertStatus(302);
        $response->assertSessionHas('alert', 'Password is updated successfully!');
    }

        /**
     * @runInSeparateProcess
    */
    public function testFailedUpdateWithInvalidCurrentPassword()
    {
        $this->withExceptionHandling();
        $password = Str::random(10);
        $response = $this->put('profile/password/update',[
            'current_password' => Str::random(10),
            'password' => $password,
            'password_confirmation' => $password,
        ]);
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['current_password']);
    }

            /**
     * @runInSeparateProcess
    */
    public function testFailedUpdateWithInvalidPassword()
    {
        $this->withExceptionHandling();
        $currentPassword = $this->currentpassword;
        $response = $this->put('profile/password/update',[
            'current_password' => $currentPassword,
            'password' => Str::random(10),
            'password_confirmation' => Str::random(10),
        ]);
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['password']);
    }

    /**
     * @runInSeparateProcess
    */
    public function testFailedUpdateWithInvalidPasswordLength()
    {
        $this->withExceptionHandling();
        $currentPassword = $this->currentpassword;
        $password = Str::random(5);
        $response = $this->put('profile/password/update',[
            'current_password' => $currentPassword,
            'password' => $password,
            'password_confirmation' => $password,
        ]);
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['password']);
    }


}
