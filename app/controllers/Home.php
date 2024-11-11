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

		$family = new Family_model();
		$family->order_type = "asc";
		$family->limit = 20;
		$family->order_column = 'list_order';
		$data['family'] = $family->findAll();

		$story = new Story_model();
		$story->order_type = "asc";
		$story->limit = 4;
		$story->order_column = 'list_order';
		$data['story'] = $story->findAll();

		$about = new About_model();
		$about->order_type = "asc";
		$about->limit = 2;
		$about->order_column = 'list_order';
		$data['about'] = $about->findAll();


		$this->view('home', $data);
	}
}
