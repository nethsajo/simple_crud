<?php 
    include 'config.php';
    
    switch($_POST['action']) {
        case 'Guests':
            $guest_id           = $data->post('guest_id');
            $guest_firstname    = $data->post('guest_firstname');
            $guest_lastname     = $data->post('guest_lastname');
            $guest_email        = $data->post('guest_email');
            $guest_address      = $data->post('guest_address');
            $guest_contact      = $data->post('guest_contact');
            $data->guests($guest_id, $guest_firstname, $guest_lastname, $guest_email, $guest_address, $guest_contact);
        break;

        case 'Get Guest By Id':
            $guest_id = $data->post('guest_id');
            $data->edit_guest_by_id($guest_id);
        break;

        case 'Delete Guest By Id':
            $guest_id = $data->post('guest_id');
            $data->delete_guest_by_id($guest_id);
        break;

        case 'Show Guests Table':
            $data->show_guests();
        break;
    }
?>