<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-padding fix">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
                    <div class="single-footer-caption">
                        <div class="single-footer-caption">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="index.html"><img src="{{ asset("images/Logo_hp.png") }}"
                                        width="400px" alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p>
                                        {{ strip_tags(Str::limit($setting_web->about, 200)) }}
                                    </p>
                                </div>
                            </div>
                            <!-- social -->
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4  col-sm-6">
                    <div class="single-footer-caption mt-60">
                        <div class="footer-tittle">
                            <h4>Newsletter</h4>
                            <p>
                                Berita terbaru dan informasi menarik lainnya bisa kamu dapatkan dengan berlangganan
                            </p>
                            <!-- Form -->
                            <div class="footer-form">
                                <div id="mc_embed_signup">
                                    <form target="_blank" action="{{ route('subscribe') }}" method="get"
                                        class="subscribe_form relative mail_part">
                                        <input type="email" name="email" id="newsletter-form-email"
                                            style="color: #fffl; background-color: #fff; border: 1px solid #fff; border-radius: 5px; padding: 5px 10px; width: 100%; "
                                            placeholder="Email Address" class="placeholder hide-on-focus"
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = ' Email Address '">
                                        <div class="form-icon">
                                            <button type="submit" name="submit" id="newsletter-submit"
                                                class="email_icon newsletter-submit button-contactForm"><img
                                                    src="{{ asset('front/img/logo/form-iocn.png') }}"
                                                    alt=""></button>
                                        </div>
                                        <div class="mt-10 info"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                    <div class="single-footer-caption mb-50 mt-60">
                        <div class="footer-tittle">
                            <h4>Navigation</h4>
                        </div>
                        <div class="instagram-gellay">
                            <ul class="insta-feed">
                                <li>
                                    <a href="#">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Berita
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Kajian
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Asset
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <br>
                        <h4 style="color: #fff; font-size: 20px; ">Kunjungan</h4>
                        <!-- Default Statcounter code for Muhammadiyah Bukittinggi https://muhammadiyahbukittinggi.org -->
                        <script type="text/javascript">
                            var sc_project = 13033338;
                            var sc_invisible = 0;
                            var sc_security = "bb7fb319";
                            var scJsHost = "https://";
                            document.write("<sc" + "ript type='text/javascript' src='" +
                                scJsHost +
                                "statcounter.com/counter/counter.js'></" + "script>");
                        </script>
                        <noscript>
                            <div class="statcounter">
                                <a title="Web Analytics Made Easy - Statcounter" href="https://statcounter.com/"
                                    target="_blank"><img class="statcounter"
                                        src="https://c.statcounter.com/13033338/0/bb7fb319/0/"
                                        alt="Web Analytics Made Easy - Statcounter"
                                        referrerPolicy="no-referrer-when-downgrade">
                                </a>
                            </div>
                        </noscript>
                        <!-- End of Statcounter Code -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom aera -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="footer-border">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <div class="footer-copy-right">
                            <p>
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> Pimpinan Daerah Muhammadiyah Bukittinggi<a
                                    href="https://gariskode.com" target="_blank">.
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="footer-menu f-right">
                            <ul>
                                <li><a href="#">Terms of use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
