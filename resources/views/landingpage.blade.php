@extends('layouts.appp')

@section('title')
HOTELS
@endsection

@section('content')
<main>
  <!-- Header -->
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{ url('frontend/images/hero-1.jpg') }}" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ url('frontend/images/hero-2.jpg') }}" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ url('frontend/images/hero-3.jpg') }}" alt="Third slide">
      </div>
    </div>
  </div>
  
  <div class="covertext">
    <div class="col-lg-10" style="float:none; margin:0 auto;">
      <h1 class="title">HOTELS</h1>
      <h3 class="subtitle">Here are the best hotel booking sites, including recommendations for international travel and for finding low-priced hotel rooms.</h3>
    </div>
    <div class="col-xs-12 explore">
      <a href="#"><button type="button" class="btn btn-lg explorebtn">EXPLORE</button></a>
    </div>
  </div>
  
  <div class="container">
    <section class="section-stats row justify-content-center" id="stats">
      <div class="col-3 col-md-2 stats-detail">
        <h2>20K</h2>
        <p>Members</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>12</h2>
        <p>Countries</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>4</h2>
        <p>Rooms & Suites</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>72</h2>
        <p>Partners</p>
      </div>
    </section>
  </div>

  <section class="section-popular" id="popular">
    <div class="container">
      <div class="row">
        <div class="col text-center section-popular-heading">
          <h2>Rooms & Suites Popular</h2>
          <p>
            Something that you never try
            <br />
            before in this world
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- Header End-->
  
  <!-- Home Room Section Begin -->
  <section class="hp-room-section" id="room">
        <div class="container-fluid">
            <div class="hp-room-items">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" style="background-image: url(frontend/images/room-b1.jpg)">
                            <div class="hr-text">
                                <h3>Double Room</h3>
                                <h2>199$<span>/Pernight</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max persion 5</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed:</td>
                                            <td>King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="{{ route('detail') }}" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" style="background-image: url(frontend/images/room-b2.jpg)">
                            <div class="hr-text">
                                <h3>Premium King Room</h3>
                                <h2>159$<span>/Pernight</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max persion 5</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed:</td>
                                            <td>King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="{{ route('detail') }}" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" style="background-image: url(frontend/images/room-b3.jpg)">
                            <div class="hr-text">
                                <h3>Deluxe Room</h3>
                                <h2>198$<span>/Pernight</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max persion 5</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed:</td>
                                            <td>King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="{{ route('detail') }}" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" style="background-image: url(frontend/images/room-b4.jpg)">
                            <div class="hr-text">
                                <h3>Family Room</h3>
                                <h2>299$<span>/Pernight</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max persion 5</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed:</td>
                                            <td>King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="{{ route('detail') }}" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <!-- Home Room Section End -->

  <!-- About Us Section Begin -->
  <section class="aboutus-section spad" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>About Us</span>
                            <h2>The pursuit of perfection <br />HOTELS</h2>
                        </div>
                        <p>HOTELS is a leading online accommodation site. We’re passionate about
                            travel. Every day, we inspire and reach millions of travelers.</p>
                        <p>So when it comes to booking the perfect hotel we’ve got you covered.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="{{ url('frontend/images/popular-2.jpg') }}" alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ url('frontend/images/popular-1.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </section>
  <!-- About Us Section End -->

  <!-- Services Section End -->
  </hr>
  <section class="services-section spad" id="svc">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                      <span>What We Do</span>
                      <h2>Discover Our Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <div class="media-29191-icon">
                          <img src="{{ url('frontend/images/meetingroom.png') }}" alt="Image" class="img-fluid">
                        </div>
                        <h4>Meeting Room</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <div class="media-29191-icon">
                          <img src="{{ url('frontend/images/wifi (2).png') }}" alt="Image" class="img-fluid">
                        </div>
                        <h4>WiFi in public areas</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <div class="media-29191-icon">
                          <img src="{{ url('frontend/images/catering.png') }}" alt="Image" class="img-fluid">
                        </div>
                        <h4>Catering Service</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <div class="media-29191-icon">
                          <img src="{{ url('frontend/images/Laundry.png') }}" alt="Image" class="img-fluid">
                        </div>
                        <h4>Laundry</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <div class="media-29191-icon">
                          <img src="{{ url('frontend/images/car.png') }}" alt="Image" class="img-fluid">
                        </div>
                        <h4>Hire Driver</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <div class="media-29191-icon">
                          <img src="{{ url('frontend/images/drink.png') }}" alt="Image" class="img-fluid">
                        </div>
                        <h4>Bar & Drink</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

  <!-- Testimoni -->
  <section class="section-testimonial-heading" id="testi">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h2>They Are Loving Us</h2>
          <p>
            Moments were giving them
            <br />
            the best experience
          </p>
        </div>
      </div>
    </div>
  </section>

  <section
    class="section section-testimonial-content"
    id="testimonialContent"
  >
    <div class="container">
      <div class="section-popular-travel row justify-content-center">
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testiominal-content">
              <img
                src="frontend/images/testimonial-1.png"
                alt="User"
                class="mb-4 rounded-circle"
              />
              <h3 class="mb-4">Angga Risky</h3>
              <p class="testimonial">
                “ Spent a night here and we only had good things to say. We slept well. The room was quiet, cold temperature even without AC, big room for a family of 3 adults and 2 kids. We rent 2 extra beds. Beds were firm enough and comfortable. “
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testiominal-content">
              <img
                src="frontend/images/testimonial-2.png"
                alt="User"
                class="mb-4 rounded-circle"
              />
              <h3 class="mb-4">Shayna</h3>
              <p class="testimonial">
                “ The place is clean and staff is friendly and cooperative. The service is good and the pictures of rooms and the property as seen in reality. The room is attention to details and it's a modern designed. Really like the place, and would definitely come back again. “
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testiominal-content">
              <img
                src="frontend/images/testimonial-3.png"
                alt="User"
                class="mb-4 rounded-circle"
              />
              <h3 class="mb-4">Shabrina</h3>
              <p class="testimonial">
                “ Great place highly recommend. Good ambiance, view, kids engagement area. Very nice and helpful staff. “
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Testimoni End -->
</main>
@endsection


