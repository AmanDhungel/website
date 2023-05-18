<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Company</h3>
                    <p>
                        Hilly Region Development Campaign (HRDC)  ,  <br>
                       Jajarkot Non-profit Organization (NGO)
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Contact Us</h3>
                    <p>

                        <strong>Phone:</strong> +977 - {{ systemSetting()->office_phone }}<br>
                        <strong>Email:</strong> {{ systemSetting()->office_email_address }}<br>
                        <strong>Address:</strong> {{ systemSetting()->office_address }}<br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                    </ul>
                </div>


                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Join Our Newsletter</h4>
                    <p>Stay connected for latest news & updates.</p>
                    <form action="" method="post">
                        <input type="email" required name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>HRDC</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="">Ominliblue</a>
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="{{ systemSetting()->office_twitter_link }}" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="{{systemSetting()->office_facebook_link}}" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="{{systemSetting()->office_youtube_link}}" class="youtube"><i class="bx bxl-youtube"></i></a>
            <a href="{{systemSetting()->office_linked_in_link}}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('design/vendor/aos/aos.js')}}"></script>
<script src="{{asset('design/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('design/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('design/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('design/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('design/vendor/waypoints/noframework.waypoints.js')}}"></script>
<script src="{{asset('design/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('design/js/main.js')}}"></script>

</body>

</html>