<?php


/**
 * User class
 */
class User
{

	use Model;

	protected $table = 'users';

	protected $allowedColumns = [

		'username',
		'email',
		'password',
	];

	public function validate($data, $id = null)
	{
		$this->errors = [];

		//check email
		if (empty($data['email'])) {
			$this->errors['email'] = "Email is required";
		} else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$this->errors['email'] = "Email is not valid";
		} else if ($this->first(['email' => $data['email']], ['id' => $id])) {
			$this->errors['email'] = "Email is already in use";
		}


		//check username
		if (empty($data['username'])) {
			$this->errors['username'] = "Username is required";
		} else if (!preg_match("/^[a-zA-Z0-9]+$/", $data['username'])) {
			$this->errors['username'] = "Username must contains only letters and numbers";
		}


		//check password
		if (empty($data['password'])) {
			$this->errors['password'] = "Password is required";
		}



		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	public function create_table()
	{
		$query = "create table if not exists users(
			id int primary key auto_increment,
			username varchar(30) not null,
			password varchar(255) not null,
			email varchar(100) not null,

			key email (email)
		)";

		$this->query($query);
	}
}
