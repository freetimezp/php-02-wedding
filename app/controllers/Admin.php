<?php

/**
 * admin class
 */
class Admin
{
    use Controller;

    public function index()
    {
        $user = new User();

        //redirect('login');
        $this->view('admin/dashboard');
    }

    public function users($action = '')
    {
        $user = new User();
        $data['action'] = $action;
        $data['rows'] = $user->findAll();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($user->validate($_POST)) {
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $user->insert($_POST);
                redirect('admin/users');
            }
        }

        $data['errors'] = $user->errors;

        $this->view('admin/users', $data);
    }
}
