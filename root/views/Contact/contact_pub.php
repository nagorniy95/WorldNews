<?php
require_once '../../views/header.php'; 
require_once '../../model/Database.php';
require_once '../../model/contact.php';


		$name ='';
		$email ='';
		$subject ='';	
		$message ='';
		
     

		//check for submit
		
		if(isset($_POST['submit'])){
			
			if (empty($name = $_POST['name'])) 
			{
			$msg = 'Please enter your name';
			
			}
			else if(empty($email = $_POST['email']))
			{
		    $msg = 'Please enter your email';
		
			}
			else if(filter_var($email, FILTER_VALIDATE_EMAIL)== false)
			{
				
			$msg = 'Please use valid email';
	        }
			else if(empty($subject = $_POST['subject']))
			{
			$msg = 'Please enter subject';
			
			}
			else if(empty($message = $_POST['message']))
			{
			$msg = 'Please write your message';
			
			}
			if(!isset($msg))
			{
			//recepient email
			$name = $_POST['name'];
	        $email = $_POST['email'];
	        $subject = $_POST['subject'];
	        $message = $_POST['message'];
			
				//insert data
				
			
              $dbcon = Database::getDb();
			  $c = new Contact();
			  $mycon = $c->addContact($name, $email, $subject, $message, $dbcon);
							
			if ($mycon) 
			{
				$success = "Thank you. We will contact with you soon";
            
			}
							
			else
			{
				 $msg = "Your message not sent";
			}
	
			
		}
	}


?>
<body>
<main >
<div class="container">
         <div class="row">
		 <div id="contact-form" class="col-md-6 col-sm-4">
			<h2 class="contact-heading">CONTACT US</h2>
             <form  method="post" action="contact_pub.php">
                 
				 <!--message-->
				<div>
				<?php
				if(isset($msg)){
				?>
				<div class="alert alert-danger">
				<?php echo $msg;?>
				</div>
				<?php } else if (isset($success)){?>
				<div class="alert alert-success">
				 <?php echo $success; ?>
				</div>
				<?php }?>
				</div>
                 <div class="txt">
                    <label for="form_name">Name *</label>
                    <input id="form_name" type="text" name="name" class="form-control"  placeholder="Name" value = "<?= $name; ?>">
                    </div>
                    <div class="txt">
                    <label for="form_email">Email *</label>
                    <input id="form_email" type="text" name="email" class="form-control" placeholder="Email" value = "<?= $email; ?>" >
                    </div>   
                    <div class="txt">
                    <label for="form_subject">Subject *</label>
                    <input id="form_subject" type="text" name="subject" class="form-control"  placeholder="Subject" value = "<?= $subject; ?>" >
                    </div>   
                    <div class="txt">
                    <label for="form_message">Message *</label>
                    <textarea id="form_message" name="message" class="form-control"  placeholder="Message" cols="40" rows="6" ><?= $message; ?></textarea>
                    </div>
                    <input type="submit" name="submit" id="submit_button" class="btn btn-lg btn-primary"  value="Submit"> 
                    </form>
				    
					</div>
		</div>		
</div>		
	</main>
	</body>
    <?php 
include '../../views/footer.php'; ?>
