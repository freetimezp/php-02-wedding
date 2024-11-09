<?php

/**
 * home class
 */
class Home
{
	use Controller;

	public function index()
	{
		$data = [];

		$contact = new Contact_model();
		$data['social_links'] = $contact->where(['id' => 1]);
		$data['social_links'] = $data['social_links'][0];

		$gallery = new Gallery_model();
		$data['gallery'] = $gallery->findAll();

		$this->view('home', $data);
	}
}
