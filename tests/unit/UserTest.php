<?php

class UserTest extends \PHPUnit\Framework\TestCase
{
	public $user;

	public function setUp()
	{
		$this->user = new \App\Models\User; 
	}

	public function test_that_we_can_get_the_first_name()
	{
		$this->user->setFirstName('Billy');

		$this->assertEquals($this->user->getFirstName(), 'Billy');
	}

	public function test_that_we_can_get_the_last_name()
	{
		$user = new \App\Models\User;

		$user->setLastName('Garrett');

		$this->assertEquals($user->getLastName(), 'Garrett');
	}

	public function test_full_name_is_returned()
	{
		$user = new \App\Models\User;

		$user->setFirstName('Sara');
		$user->setLastName("Putheng");

		$this->assertEquals($user->getFullName(), 'Sara Putheng');
	}

	public function test_first_name_last_name_are_trimmed()
	{
		$user = new \App\Models\User;

		$user->setFirstName('  Sara    ');
		$user->setLastName('  Putheng ');

		$this->assertEquals($user->getFirstName(), 'Sara');
		$this->assertEquals($user->getLastName(), 'Putheng');
	}

	public function test_email_address_can_be_set()
	{
		$user = new \App\Models\User;

		$user->setEmail('puthengemail@gmail.com');

		$this->assertEquals($user->getEmail(), 'puthengemail@gmail.com');
	}

	public function test_email_variable_contain_correct_values()
	{
		$user = new \App\Models\User;

		$user->setFirstName('Sara');
		$user->setLastName('Putheng');
		$user->setEmail('puthengemail@gmail.com');

		$emailVarible = $user->getEmailvariable();

		$this->assertArrayHasKey('full_name', $emailVarible);
		$this->assertArrayHasKey('email', $emailVarible);

		$this->assertEquals($emailVarible['full_name'], 'Sara Putheng');
		$this->assertEquals($emailVarible['email'], 'puthengemail@gmail.com');
	}
}