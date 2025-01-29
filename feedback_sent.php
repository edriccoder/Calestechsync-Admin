<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CalesTechSync Feedback</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 500px;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        a {
            display: block;
            font-size: 1.2rem;
            margin-top: 1rem;
            text-decoration: none;
            color: #007bff;
        }

        .countdown {
            font-size: 1.2rem;
            margin-top: 1rem;
            color: #888;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>
    <script>
        function executeOnPageLoad() {
            Swal.fire({
                title: "Thank you for your feedback!",
                html: "This page will close in <b></b>...",
                timer: 5000, // Set the timer to 5 seconds
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector("b");
                    timerInterval = setInterval(() => {
                        timer.textContent = `${Math.ceil(Swal.getTimerLeft() / 1000)}`; // Display the timer in seconds
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log("I was closed by the timer!!");
                }
            });
        }

        // Call the function when the page has finished loading
        window.onload = executeOnPageLoad;

        // Redirect to Google after 5 seconds
        window.setTimeout(function() {
            window.location.href = "https://www.google.com";
        }, 5000);
    </script>
</body>

</html>