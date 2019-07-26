<?php if ($this->session->flashdata('warning')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('warning'); ?>
				</div>
				<?php endif; ?>
<?php

echo heading('Login','2');
echo form_open('Auth/auth_validation', array ('method' => 'POST'));
$username = array('name' => 'username',
                'placeholder' => 'Your Username',
                'required' => 'required');
                echo form_input($username);
$password = array('name' => 'password',
                'type' => 'password',
                'placeholder'=>'Your Password',
                'required' => 'required');
                echo form_input($password);
                echo form_submit('submit','Login');
echo form_close();

?>