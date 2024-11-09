<?php


/**
 * Family_model class
 */
class Family_model
{

    use Model;

    protected $table = 'family';

    protected $allowedColumns = [
        'name',
        'title',
        'twitter_link',
        'facebook_link',
        'instagram_link',
        'linkedin_link',
        'image'
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

        if (empty($files_data['image']['name'])) {
            $this->errors['image'] = "An image is required!";
        } else {
            if (!in_array($files_data['image']['type'], $allowed_types)) {
                $this->errors['image'] = "Only this types of image is available: " . implode(", ", $allowed_types);
            }
        }


        if (empty($post_data['name'])) {
            $this->errors['name'] = "A name is required!";
        }

        if (empty($post_data['title'])) {
            $this->errors['title'] = "A title is required!";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }


    public function create_table()
    {
        $query = "create table if not exists family(
			id int primary key auto_increment,

			name varchar(50) not null,
			title varchar(50) not null,
			image varchar(1024) not null,

			twitter_link varchar(1024) null,
			facebook_link varchar(1024) null,
			instagram_link varchar(1024) null,
			linkedin_link varchar(1024) null
		)";

        $this->query($query);
    }
}
