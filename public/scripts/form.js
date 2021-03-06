$(document).ready(function(){
    if(!document.getElementById('goSendFormPage')) {
        $('form').submit(function (event) {
            let json;
            event.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (result) {
                    console.log(result);
                    json = jQuery.parseJSON(result);
                    if (json.url) {
                        window.location.href = json.url;
                    } else {
                        Swal.fire(
                            json.status,
                            json.message,
                            json.status
                        );
                    }
                }
            });
        });
    }
});
