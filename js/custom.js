/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function validate_email(email_id)
{
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (reg.test(email_id) == false)
        return false;
    else
        return true;
}
/***
 * Function to add the error class to the input fields parent
 **/
function add_error_class(input_id, error_text)
{
    $('#' + input_id).parent().addClass('error');
    if (error_text == undefined)
        error_text = 'Required field : Please enter value.';
    $('#error_' + input_id).remove();
    var error_html = '<div id="error_' + input_id + '" class="error">' + error_text + '</div>';
    $('#' + input_id).parent().append(error_html);

}

/***
 * Function to add the error class to the input fields parent
 **/
function remove_error_class(input_id)
{
    $('#' + input_id).parent().removeClass('error');
    $('#' + input_id).parent().find('.error').fadeOut(1000);
    //Hide the error message
    $('#validation_error').fadeOut(2000);
}

function send_contact() {

    remove_error_class('name');
    remove_error_class('email');

    var name = $("#name").val();
    var email = $("#email").val();
    var subject = $("#subject").val();
    var phone = $("#phone").val();
    var zip = $("#zip").val();
    var message = $("#message").val();

    var error_flag = 0;

    $("#returnmessage").empty(); // To empty previous error/success message.
// Checking for blank fields.
    if ($.trim(name).length < 1) {
        add_error_class('name', 'Please enter name');
        error_flag = 1;
    }
    if ($.trim(email).length < 1)
    {
        add_error_class('email', 'Please enter email address.');
        //alert("Enter Valid Email ID");
        error_flag = 1;
    }
    else if (validate_email(email) == false)
    {
        add_error_class('email', 'Please enter a valid email address.');
        //alert("Enter Email ID");
        error_flag = 1;
    }

    if ($.trim(subject).length < 1) {
        add_error_class('subject', 'Please enter subject');
        error_flag = 1;
    }

    var reg_phone = /^(\d+-?)+\d+$/;
    if ($.trim(phone).length < 1) {
        add_error_class('phone', 'Please enter phone number');
        error_flag = 1;
    }
    else if (reg_phone.test(phone) == false) {
        add_error_class('phone', 'Please enter a valid phone number');
        error_flag = 1;
    }
    else if ($.trim(phone).length < 12 || $.trim(phone).length > 12) {
        add_error_class('phone', 'Please enter a valid phone number');
        error_flag = 1;
    }
    if ($.trim(zip).length < 1) {
        add_error_class('zip', 'Please enter zip code');
        error_flag = 1;
    }
    else if (isNaN(zip)) {
        add_error_class('zip', 'Please enter a valid zip code');
        error_flag = 1;
    }
    else if ($.trim(zip).length < 5 || $.trim(zip).length > 5) {
        add_error_class('zip', 'Please enter a valid zip code');
        error_flag = 1;
    }

    if (message == '') {
        add_error_class('message', 'Please enter message');
        error_flag = 1;
    }



    if (error_flag != 1) {

        alert("Your Query has been received, We will contact you soon");
        $("#form")[0].reset();
        $.post('send_contact_details.php', {
            'name': name,
            'email': email,
            'subject': subject,
            'phone': phone,
            'zip': zip,
            'message': message
        }, function (data) {

            // $("#returnmessage").append(data); // Append returned message to message paragraph.
            if (data == "success") {
                $("#form")[0].reset(); // To reset form fields on success.
            } else {
                alert("Error");
            }
        });
    }
}
