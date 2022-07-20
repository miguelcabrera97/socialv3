

Access-Control-Allow-Origin: http://localhost/socialv3;
Access-Control-Allow-Methods: GET, POST, PUT;
Access-Control-Allow-Headers: Content-Type;

const BtnCrearSitio = document.getElementById("CrearSitio").addEventListener('click',(e)=>{
    event.preventDefault();
    let nombresitio = document.getElementById('nombresite').value;
    let templateid = document.getElementById('templateid').value;
    let emailuser = document.getElementById('emailuser').value;


    //alert("Nadaaa");
    //alert("Nombre: "+nombresitio+" TemplateId: "+templateid+" EMAIL: "+emailuser);
   
});