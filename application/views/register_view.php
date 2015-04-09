<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Simple Registration with CodeIgniter</title>
 </head>
 <body>
   <h1>Simple Registration with CodeIgniter</h1>
   <?php echo validation_errors(); ?>
   <?php echo form_open('login/register') ?>
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="password" name="password"/>
     <br/>
	 <label for="repassword">Re-type Password:</label>
     <input type="password" size="20" id="repassword" name="repassword"/>
     <br/>
     <input type="submit" value="Register"/>
   </form>
 </body>
</html>