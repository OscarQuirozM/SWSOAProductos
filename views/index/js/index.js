$(function () { });

$("#btnlogin").on("click", function () {
  var dni = $("#dni").val();
  var clave = $("#clave").val();

  if (dni == null || dni == "") {
    Swal.fire({
      icon: "warning",
      title: "INGRESAR USUARIO",
      timer: 2000,
    });
  } else if (clave == null || clave == "") {
    Swal.fire({
      icon: "warning",
      title: "INGRESAR CLAVE",
      timer: 2000,
    });
  } else {


    $.ajax({
      type: "POST",
      url: "/portalcliente/index/login",
      data: { dni: dni, clave: clave },
      
      beforeSend: function () {
        $("#div-login").html("");
        $("#div-login").append(
          "<div id='div-login'>\<div class='d-flex justify-content-center my-1'>\<div class='spinner-border text-danger' role='status' aria-hidden='true'></div>\</div>\ </div>"
        );
      },

      success: function (res) {
        $("#div-login").html("");
        switch (res.estado) {
          case 0:
            Swal.fire({
              icon: "warning",
              title: "USUARIO O CONTRASEÑA INCORRECTA",
              text: "Ingresar sus datos correctamente!!",
              timer: 4000,
              timerProgressBar: true,
            });
            break;
          case 1:
            window.location = res.url;
            break;
        }
      },
    });
  }
});

function pulsar(e) {
  if (e.keyCode === 13 && !e.shiftKey) {
    $("#btnlogin").click();
  }
}
