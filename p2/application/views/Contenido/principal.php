<body class="principal">
    <main>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/carrusel/car_1.avif" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/carrusel/car_2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/carrusel/car_3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </main>

    <section>
        <div class="container1">
            <div class="textofichas">
                <H1>Sistema de Fichas</H1>
                <p>
                    Así es contamos con un nuevo sistema de compra. Comprando fichas ¡Podes comprar con ello tragos especiales 
                    exclusivos entre otras bebidas! Tambien vas a poder pagar por actividades especiales que realizaremos en el 
                    restobar y más!
                </p>
            </div>
            <div class= "img-principal">
                <img src="assets/img/body/fichas.jpg" alt="foto de fichas">
            </div>
        </div>
    </section>

    <section >
        <div class="container2">
            <div class= "img-principal">
                <img src="assets/img/body/comida.png" alt="foto de comida">
            </div>
            <div class="textofichas">
                <h1>Comida de primera calidad</h1>
                <p>
                    Contamos con un chef gourmet. ¡Serviremos todo tipo de comidas!
                </p>
            </div>
        </div>
    </section>

    <section>
        <div class="container1">
            <div class="textofichas2">
                <h1>Bebidas de alta calidad</h1>
                <p>
                    Las mejores bebidas con la mejor calidad, variedad y atención. Los bartender poseen una amplia experiencia en el rubro de tragos y bebidas
                </p>
            </div>
            <div class= "img-principal d-none d-md-block">
                <img src="assets/img/body/bebidas.avif" alt="foto de bebidas">
            </div>
        </div>
    </section>

    <section>
        <div class="productos_cats">
            <h1>¡CONOCE NUESTROS PRODUCTOS!</h1>
        </div>
        <div class="cats">
            <a href="<?php echo base_url('filtro_fernet') ?>" >FERNET</a>
            <a href="<?php echo base_url('filtro_gancia') ?>"">GANCIA</a>
            <a href="<?php echo base_url('filtro_vodka') ?>"">VODKA</a>
            <a href="<?php echo base_url('filtro_vino') ?>"">VINO</a>
        </div>
    </section>
</body>