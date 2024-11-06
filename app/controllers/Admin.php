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

    public function users()
    {
        $user = new User();
        $data['rows'] = $user->findAll();


        //redirect('login');
        $this->view('admin/users', $data);
    }
}
