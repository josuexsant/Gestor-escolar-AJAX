function init() {
  $("#home").click(function (e) {
    e.preventDefault();
    sessionIsActive();
  });

  $("#login-admin").click(function (e) {
    e.preventDefault();
    $("#content").load("php/view/login-admin.php");
  });
}

function loadDashboard() {
  $("#profile").click( function (e) {
    console.log("click");
    e.preventDefault();
    $("#panel").load("php/view/profile.php", function () {});
  });
  $("#courses").click(function (e) {
    console.log("click");

    e.preventDefault();
    $("#panel").load("php/view/courses.php");});

  $("#inscriptions").on("click", function (e) {
    console.log("click");

    e.preventDefault();
    $("#panel").load("php/view/inscriptions.php", function () {});
  });

  $("#map").on("click", function (e) {
    console.log("click");

    e.preventDefault();
    $("#panel").load("php/view/map.php", function () {});
  });

  $("#logout").on("click", function (e) {
    console.log("click");
    e.preventDefault();
    $("#panel").load("php/controller/logout.php", function () {});
  });
}

function sessionIsActive() {

  $.ajax({
    type: "POST",
    url: "php/controller/session.php",
    success: function (response) {
      if (response == 200) {
        $("#content").load("php/view/home.php", function () {
          loadDashboard();
        });
      } else {
          $("#content").load("php/view/login.php", function () {
            loadLoginForm();
          });
      }
    },
  });
}


function loadNav() {

  console.log("Cargando nav");
  $("#nav").load("php/view/nav.php");
}

function loadLoginForm() {
  $("#login-form").on("submit", function (e) {
    e.preventDefault();
    var matricula = $("#matricula").val();
    var password = $("#password").val();

    $.ajax({
      type: "POST",
      url: "php/controller/autenticar.php",
      data: {
        matricula: matricula,
        password: password,
      },
      success: function (response) {
        if ((response == 200)) {
          console.log("Sesión iniciada");
          $("#content").load("php/view/home.php");
        } else {
          console.log("Error");
        }
      },
      error: function (response) {
        console.log("error");
        console.log(response);
      },
    });
  });
}

$(document).ready(function () {
  sessionIsActive();
});
