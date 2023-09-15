<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $_ENV['PROJECT_NAME'] ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/app.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand logo" href="#"><span>Z</span>php</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ducomentation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Repositry</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="#">Linkedin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Github</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <main>
        <p class="title text-center my-3">Welcome to Zphp framework</p>
        <div class="container">
            <div class="row mt-4">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">Introduction</div>
                    </div>
                    <div class="card-body bg-light">
                        The PHP MiniFrame Zphp is a lightweight and versatile web application framework designed to simplify web development tasks. Developed with simplicity and flexibility in mind, this framework empowers developers to create web applications quickly and efficiently. With a minimalistic footprint, the PHP MiniFrame is perfect for small to medium-sized projects where agility and ease of use are paramount.
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">Key Features</div>
                    </div>
                    <div class="card-body bg-light">
                        The PHP MiniFrame offers a range of essential features to streamline the development process. It includes a powerful routing system that allows developers to define clean and SEO-friendly URLs effortlessly. The framework also provides an intuitive templating engine for separating the application's logic from its presentation layer, enhancing code maintainability.
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">Customization and Extensibility</div>
                    </div>
                    <div class="card-body bg-light">
                        One of the standout features of the PHP MiniFrame is its high degree of customization and extensibility. Developers can easily integrate third-party libraries or create custom modules to extend the framework's functionality. This flexibility allows for tailored solutions that meet the specific requirements of each project. Whether you're building a CRUD apps or other ...
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>