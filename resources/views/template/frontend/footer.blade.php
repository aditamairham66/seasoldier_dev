<?php
$footer_data = footerData();
?>
<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top" data-aos="fade-up">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12 footer-newsletter text-center text-md-right">
                    <h4>NEWSLETTER</h4>
                    <form action="{{ webPath('email-subscribe') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        {!! showMessageFooter() !!}
                        @if(!empty($errors->first('search_footer')))
                            <div class="alert-text-danger">
                                <i class="ri-information-line"></i> {{ $errors->first('search_footer') }}
                            </div>
                        @endif
                        <div class="input-group-footer">
                            <input type="email" required name="search_footer" id="search_footer" value="{{ (old('search_footer')?:'') }}">
                            <div class="btn-group-footer">
                                <button class="btn-input">SUBSCRIBE</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-12 col-md-12 footer-newsletter text-center text-md-right mb-0">
                    <h4 class="mb-0">SEASOLDIER FOUNDATION</h4>
                    <p>{{ ($footer_data['footer_foundation']->content ?? '') }}</p>
                </div>

                <div class="col-lg-12 col-md-12 footer-newsletter text-center text-md-right">
                    <h4>MORE INFORMATION</h4>
                    <div class="social-links pt-3 pt-md-0">
                        <a href="{{ ($footer_data['footer_social_instagram']->content ?? '') }}" target="_blank" class="instagram">
                            <i class="bx bxl-instagram"></i>
                        </a>
                        <a href="{{ ($footer_data['footer_social_youtube']->content ?? '') }}" target="_blank" class="twitter">
                            <i class="bx bxl-youtube"></i>
                        </a>
                        <a href="{{ ($footer_data['footer_social_email']->content ?? '') }}" target="_blank" class="facebook">
                            <i class="bx bxs-envelope"></i>
                        </a>
                        <a href="{{ ($footer_data['footer_social_wa']->content ?? '') }}" target="_blank" class="google-plus">
                            <i class="bx bxl-whatsapp"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</footer><!-- End Footer -->
