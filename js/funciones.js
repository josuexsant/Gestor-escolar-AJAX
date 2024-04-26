$(document).ready(function () {
  $("#login-form").on("submit", function (e) {
    e.preventDefault();

    var matricula = $("#matricula").val();
    var password = $("#password").val();

    $.ajax({
      type: "POST",
      url: "php/controller/login.php",
      data: {
        matricula: matricula,
        password: password,
      },
      success: function (response) {
        if (response === "success") {
          window.location.href = "php/view/home.php";
        } else {
          $("#message").text(response);
        }
      },
    });
  });
});
