 $(document).ready(function() {
            $('#login-form').submit(function(e) {
                e.preventDefault();
                var username = $('#username').val();
                var password = $('#password').val();

                $.ajax({
                    type: 'POST',
                    url: 'login.php',   
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(response) {
                        if (response == 'success') {
                            window.location.href = 'home.php';
                        } else {
                            $('#message').html('Invalid username or password');
                        }
                    }
                });
            });
        });