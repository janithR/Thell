<footer class="container-fluid text-center" style="background-color: #2f2f2f; color: white;padding: 2px">
    <div id="contact" class="container-fluid">
        <h2 class="text-center">CONTACT</h2>
        <div class="row">
            <div class="col-sm-4">
                <p>Contact us and we'll get back to you within 24 hours.</p>
                <p><span class="glyphicon glyphicon-map-marker"></span> Colombo, Sri Lanka</p>
                <p><span class="glyphicon glyphicon-phone"></span> 011 1515151</p>
                <p><span class="glyphicon glyphicon-envelope"></span> mployit@gmail.com</p>
                <div class="row">
                    <div class="col-sm-12">
                        <div>
                            <a href="https://twitter.com">
                                <img title="Twitter" alt="Twitter" src="https://socialmediawidgets.files.wordpress.com/2014/03/01_twitter.png" width="35" height="35" />
                            </a>
                            <a href="https://pinterest.com">
                                <img title="Pinterest" alt="Pinterest" src="https://socialmediawidgets.files.wordpress.com/2014/03/13_pinterest.png" width="35" height="35" />
                            </a>
                            <a href="https://facebook.com">
                                <img title="Facebook" alt="Facebook" src="https://socialmediawidgets.files.wordpress.com/2014/03/02_facebook.png" width="35" height="35" />
                            </a>
                            <a href="https://instagram.com">
                                <img title="Instagram" alt="Instagram" src="https://socialmediawidgets.files.wordpress.com/2014/03/10_instagram.png" width="35" height="35" />
                            </a>
                            <a href="https://google.com">
                                <img title="Google +" alt="G+" src="<?php echo base_url(); ?>assets/images/google-plus.png" width="35" height="35" />
                            </a>
                        </div>
                    </div>
                </div>
                <br/>
            </div>
            <div class="col-sm-7 slideanim">
                <form action="http://localhost/Mploy/Welcome/sendMail" method="post">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                        </div>
                    </div>
                    <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="3"></textarea><br>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <button class="btn btn-primary pull-right" type="submit">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            <br/>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>&copy; 2017 M-Ploy  &middot; <a href="<?php echo base_url();?>Welcome/aboutus">About</a> &middot; <a href="<?php echo base_url(); ?>Blog">Blog</a> &middot; <a href="<?php echo base_url(); ?>Welcome/terms">Privacy Policy</a> &middot; <a href="<?php echo base_url(); ?>Welcome/terms">Terms</a></p>
            </div>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>