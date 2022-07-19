
const BtnCrearSitio = document.getElementById("CrearSitio").addEventListener('click',(e)=>{
    event.preventDefault();
    let nombresitio = document.getElementById('nombresite').value;
    let templateid = document.getElementById('templateid').value;
    let emailuser = document.getElementById('emailuser').value;

    //alert("Nombre: "+nombresitio+" TemplateId: "+templateid+" EMAIL: "+emailuser);

    let datos = {
        "nombresitio": nombresitio,
        "templateid": templateid,
        "emailuser":emailuser
    };

    $.ajax({
        data: datos,
        url:       ,
        type: 'post',
        
    });
});