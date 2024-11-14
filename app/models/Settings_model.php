<?php

/**
 * Settings_model class
 */
class Settings_model
{

    use Model;

    protected $table = 'settings';

    protected $allowedColumns = [
        'setting',
        'type',
        'value'
    ];

    public function validate($files_data = [], $post_data = [], $id = null)
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
            if (empty($post_data['type'])) {
                $this->errors['type'] = "A type is required!";
            }
        } else {
            if (!empty($files_data['image']['name'])) {
                if (!in_array($files_data['image']['type'], $allowed_types)) {
                    $this->errors['image'] = "Only this types of image is available: " . implode(", ", $allowed_types);
                }
            }
        }


        if (empty($post_data['setting'])) {
            $this->errors['setting'] = "A setting is required!";
        }


        if (empty($this->errors)) {
            return true;
        }

        return false;
    }


    public function create_table()
    {
        $query = "create table if not exists settings(
			id int primary key auto_increment,

			setting varchar(255) not null,
			type varchar(50) not null,
			value varchar(255) not null
		)";

        $this->query($query);
    }
}
