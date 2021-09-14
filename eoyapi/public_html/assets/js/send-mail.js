function sendMail() {
    $.post("/send-mail", {
        name: $("#name-contact").val(),
        email: $("#email-contact").val(),
        message: $("#message-contact").val()
    }, (data) => {
        alert(data)
    })
}