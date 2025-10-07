@extends('Layout.Header')



@section('content')
    <div class="contact-page-wrapper">
        <!-- start page-banner-section -->
        <section class="page-banner-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-banner-content text-center">
                            <h1 class="title">Contact Us</h1>
                            <div class="breadcrumb-trail">
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li class="active">Contact</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page-banner-section -->

    <!-- start contact-info-section -->
    <section class="contact-info-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-60px" data-aos="fade-up">
                        <h2 class="title">Get In Touch</h2>
                        <p class="sub-title">We're here to help and answer any question you might have. We look forward to hearing from you.</p>
                    </div>
                    <div class="contact-grids">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-40px" data-aos="fade-up" data-aos-delay="200">
                                <div class="grid-contact text-center h-100">
                                    <div class="icon-info-contact mb-30px">
                                        <div class="icon-contact">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                    <div class="contact-content">
                                        <h4 class="mb-15px">Office Address</h4>
                                        <p class="mb-0">25 North Street, Dubai<br>United Arab Emirates</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-40px" data-aos="fade-up" data-aos-delay="400">
                                <div class="grid-contact text-center h-100">
                                    <div class="icon-info-contact mb-30px">
                                        <div class="icon-contact">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="contact-content">
                                        <h4 class="mb-15px">Email Address</h4>
                                        <p class="mb-0">info@edefytheme.com<br>support@edefytheme.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-40px" data-aos="fade-up" data-aos-delay="600">
                                <div class="grid-contact text-center h-100">
                                    <div class="icon-info-contact mb-30px">
                                        <div class="icon-contact">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                    </div>
                                    <div class="contact-content">
                                        <h4 class="mb-15px">Phone Number</h4>
                                        <p class="mb-0">+91 256-987-239<br>+91 256-987-240</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end contact-info-section -->


    <!-- start contact-form-map -->
    <section class="contact-form-map section-padding">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-6 mb-50px" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-form">
                        <div class="section-title text-left mb-40px">
                            <h2 class="title">Send Us A Message</h2>
                        </div>
                        <form method="post" class="contact-validation-active" id="contact-form-main">
                            <div class="row">
                                <div class="col-md-6 mb-25px">
                                    <input type="text" class="form-control" name="f_name" id="f_name" placeholder="First Name*" required>
                                </div>
                                <div class="col-md-6 mb-25px">
                                    <input type="text" class="form-control" name="l_name" id="l_name" placeholder="Last Name*" required>
                                </div>
                            </div>
                            <div class="mb-25px">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address*" required>
                            </div>
                            <div class="mb-25px">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject*" required>
                            </div>
                            <div class="mb-35px">
                                <textarea class="form-control" name="note" id="note" placeholder="Your Message..." rows="6" required></textarea>
                            </div>
                            <div class="submit-area mb-30px">
                                <button type="submit" class="btn btn-lg btn-primary btn-hover-dark">
                                    <i class="fas fa-paper-plane"></i> Send Message
                                </button>
                                <div id="loader" style="display: none;">
                                    <i class="fas fa-spinner fa-spin"></i>
                                </div>
                            </div>
                            <div class="error-handling-messages">
                                <div id="success" class="alert alert-success" style="display: none;">Thank you! Your message has been sent successfully.</div>
                                <div id="error" class="alert alert-danger" style="display: none;">Error occurred while sending email. Please try again later.</div>
                            </div>
                        </form>
                    </div>                            
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="contact-map">
                        <div class="section-title text-left mb-40px">
                            <h3 class="title">Find Us Here</h3>
                        </div>
                        <div class="map-container">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671" allowfullscreen loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end contact-form-map -->
    </div>

@endsection