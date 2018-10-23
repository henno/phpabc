<?php

class Test
{

    private $request = null;

    function __construct()
    {

    }

    function pet_adding()
    {

        $request = '{
"id": 0,
"category": {
"id": 0,
"name": "string"
},
"name": "doggie",
"photoUrls": [
"string"
],
"tags": [
{
"id": 0,
"name": "string"
}
],
"status": "available"
}';
        new app($request, 'POST', 'pet');
        $this->check_that_pet_exists_in_database('doggie');
    }

    function pet_deleting()
    {
        new app(null, 'DELETE', 'pet/1');
        $this->check_that_pet_does_not_exist_in_database('doggie');

    }

    function clear_database()
    {
        q("TRUNCATE TABLE pets");
    }

    function check_that_pet_does_not_exist_in_database($pet_name)
    {
        $pet_exists = get_one("SELECT pet_id FROM pets WHERE pet_name = $pet_name");
        if (!empty($pet_exists)) {
            die('Pet was found even after deleting');
        }
    }

    function check_that_pet_exists_in_database($pet_name)
    {
        $existing_pet = get_one("SELECT pet_name FROM pets WHERE pet_name LIKE '$pet_name'");
        if (empty($existing_pet)) {
            die('pet did not appear to be in the database');
        } else {
            return true;
        }
    }



}