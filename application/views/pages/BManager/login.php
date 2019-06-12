<section style="margin-top: 80px">
    <div class="container" align="center">
        <img src='<?php echo base_url();?>assets/images/gs.png' width="100px" height="100px"><br/><br/>
    </div>
</section>


<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Branch Manager</h3>
                    </div>  
                    <div class="panel-body">

                        <?php
                        echo $this->session->flashdata('error');
                        ?>
                        
                            <form method="post" action="<?php echo base_url()?>BManager/login_validation">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your E-mail" autofocus="autofocus">
                                <span class="text-danger"><?php echo form_error('email')?></span>
                                
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Your password">
                                <span class="text-danger"><?php echo form_error('password')?></span>
                                
                            </div>
                            <div class="form-group" align="center">
                                <input type="submit" class="btn btn-success" value="Login">
                                <br/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>