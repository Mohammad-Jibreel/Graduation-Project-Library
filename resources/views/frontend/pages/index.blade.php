@extends('frontend.layouts.app')


@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/assetsfront/img/hero-bg.jpg" class="d-block w-100" alt="..." style="width: 400px;height: 550px;">
        <div class="carousel-caption d-none d-md-block">
          <p>Knowledge is one of the most important causes of happiness. Make the book your constant friend.
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/assetsfront/img/library1.jpg" class="d-block w-100" alt="..." style="width: 400px;height: 550px;">
        <div class="carousel-caption d-none d-md-block">
          <h5>The most beautiful thing said in reading</h5>
          <p>
            Read me simply as the sun reads the leaves of the grass, and as a bird reads the book of the rose...
            </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assetsfront/img/library2.jpg" class="d-block w-100"  alt="..." style="width: 400px;height: 550px;">
        <div class="carousel-caption d-none d-md-block">
          <h5>reading</h5>
          <p>
            It is the art of listening
            .</p>
        </div>
      </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!--End Slidebar-->

   <!-- ======= About Section ======= -->
   <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
          <img src="assetsfront/img/about.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
          <h3>Welcome to Al- Balqa Applied University  library</h3>
          <p class="fst-italic">
            here we provide e-books for all students in all universities colleges
          </p>
          <ul>
            <li><i class="bi bi-check-circle"></i>You can exchange used books with other students</li>
            <li><i class="bi bi-check-circle"></i> Use the chat to communicate with other members</li>
            <li><i class="bi bi-check-circle"></i> Search by categories, author, publisher or book name to easily find the book you're looking for            </li>
          </ul>


        </div>
      </div>

    </div>
  </section><!-- End About Section -->


<!--Card Section-->



   <!-- ======= Events Section ======= -->
 <section id="events" class="events">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-md-6 d-flex align-items-stretch">
          <div class="card">
            <div class="card-img">
              <img src="/assetsfront/img/homebg.jpg" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title"><a href="">Students</a></h5>
              <p class="fst-italic text-center"></p>
              <p class="card-text">This site was created to support students from different majors in their studies.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 d-flex align-items-stretch">
          <div class="card">
            <div class="card-img">
              <img src="/assetsfront/img/bghome.jpg" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title"><a href="">Students</a></h5>
              <p class="fst-italic text-center"></p>
              <p class="card-text">If you have a subject - related question or would like to make a suggestion , please contact with us.</p>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>


<div style="margin-left:25%">
    <iframe   src="https://www.youtube.com/embed/ixPhYKcAzJI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen width="800px" height="500px"></iframe>



</div>


    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg mt-5">
        <div class="container">

          <div class="row counters">

            <div class="col-lg-2 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="{{ count(App\Models\User::all()) }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>User</p>
            </div>

            <div class="col-lg-2 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="{{ count(App\Models\Book::all())}}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Book</p>
            </div>

            <div class="col-lg-2 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="{{ count(App\Models\Category::all()) }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Ctegories</p>
            </div>

            <div class="col-lg-2 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="{{ count(App\Models\Publisher::all()) }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Publisher</p>
            </div>
            <div class="col-lg-2 col-6 text-center">
                <span data-purecounter-start="0" data-purecounter-end="{{ count(App\Models\Author::all()) }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Authors</p>
              </div>
              <div class="col-lg-2 col-6 text-center">
                <span data-purecounter-start="0" data-purecounter-end="{{ count(App\Models\Translator::all()) }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Translator</p>
              </div>

          </div>

        </div>
      </section><!-- End Counts Section -->


@endsection
