$(document).ready(function () {
    $("#submit").click(function () {
        var name = $("#name").val();
        var last = $("#last").val();
        var email = $("#email").val();
        var contact = $("#contact").val();

        $("#returnmessage").empty(); //To empty previous error/success message.
//checking for blank fields	
        if (name == '' || last == '' || email == '' || contact == '') {
            alert("Please Fill Required Fields");
        }
        else {
// Returns successful data submission message when the entered information is stored in database.
            $.post("contact_form.php", { name1: last, last: name, email1: email, contact1: contact},
                function (data) {
                    $("#returnmessage").append(data);//Append returned message to message paragraph
                    if (data == "Your Query has been received, We will contact you soon.") {
                        $("#form")[0].reset();//To reset form fields on success
                    }
                });
        }

    });
});
