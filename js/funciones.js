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
    $.ajax({
      type: "POST",
      url: "php/controller/logout.php",
      success: function (response) {
        sessionIsActive();
      },
    });
  });
}

function profileFunctions() {
  $("#update-email").click(function (e) {
    e.preventDefault();
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
function loadSeachFunctions() {
$("#buscador").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    console.log(value);

    $.ajax({
      type: "POST",
      url: "php/controller/search.php",
      data: {
        value: value,
      },
      success: function (response) {
        $("#courses-list").html(response);
        loadInscriptionsFunctions();
      },
    });
  });
}

function loadInscriptionsFunctions() {
  // Hide the details of the courses
  $(".hideDetails").hide();
  $(".hideDetailsInscription").hide();

  $(".registate").click(function (e) {
    e.preventDefault();
    var nrc = $(this).data("nrc");

    $.ajax({
      type: "POST",
      url: "php/controller/inscription.php",
      data: {
        nrc: nrc,
      },
      success: function (response) {
        if (response == 200) {
          alert("Inscripción exitosa");
          $("#panel").load("php/view/inscriptions.php", function () {
            loadInscriptionsFunctions();
            loadSeachFunctions();
          });
        } else {
          alert(response);
        }
      },
    });
  });

  $(".showDetails").click(function (e) {
    e.preventDefault();
    var nrc = $(this).data("nrc");

    $.ajax({
      type: "POST",
      url: "php/view/details.php",
      data: {
        nrc: nrc,
      },
      success: function (response) {
        $("#panel-" + nrc).html(response);
        $("#showDetails-" + nrc).hide();
        $("#hideDetails-" + nrc).show();
      },
    });
  });

  $(".showDetailsInscription").click(function (e) {
    e.preventDefault();
    var nrc = $(this).data("nrc");

    $.ajax({
      type: "POST",
      url: "php/view/details.php",
      data: {
        nrc: nrc,
      },
      success: function (response) {
        $("#panel-inscription-" + nrc).html(response);
        $("#showDetailsInscription-" + nrc).hide();
        $("#hideDetailsInscription-" + nrc).show();
      },
    });
  });

  $(".hideDetailsInscription").click(function (e) {
    e.preventDefault();
    var nrc = $(this).data("nrc");
    $("#panel-inscription-" + nrc).html("");
    $("#showDetailsInscription-" + nrc).show();
    $("#hideDetailsInscription-" + nrc).hide();
  });

  $(".delete").click(function (e) {
    e.preventDefault();
    var nrc = $(this).data("nrc");

    $.ajax({
      type: "POST",
      url: "php/controller/delete.php",
      data: {
        nrc: nrc,
      },
      success: function (response) {
        if (response == 200) {
          alert("Inscripción eliminada");
          // Reload the panel after deleting the course
          $("#panel").load("php/view/inscriptions.php", function () {
            loadInscriptionsFunctions();
          });
        } else {
          alert(response);
        }
      },
    });
  });

  $(".hideDetails").click(function (e) {
    e.preventDefault();
    var nrc = $(this).data("nrc");
    $("#panel-" + nrc).html("");
    $("#showDetails-" + nrc).show();
    $("#hideDetails-" + nrc).hide();
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
      loadSeachFunctions();
    });
  });

  $("#map").on("click", function (e) {
    e.preventDefault();
    $("#panel").load("php/view/map.php", function () {
      loadMap();
    });
  });

  function loadMap() {
  
  }

  $("#logout").click(function (e) {
    $.ajax({
      type: "POST",
      url: "php/controller/logout.php",
      success: function (response) {
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
  $("#nav").load("php/view/nav.php", function () {
    $("#logout").click(function (e) {
      $.ajax({
        type: "POST",
        url: "php/controller/logout.php",
        success: function (response) {
          sessionIsActive();
        },
      });
    });

    $("#login-admin").click(function (e) {
      e.preventDefault();
      $("#content").load("php/view/login-admin.php");
    });

    $("#home").click(function (e) {
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

    $.ajax({
      type: "POST",
      url: "php/controller/autenticar.php",
      data: {
        matricula: matricula,
        password: password,
      },
      success: function (response) {
        if (parseInt(response) == 200) {
          $("#content").load("php/view/home.php", function () {
            loadNav();
            loadDashboard();
          });
        } else {
          console.log("Error");
        }
      },
      error: function (response) {
        console.log("error");
      },
    });
  });
}

$(document).ready(function () {
  sessionIsActive();
});
