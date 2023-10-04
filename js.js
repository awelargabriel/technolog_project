

if(document.querySelector(".btn").click){
    let cpf = document.getElementById("cpf");
    console.log(cpf);}
    


    $.ajax({
        method: "POST",
        url: "cadastrar.php",
        type: "json",
        data: {
            cpf : cpf

        }
    })
