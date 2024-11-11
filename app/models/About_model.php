<?php

/**
 * About_model class
 */
class About_model
{
    use Model;

    protected $table = 'about';

    protected $allowedColumns = [
        'image',
        'title',
        'name',
        'icon',
        'description',
        'twitter_link',
        'facebook_link',
        'instagram_link',
        'linkedin_link',
        'list_order'
    ];

    public function validate($files_data, $post_data, $id = null)
    {
        $this->errors = [];

        $allowed_types = [
            'image/jpeg',
            'image/jpg',
            'image/png',
            'image/gif',
            'image/webp'
        ];

        if (!$id) {
            if (empty($files_data['image']['name'])) {
                $this->errors['image'] = "An image is required!";
            } else {
                if (!in_array($files_data['image']['type'], $allowed_types)) {
                    $this->errors['image'] = "Only this types of image is available: " . implode(", ", $allowed_types);
                }
            }
        } else {
            if (!empty($files_data['image']['name'])) {
                if (!in_array($files_data['image']['type'], $allowed_types)) {
                    $this->errors['image'] = "Only this types of image is available: " . implode(", ", $allowed_types);
                }
            }
        }


        if (empty($post_data['title'])) {
            $this->errors['title'] = "A title is required!";
        }

        if (empty($post_data['name'])) {
            $this->errors['name'] = "A name is required!";
        }

        if (empty($post_data['icon'])) {
            $this->errors['icon'] = "A icon class name is required!";
        }

        if (empty($post_data['description'])) {
            $this->errors['description'] = "A description is required!";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }


    public function create_table()
    {
        $query = "create table if not exists about(
			id int primary key auto_increment,

			image varchar(1024) not null,
			title varchar(50) not null,
			name varchar(50) not null,
			icon varchar(50) not null,
			description varchar(2048) not null,

            twitter_link varchar(1024) null,
			facebook_link varchar(1024) null,
			instagram_link varchar(1024) null,
			linkedin_link varchar(1024) null,
		
			list_order int(10) default 0
		)";

        $this->query($query);
    }
}
