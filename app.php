<?php

class app
{
    public $request;


    function __construct($request, $method, $endpoint)
    {
        $this->request = $request;

        switch ($endpoint) {

            case 'pet':
                switch ($method) {
                    case 'POST':
                        $this->add_pet($request);
                        break;

                }
                break;

            case (preg_match("/pet\/(\d+)/", $endpoint, $matches) ? true : false) :

                switch ($method) {
                    case 'DELETE':
                        $this->delete_pet($matches[1]);
                        break;

                }
                break;

            default:
                die('Invalid endpoint');
        }
    }


    function add_pet($request)
    {

        $data['pet_name'] = $request->name;
        insert('pets', $data);
    }

    function delete_pet($id)
    {
        $pet_exists = get_one("SELECT pet_id FROM pets WHERE pet_id = $id");
        if (empty($pet_exists)) {
            header("HTTP/1.0 404 Pet not found");
            die('Pet not found');
        }
        q("DELETE FROM pets WHERE pet_id = $id");
    }

}

