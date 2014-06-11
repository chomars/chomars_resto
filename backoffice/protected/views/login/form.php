<link rel="stylesheet" type="text/css"
	href="<?php echo BASE_URL?>/assets/bootstrap/css/bootstrap.min.css"
	media="screen, projection" />
<script
	src="<?php echo BASE_URL?>/assets/bootstrap/js/bootstrap.min.js"></script>

        
  
    <form action="<?php echo BASE_URL?>/login/auth/" method="POST" style=" margin:auto !important;">
  
        <div style="margin:auto; width:20%;">
    <div class="control-group" style="margin:auto;">
    <!-- Username -->
    <label class="control-label" for="username">Username</label>
    <div class="controls">
    <input type="text" id="username" name="username" placeholder="" style="height:25px !important">
    </div>
    </div>
    <div class="control-group" style="margin:auto;">
    <!-- Password-->
    <label class="control-label" for="password">Password</label>
    <div class="controls">
    <input type="password" id="password" name="password" placeholder="" style="height:25px !important">
    </div>
    </div>
    <div class="control-group" style="margin:auto;">
    <!-- Button -->
    <div class="controls">
    <input type="submit" name="submit" class="btn btn-success" value="Login"/>
    <input type="reset" class="btn btn-info" />
    </div>
    </div>
        </div>
    </form>
 
