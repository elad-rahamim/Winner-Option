<?php
//Fetching Values from URL


$name = $_POST['name1'];
$last = $_POST['last'];
$email = $_POST['email1'];
$contact = $_POST['contact1'];
//sanitizing email
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
//After sanitization Validation is performed
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if (!preg_match("/^[0-9]{10}$/", $contact)) {
        echo "<span>* Please Fill Valid Contact No. *</span>";
    } else {


        $apiData = array(
            'api_username' => 'test',
            'api_password' => 'test1',
            'firstname' => $name,
            'lastname' => $last,
            'phone' => $contact,
            'email' => $email,
            'userip' => '120.120.120',
            'country' => 'RU',
            'language' => 'IT',
            'pid' => 'pid',
            'cid' => 'cid',
            'zid' => 'zid',
            'mid' => 'mid',
            'referrer' => 'testref',
            'custom' => 'testcustom');

        $URL = 'https://smartadserv.com/script/createlead.php';
        $ch = curl_init($URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($apiData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch); // run the whole process
        echo $result;
        curl_close($ch);


        $subject = $name;
// To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From:' . $email . "\r\n"; // Sender's Email
        $headers .= 'Cc:' . $email . "\r\n"; // Carbon copy to Sender
        $template = '<div style="padding:50px; color:white;">'
            . 'Name:' . $name . '<br/>'
            . 'last name:' . $last . '<br/>'
            . 'Email:' . $email . '<br/>'
            . 'Contact No:' . $contact . '<br/>'
            . '</div>';
        $sendmessage = "<div style=\"background-color:#7E7E7E; color:white;\">" . $template . "</div>";
// message lines should not exceed 70 characters (PHP rule), so wrap it
        $sendmessage = wordwrap($sendmessage, 70);

// Send mail by PHP Mail Function
        mail("erahmim@gmail.com", $subject, $sendmessage, $headers);
        echo "Your Query has been received, We will contact you soon.";
    }
} else {
    echo "<span>* invalid email *</span>";
}

?>