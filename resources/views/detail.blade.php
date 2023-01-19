@extends('layouts.appp')
@section('title', 'Detail Rooms')

@section('content')
<main>
  <section class="section-details-header"></section>
  <section class="section-details-content">
    <div class="rde-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="rde-text">
              <h2 style="font-family: 'Playfair Display', serif">Our Rooms</h2>
              <div class="bt-option">
                <a href="./home.html">Home</a>
                <span>Rooms</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Room Details Section Begin -->
  <section class="room-details-section spad ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="room-details-item">
                        <img src="{{ url('frontend/images/room-details.jpg') }}" alt="">
                        <div class="rd-text">
                            <div class="rd-title">
                                <h3 style="font-family: 'Playfair Display', serif;">Premium King Room</h3>
                                <div class="rdt-right">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star-half_alt"></i>
                                    </div>
                                </div>
                            </div>
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
                            <p>Garden and city views, 42-inch HDTV, mini-fridge, coffeemaker, WiFi, signature bath products
                                Unwind in this room featuring one king-sized Sweet Dreams® Bed with 5 jumbo hypoallergenic down pillows for added comfort. 
                                The room overlooks the Japanese inspired Kyoto Gardens and iconic downtown world skyline.</p>
                            <p>Keep your drinks chilled in the mini-fridge Work at the large desk and keep in touch with WiFi
                                Relax in the chair watching the 42-inch LCD TV with HD channels other amenities include a coffeemaker, 
                                clock-radio with MP3 connection and a spacious bathroom with signature bath products and a vanity area to spread out and make yourself at home.
                            </p>
                        </div>
                    </div>
                    <div class="rd-reviews">
                        <h4>Reviews</h4>
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="{{ url('frontend/images/avatar-1.jpg') }}" alt="">
                            </div>
                            <div class="ri-text">
                                <span>27 Aug 2019</span>
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5>Brandon Kelley</h5>
                                <p>This hotel was a great place to stay the staff what extremely helpful. That bar tender(Nathaniel) was awesome and very pleasant to talk to and made my stay very enjoyable. 
                                  The hotel desk lady, I forget her name, was awesome as well. She change my room for me to a better view, like I asked for. Major kudos to her and the bar tender. 
                                  When I return to the area again I will definitely stay at this location. Thanks..</p>
                            </div>
                        </div>
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="{{ url('frontend/images/avatar-2.jpg') }}" alt="">
                            </div>
                            <div class="ri-text">
                                <span>27 Aug 2019</span>
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5>Nate Stanley</h5>
                                <p>friendly and quick check-in at front desk. Had the pork sliders from The tavern and they were pretty good. Front desk went above and beyond when I could not print something in the business center. 
                                  Great service. Room was clean and bed was comfortable.</p>
                            </div>
                        </div>
                    </div>
                    <div class="review-add">
                        <h4>Add Review</h4>
                        <form action="#" class="ra-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name*">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email*">
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <h5>You Rating:</h5>
                                        <div class="rating">
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star-half_alt"></i>
                                        </div>
                                    </div>
                                    <textarea placeholder="Your Review"></textarea>
                                    <button type="submit">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="room-booking">
                        <h3 style="font-family: 'Playfair Display', serif;">Your Reservation</h3>
                        <form method="post" action="{{ route('user.reservasi.submit')}}" enctype="multipart/form-data"> 
                                        @csrf
                                        <div class="form-group">
                                                <input type="text"class="form-control h-auto" value="1" name="users_id" id="tambah-users_id" hidden/>
                                        </div>

                                        <div class="form-group">

                                                <input type="text"class="form-control h-auto" value="1" name="kamars_id" id="tambah-kamars_id" hidden/>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="jumlahkamar">Jumlah Kamar</label>
                                                <input type="text"class="form-control h-auto" name="jumlahkamar" id="tambah-jumlahkamar" required/>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="jumlahorang">Jumlah Orang</label>
                                                    <input type="text"class="form-control h-auto" name="jumlahorang" id="tambah-jumlahorang" required/>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="datein">Tanggal Masuk</label>
                                                    <input type="date"class="form-control h-auto" name="datein" id="tambah-datein" required/>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="dateout">Tanggal Keluar</label>
                                                    <input type="date"class="form-control h-auto" name="dateout" id="tambah-dateout" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer"> 
                                            <input type="hidden" name="id" id="edit-id"/> 
                                            <input type="hidden" name="old_cover" id="edit-old-cover"/> 
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> 
                                            <button type="submit" class="btn btn-success">Tambah</button> 
                                        </div> 
                                    </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Details Section End -->
  </section>

  
</main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}" />
@endpush

@push('addon-script')
    <script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
    <script>
      $(document).ready(function() {
        $('.xzoom, .xzoom-gallery').xzoom({
          zoomWidth: 500,
          title: false,
          tint: '#333',
          Xoffset: 15
        });
      });
    </script>
@endpush
