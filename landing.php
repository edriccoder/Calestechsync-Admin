<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CalesTechSync</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="welcome.css">
</head>

<style>
    body {

        background-image: url('https://www.hussle.com/blog/wp-content/uploads/2020/12/Gym-structure-1080x675.png');
        background-size: cover;
        background-position: fill;
        background-repeat: no-repeat;
    }
</style>

<body>
    <div class="bg-zinc-800">
        <div>
            <div class="mask herovideo-mask"></div>
        </div>

        <div class="row">
            <div class="col-xl-12 fixed-top">
                <div class="relative flex flex-col items-center justify-center">
                    <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                        <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                            <div class="flex lg:justify-center lg:col-start-2">
                                <h4 class="title-text mx-3 mt-3 flex flex-1 justify-end">CalesTechSync</h4>
                            </div>
                            <nav class="mx-3 flex flex-1 justify-end">
                            </nav>
                        </header>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="hero-text-overlay" style="pointer-events: none;">
                    <h1 class="hero-title mb-3 animate__animated animate__fadeIn animate__slow">Welcome to CalesTechSync
                        Admin Page</h1>
                    <h5 class="hero-subtitle mt-5 mb-3 animate__animated animate__fadeIn animate__delay-2s">Click
                        anywhere to login.</h5>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        document.addEventListener('click', function () {
            window.location.href = 'login.php';
        });
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
</body>

</html>