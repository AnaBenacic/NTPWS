<?php 

print'
		<h1>Contact</h1>
		<div id="contact">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2780.9430598576428!2d16.037647390988415!3d45.81239873558465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4766787901c188bd%3A0xdb0035a356b8caa4!2sZnanstveno-u%C4%8Dili%C5%A1ni%20kampus%20Borongaj!5e0!3m2!1shr!2shr!4v1728908367339!5m2!1shr!2shr" width="85%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<form action="index.php" id="contact_form" name="contact_form" method="POST">
				<label for="firstname">First name: <small style="color:red">*</small></label>
				<input type="text" id="firstname" name="firstname" placeholder="Your name..." required>

				<label for="lastname">Last name: <small style="color:red">*</small></label>
				<input type="text" id="lastname" name="lastname" placeholder="Your last name..." required>
				
				<label for="email">E-mail: <small style="color:red">*</small></label>
				<input type="email" id="email" name="email" placeholder="Your e-mail..." required>

				<label for="country">Country: <small style="color:red">*</small></label>
				<select id="country" name="country" required>
				<option value="">Please choose from the dropdown menu</option>';
				include 'countries.php';
print '
				</select>

				<label for="subject">Subject: <small style="color:red">*</small></label>
				<textarea id="subject" name="subject" placeholder="Write something..." style="height:250px" required></textarea>

				<input type="submit" value="Submit">
			</form>
		</div>';

?>