
@extends('front.master')
@section('content')
<style>
    header.header{
  background: rgba(14, 66, 178, 0.65) !important; /* biru transparan */
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
  box-shadow: 0 8px 24px rgba(0, 49, 132, 0.12);
  transition: background .25s ease, box-shadow .25s ease;
}

/* Saat halaman discroll / sticky */
header.header.scrolled,
.scrolled header.header,
header.header.sticked{
  background: rgba(14, 66, 178, 0.9) !important;
  box-shadow: 0 10px 28px rgba(0, 49, 132, 0.18);
}

/* Warna menu (opsional, tetap putih) */
header.header .navmenu a{ color:#fff; }
header.header .navmenu a:hover,
header.header .navmenu a.active{ color:#e6f2ff; }

/* Mobile nav aktif (burger dibuka) */
.mobile-nav-active header.header,
.mobile-nav-active .navmenu{
  background: rgba(14, 66, 178, 0.95) !important;
}
 /* ===== RESET aturan template yang memaksa deskripsi di bawah ===== */
.glightbox-container .gslide-description,
.glightbox-container .gdesc {
  position: static !important;     /* jangan absolute/bottom lagi */
  width: auto !important;
}

/* ===== Ukuran kontainer utama ===== */
.glightbox-container .ginner-container{
  width: min(96vw, 1440px) !important;
  height: 90vh !important;
}

/* ===== Dua kolom: kiri media, kanan card detail ===== */
.glightbox-container .gslide{
  display: flex !important;
  align-items: stretch;
  gap: 0;
}

/* Kiri: foto 4:3, setinggi viewport */
.glightbox-container .gslide-media{
  flex: 1 1 auto;                /* isi ruang sisa */
  height: 90vh;                  /* tinggi tetap */
  aspect-ratio: 4 / 3;           /* rasio 4:3 */
  max-width: calc(96vw - 420px); /* sisakan ruang card kanan */
}
.glightbox-container .gslide-media img,
.glightbox-container .gslide-media video{
  width: 100%;
  height: 100%;
  object-fit: cover;             /* penuh & rapi */
  display: block;
}

/* Kanan: card detail scrollable */
.glightbox-container .gslide-description{
  flex: 0 0 420px;               /* lebar card kanan */
  max-width: 420px;
  background: #fff;
  border-left: 1px solid rgba(0,0,0,.08);
  display: flex;
  flex-direction: column;
  overflow: hidden;              /* shell */
}
.glightbox-container .gdesc-inner{
  height: 100%;
  overflow-y: auto;              /* konten yg scroll */
  padding: 18px 20px;
}

/* Rapikan tipografi */
.glightbox-container .gdesc-inner h1,
.glightbox-container .gdesc-inner h2,
.glightbox-container .gdesc-inner h3{ margin: 0 0 .5rem; }
.glightbox-container .gdesc-inner ul,
.glightbox-container .gdesc-inner ol{ padding-left: 1.25rem; margin: .25rem 0 .75rem; }

/* Responsif (mobile): stack vertikal */
@media (max-width: 992px){
  .glightbox-container .gslide{ display: block !important; }
  .glightbox-container .gslide-media{
    height: 50vh; aspect-ratio: auto; max-width: 100%;
  }
  .glightbox-container .gslide-description{
    max-width: 100%; flex-basis: auto;
  }
  .glightbox-container .gdesc-inner{ height: calc(40vh - 0px); }
}



</style>
<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="{{asset('assets/img/logo.png')}}" alt=""> -->
        <h1 class="sitename">Raihans Travel</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>


    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
    @foreach ($herosections as $hero)
    <img src="{{Storage::url($hero->image_url)}}" alt="" data-aos="fade-in">
    <div class="container d-flex flex-column align-items-center">
        <h2 data-aos="fade-up" data-aos-delay="100">{{$hero->title}}</h2>
        <p data-aos="fade-up" data-aos-delay="200">{{$hero->description}}</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
            <a href="{{$hero->button_url}}" class="btn-get-started">{{$hero->button_text}}</a>
        </div>
    </div>
    @endforeach

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">
            @foreach ($abouts as $about)

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h3>{{$about->headline}}</h3>
                <img src="{{Storage::url($about->image)}}" class="img-fluid rounded-4 mb-4" alt="">
                <p>{!! $about->description !!}</p>
            </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
              <p>
                {!! $about->sub_description !!}
              </p>

              <div class="position-relative mt-4">
                <img src="{{Storage::url($about->second_image)}}" class="img-fluid rounded-4" alt="">
              </div>
            </div>
          </div>
        </div>
         @endforeach
      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
        @forelse ($companyStats as $stat)
                    <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                    <div>
                        <span>{{$stat->goals}}</span>
                        <p>{{$stat->title}}</p>
                    </div>
                    </div>
                </div>
        @empty
                <p>Data Kosong</p>
        @endforelse
          <!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Featured Services<br></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">
        @forelse ($services->take(3) as $service)
            <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="service-item">
              <div class="img">
                <img src="{{asset('assets/img/services-1.jpg')}}" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                  <i class="bi bi-activity"></i>
                </div>
                <a href="service-details.html" class="stretched-link">
                  <h3>{{$service->title}}</h3>
                </a>
                <p>{!!$service->description!!}</p>
              </div>
            </div>
          </div><!-- End Service Item -->
        @empty
          <p>Tidak ada Data</p>
        @endforelse


        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section light-background">

      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{asset('assets/img/clients/client-1.png')}}" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{asset('assets/img/clients/client-2.png')}}" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{asset('assets/img/clients/client-3.png')}}" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{asset('assets/img/clients/client-4.png')}}" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{asset('assets/img/clients/client-5.png')}}" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{asset('assets/img/clients/client-6.png')}}" class="img-fluid" alt="">
          </div><!-- End Client Item -->

        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- Features Section -->
    <section id="features" class="features section">
  <div class="container">

    {{-- TAB NAV --}}
    <ul class="nav nav-tabs row d-flex" data-aos="fade-up" data-aos-delay="100">
      @forelse ($detailedServices as $service)
        <li class="nav-item col-3">
          <a
            class="nav-link {{ $loop->first ? 'active show' : '' }}"
            data-bs-toggle="tab"
            data-bs-target="#features-tab-{{ $service->id }}"
            role="tab"
            aria-controls="features-tab-{{ $service->id }}"
            aria-selected="{{ $loop->first ? 'true' : 'false' }}"
          >
            <i class="bi bi-binoculars"></i>
            <h4 class="d-none d-lg-block">{{ $service->name }}</h4>
          </a>
        </li>
      @empty
        <li class="nav-item col-12">
          <span class="nav-link disabled">Belum ada layanan</span>
        </li>
      @endforelse
    </ul>
    <!-- End Tab Nav -->

    {{-- TAB PANES --}}
    <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
      @forelse ($detailedServices as $service)
        <div
          class="tab-pane fade {{ $loop->first ? 'active show' : '' }}"
          id="features-tab-{{ $service->id }}"
          role="tabpanel"
        >
          <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
              <h3>{{ $service->name }}</h3>

              {{-- Detail dari RichEditor (boleh mengandung bullet & numbering) --}}
              <div class="fst-italic mb-3">
                {!! $service->detail !!}
              </div>
            </div>

            <div class="col-lg-6 order-1 order-lg-2 text-center">
              <img
                class="img-fluid"
                alt="{{ $service->name }}"
                src="{{
                  $service->image
                    ? ( \Illuminate\Support\Str::startsWith($service->image, ['http://','https://'])
                        ? $service->image
                        : \Illuminate\Support\Facades\Storage::url($service->image)
                      )
                    : asset('assets/img/placeholder-service.jpg')
                }}"
              >
            </div>
          </div>
        </div>
      @empty
        <div class="tab-pane fade active show">
          <p>Belum ada data layanan yang ditampilkan.</p>
        </div>
      @endforelse
    </div>

  </div>
</section>
<!-- /Features Section -->

    <!-- Services 2 Section -->
    <section id="services-2" class="services-2 section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>CHECK OUR SERVICES</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
            @forelse ($services as $service)
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-{{$service->icon_class}} icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">{{$service->title}}</a></h4>
                <p class="description">{!!$service->description!!}</p>
              </div>
            </div>
          </div><!-- End Service Item -->
            @empty
            <p>Tidak ada data</p>
            @endforelse
        </div>

      </div>

    </section><!-- /Services 2 Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section dark-background">

      <img src="{{asset('assets/img/testimonials-bg.jpg')}}" class="testimonials-bg" alt="">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{asset('assets/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{asset('assets/img/testimonials/testimonials-2.jpg')}}" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{asset('assets/img/testimonials/testimonials-3.jpg')}}" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{asset('assets/img/testimonials/testimonials-4.jpg')}}" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{asset('assets/img/testimonials/testimonials-5.jpg')}}" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>CHECK OUR PORTFOLIO</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="row gy-4 isotope-container">
  @forelse ($products as $product)
    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
      <div class="portfolio-content h-100">
        {{-- Gambar produk --}}
        <img
          class="img-fluid"
          alt="{{ $product->name }}"
          src="{{
            $product->image
              ? ( \Illuminate\Support\Str::startsWith($product->image, ['http://','https://'])
                    ? $product->image
                    : \Illuminate\Support\Facades\Storage::url($product->image) )
              : asset('assets/img/portfolio/placeholder.jpg')
          }}"
        >

        <div class="portfolio-info">
          {{-- <h4>{{ $product->name }}</h4> --}}
          <p>{{$product->name }}</p>

          {{-- Tombol popup (GLightbox) --}}
          <a
            href="{{
              $product->image
                ? ( \Illuminate\Support\Str::startsWith($product->image, ['http://','https://'])
                      ? $product->image
                      : \Illuminate\Support\Facades\Storage::url($product->image) )
                : asset('assets/img/portfolio/placeholder.jpg')
            }}"
            class="glightbox preview-link"
            data-gallery="portfolio-gallery-products"
            data-glightbox="title: {{ e($product->name) }}; description: .desc-{{ $product->id }}"
            title="{{ $product->name }}"
          >
            <i class="bi bi-zoom-in"></i>
          </a>
        </div>
      </div>

      {{-- Deskripsi untuk lightbox (tersembunyi) --}}
      <div class="d-none">
        <div class="glightbox-desc desc-{{ $product->id }}">
          {!! $product->detail !!}
          <hr class="my-3">
          <p><strong>Harga:</strong> Rp {{ number_format((int) $product->price, 0, ',', '.') }}</p>
        </div>
      </div>
    </div>
  @empty
    <p class="text-muted">Belum ada produk.</p>
  @endforelse
</div>
<!-- End Portfolio Item -->

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->

    <!-- Team Section -->
    <section id="team" class="team section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Team</h2>
        <p>CHECK OUR TEAM</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-5">
            @forelse ($teams as $team)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                    <div class="pic" style="width:100%; height:480px; overflow:hidden; border-radius:12px;">
                    <img src="{{ Storage::url($team->image_url) }}"
                        alt="{{ $team->name }}"
                        class="w-100 h-100"
                        style="object-fit:cover; object-position:center;">
                    </div>
                    <div class="member-info">
                    <h4>{{ $team->name }}</h4>
                    <span>{{ $team->position }}</span>
                    <div class="social">
                        <a href="{{ $team->instagram }}"><i class="bi bi-instagram"></i></a>
                    </div>
                    </div>
                </div>
                </div>
            @empty
            @endforelse
            </div>
      </div>

    </section><!-- /Team Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-24 ">
            <div class="row gy-4">

              <div class="col-lg-12">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>Jl. Raya Panglima Sudirman, Wiroborang, Kec. Mayangan, Kota Probolinggo, Jawa Timur 67213</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>+62 822-2931-6108</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>raihanstourtravel@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

            </div>
          </div>
        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Dewi</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Dewi</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href=“https://themewagon.com>ThemeWagon
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/aos/aos.js')}}"></script>
  <script src="{{asset('assets/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assets/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/isotope-layout/isotope.pkgd.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>

    <script>
  document.addEventListener('DOMContentLoaded', () => {
    GLightbox({
      selector: '.portfolio .glightbox',
      descPosition: 'right',   // card detail di kanan
      width: '96vw',
      height: '90vh',
      loop: true,
    });
  });
</script>





</body>
@endsection


