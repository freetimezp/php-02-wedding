<?php


class Ajax
{
    use Controller;

    public function index()
    {
        $info = [];
        $info['message'] = "";
        $info['errors'] = [];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $rsvp = new Rsvp_model();
            //$rsvp->create_table();

            if ($rsvp->validate($_POST)) {
                $rsvp->insert($_POST);
                $info['message'] = "Thank you for your message..";
            } else {
                $info['errors'] = $rsvp->errors;
            }

            echo json_encode($info);
        }
    }
}
