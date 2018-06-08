<?php
    include 'controller.php';

    class db extends Controller {
        //Get all guests
        public function get_guests() {
            $query = $this->db->query("SELECT * FROM tblguest WHERE guest_status = '1'");
            return $query;
        }

        // convert all characters to string using post method
        public function post($data) {
            return $data == 'comment' ? $this->db->real_escape_string($_POST[$data]) : $this->db->real_escape_string(htmlentities($_POST[$data]));
        }

        public function get($data) {
            return $this->db->real_escape_string(htmlentities($_GET[$data]));
        }

        //Modifying guests
        public function guests($guest_id, $guest_firstname, $guest_lastname, $guest_email, $guest_address, $guest_contact) {
            if(empty($guest_id)) {
                $check = $this->db->query("SELECT * FROM tblguest WHERE guest_firstname = '$guest_firstname' AND guest_lastname = '$guest_lastname'");
                if($check->num_rows > 0) {
                    $message = 'This user is already exist.';
                    $this->notify([true, '#35495e', '#ffffff', $message]);
                } else {
                    $message = 'New guest has been added.';
                    $query = $this->db->query("INSERT INTO tblguest(guest_firstname, guest_lastname, guest_email, guest_address, guest_contact, guest_status) VALUES('$guest_firstname', '$guest_lastname', '$guest_email', '$guest_address', '$guest_contact', '1')");
                    $query ? $this->notify([true, '#4fc08d', '#ffffff', $message]) : null;
                }
            } else {
                $message = 'Successfully updated guests.';
                $query = $this->db->query("UPDATE tblguest SET guest_firstname = '$guest_firstname', guest_lastname = '$guest_lastname', guest_email = '$guest_email', guest_address  = '$guest_address', guest_contact = '$guest_contact' WHERE guest_id = $guest_id");
                $query ? $this->notify([true, '#4fc08d', '#ffffff', $message]) : null;
            }
        }

        public function edit_guest_by_id($guest_id) {
            $query = $this->db->query("SELECT * FROM tblguest WHERE guest_id = $guest_id");
            foreach($query as $row) {
                $data = $row;
            }
            echo json_encode($data);
        }

        public function delete_guest_by_id($guest_id) {
            $query = $this->db->query("UPDATE tblguest SET guest_status = '0' WHERE guest_id = $guest_id");
            $message = "Guest has been deleted.";
            $query ? $this->notify([true, '#41b883', '#ffffff', $message]) : null;
        }

        public function show_guests() {
            foreach($this->get_guests() as $row): ?>
                <?php $data = $row; ?>
                <tr>    
                    <td><?=$row['guest_firstname']?></td>
                    <td><?=$row['guest_lastname']?></td>
                    <td><?=$row['guest_email']?></td>
                    <td><?=$row['guest_address']?></td>
                    <td><?=$row['guest_contact']?></td>
                    <td style="text-align:center"><a onclick="modal_delete_guest('<?=$row['guest_id']?>')" style="cursor:pointer"><i class="fa fa-remove colorized"></i></a></td>
                    <td style="text-align:center"><a onclick="edit_guest_by_id('<?=$row['guest_id']?>')" style="cursor:pointer"><i class="fa fa-pencil colorized"></i></a></td>
                </tr>
            <?php endforeach;
        }

        //Amaran notification
        public function notify($data) {
            echo json_encode(['success'=>$data[0],'bgcolor'=>$data[1],'color'=>$data[2],'message'=>$data[3]]);
        }
    }
?>