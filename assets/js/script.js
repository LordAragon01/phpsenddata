$(function(){

    let sendurl = "php/form-send.php";
    let href = window.location.href;
    let full_url_form = href + sendurl;

//Send form data
    $('form').on('submit', function(e){

        e.preventDefault();

        let data = $(this).serializeArray();

        let verify_data = data.forEach((value) => value !== " " ? true : false);
        let clean_data = verify_data !== false ? data : null;

        console.log(clean_data);
        	
        $.ajax({
            type: "POST",
            url: full_url_form,
            data: clean_data,
            success: function(){

                console.log("Enviado com Sucesso");

            },
            error: function(){

                console.log("Erro ao enviar");

            }
        });


    });


});