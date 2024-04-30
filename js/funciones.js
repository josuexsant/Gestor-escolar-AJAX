$("#login-form").on("submit", function (e) {
  e.preventDefault();

  var matricula = $("#matricula").val();
  var password = $("#password").val();

  $.ajax({
    type: "POST",
    url: "../controller/autenticar.php",
    data: {
      matricula: matricula,
      password: password,
    },
    success: function (response) {
      if (response === "success") {
        window.location.href = "home.php";
      } else {
        $("#message").text(response);
      }
    },
  });
});

$("#registrarCursos").click(function (e) {
  e.preventDefault();
  $("#registro").load("dashboard.php");
});

$("#editar").click(function (e) {
  e.preventDefault();
  $("#registro").load("edit.php");
});

$("#home").click(function (e) {
  e.preventDefault();
  window.location.href = "../../index.php";
});

$("#login-admin").click(function (e) {
  e.preventDefault();
  window.location.href = "login-admin.php";
});

$("#projection").click(function (e) {
  e.preventDefault();
  $("#registro").load("projection.php");
});

function sessionIsActive() {
  $.ajax({
    type: "POST",
    url: "index.php",
    success: function (response) {
      if (response === "false") {
        window.location.href = "../../index.php";
      }
    },
  });
}

//When the document is ready
$(document).ready(function () {
  sessionIsActive();
});
