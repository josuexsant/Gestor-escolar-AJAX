function init() {
  $("#home").click(function (e) {
    e.preventDefault();
    sessionIsActive();
  });

  $("#login-admin").click(function (e) {
    e.preventDefault();
    $("#content").load("php/view/login-admin.php");
  });

  $("#logout").click(function (e) {
    console.log("primero");
    $.ajax({
      type: "POST",
      url: "php/controller/logout.php",
      success: function (response) {
        console.log(response);
        sessionIsActive();
      },
    });
  });
}

function profileFunctions() {
  $("#update-email").click(function (e) {
    e.preventDefault();
    console.log("update email");
    $("#edit-profile").load("php/view/editEmail.php", function () {
      $("#form-email").on("submit", function (e) {
        e.preventDefault();

        var email = $("#email").val();
        $.ajax({
          type: "POST",
          url: "php/controller/update-email.php",
          data: {
            email: email,
          },
          success: function (response) {
            if (response == 200) {
              alert("Email actualizado");
              sessionIsActive();
            } else {
              alert(response);
            }
          },
        });
      });
    });
  });
}

function loadInscriptionsFunctions() {
  console.log("Cargando inscripciones");
  $(".registate").click(function (e) {
    e.preventDefault();
    var id = $(this).data("nrc");
    console.log(id);
  });

$(".showDetails").click(function (e) {
    e.preventDefault();
    var nrc = $(this).data("nrc");
    console.log(nrc);

    $.ajax({
      type: "POST",
      url: "php/view/details.php",
      data: {
        nrc: nrc,
      },
      success: function (response) {
        $("#panel-" + nrc).html(response);
        console.log(response);
      },
    });
});
}

function loadDashboard() {
  $("#profile").click(function (e) {
    e.preventDefault();
    $("#panel").load("php/view/profile.php", function () {
      profileFunctions();
    });
  });
  $("#courses").click(function (e) {
    e.preventDefault();
    $("#panel").load("php/view/courses.php");
  });

  $("#inscriptions").on("click", function (e) {
    e.preventDefault();
    $("#panel").load("php/view/inscriptions.php", function () {
      loadInscriptionsFunctions();
    });
  });

  $("#map").on("click", function (e) {
    e.preventDefault();
    $("#panel").load("php/view/map.php", function () {});
  });

  $("#logout").click(function (e) {
    $.ajax({
      type: "POST",
      url: "php/controller/logout.php",
      success: function (response) {
        console.log(response);
        sessionIsActive();
      },
    });
  });
  
}

function sessionIsActive() {
  $.ajax({
    type: "POST",
    url: "php/controller/session.php",
    success: function (response) {
      if (response == 200) {
        $("#content").load("php/view/home.php", function () {
          loadNav();
          loadDashboard();
        });
      } else {
        $("#content").load("php/view/login.php", function () {
          loadNav();
          loadLoginForm();
        });
      }
    },
  });
}

function loadNav() {
  console.log("Cargando nav");
  $("#nav").load("php/view/nav.php", function () {
    $("#logout").click(function (e) {
      console.log("segundo");
      $.ajax({
        type: "POST",
        url: "php/controller/logout.php",
        success: function (response) {
          console.log(response);
          sessionIsActive();
        },
      });
    });

    $("#login-admin").click(function (e) {
      e.preventDefault();
      $("#content").load("php/view/login-admin.php");
    });

    $("#home").click(function (e) {
      console.log("home-nav");
      e.preventDefault();
      sessionIsActive();
    });
  });
}

function loadLoginForm() {
  $("#login-form").on("submit", function (e) {
    e.preventDefault();
    var matricula = $("#matricula").val();
    var password = $("#password").val();

    console.log(matricula);
    console.log(password);
    $.ajax({
      type: "POST",
      url: "php/controller/autenticar.php",
      data: {
        matricula: matricula,
        password: password,
      },
      success: function (response) {
        if (parseInt(response) == 200) {
          console.log("Sesión iniciada");
          $("#content").load("php/view/home.php", function () {
            loadNav();
            loadDashboard();
          });
        } else {
          console.log(response);
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
