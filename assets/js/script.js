$(function(){

    let sendurl = "php/form-send.php";
    let href = window.location.href;
    let full_url_form = href + sendurl;

//Send form data
    $('form').on('submit', function(e){

        e.preventDefault();

        //Get data from form
        let data = $(this).serializeArray();

        //Verify data from form
        let verify_data;
        data.forEach((valueform) => valueform.value !== "" ? verify_data = true : verify_data = false);

        //Send valide data
        let clean_data = verify_data !== false ? data : null;

        console.log(clean_data);
        	
        $.ajax({
            type: "POST",
            url: full_url_form,
            data: clean_data,
            success: function(){

                console.log("Enviado com Sucesso");

                window.location = href;

            },
            error: function(){

                console.log("Erro ao enviar");

            }
        });


    });


});