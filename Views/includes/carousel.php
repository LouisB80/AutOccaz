<!-- Debut Carousel -->
<div class="col-md-11 mt-3 mb-5">
    <h2 class="text-center mb-4">Annonces les plus populaires</h2>
    <div id="carouselAuto" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner sizeImg" role="listbox">
            <div class="carousel-item active">
                <img class="d-block shadowImg" src="assets/img/cars.jpeg" data-src="holder.js/900x400?theme=social" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block shadowImg" src="assets/img/ford.jpg" data-src="holder.js/900x400?theme=social" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block shadowImg" src="assets/img/exp1.jpeg" alt="Third slide">
            </div>
            <?php foreach ($popularCarsList as $popularCar): ?>
                <div class="carousel-item">
                    <img class="d-block shadowImg" src="<?= $popularCar->source ?>" alt="<?= $popularCar->pictureName ?>">
                </div>
            <?php endforeach; ?>            
            <a class="carousel-control-prev" href="#carouselAuto" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon text-danger" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>                
            </a>
            <a class="carousel-control-next" href="#carouselAuto" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<!-- Fin Carousel -->