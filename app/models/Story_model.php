<?php

/**
 * Story_model class
 */
class Story_model
{

    use Model;

    protected $table = 'story';

    protected $allowedColumns = [
        'image',
        'title',
        'description',
        'date',
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

        if (empty($post_data['description'])) {
            $this->errors['description'] = "A description is required!";
        }

        if (empty($post_data['date'])) {
            $this->errors['date'] = "A date is required!";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }


    public function create_table()
    {
        $query = "create table if not exists story(
			id int primary key auto_increment,

			image varchar(1024) not null,
			title varchar(100) not null,
			description varchar(2048) not null,

            date datetime null,
			
			list_order int(10) default 0
		)";

        $this->query($query);
    }
}
