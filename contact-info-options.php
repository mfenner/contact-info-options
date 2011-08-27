<?php

/* 
	Plugin Name: Contact Info Options
	Plugin URI: 
	Description: Enable additional contact info fields in the user profile page. Optionally disable AIM, Yahoo IM and Jabber/Google Talk contact info.
	Author: Martin Fenner
	Version: 1.0.2
	Author URI: http://blogs.plos.org/mfenner
	
	GNU General Public License, Free Software Foundation <http://creativecommons.org/licenses/GPL/2.0/>
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
	
	Usage:
	If you use it inside the loop just add <?php the_author_meta('orcid'); ?> to show the ORCID.
	If you use it inside the loop just add <?php the_author_meta('affiliation'); ?> to show the affiliation.
	
	If it's outside the loop use <?php the_author_meta('orcid',1); ?>, where 1 is the User ID
	If it's outside the loop use <?php the_author_meta('affiliation',1); ?>, where 1 is the User ID

*/

// Add admin menu --
if (is_admin()) {
  add_action('admin_menu', 'cio_fields_menu');
	add_action('admin_init', 'cio_fields_register');
	add_filter( 'user_contactmethods', 'update_contactmethods' );
}

// Add whitelist options --
function cio_fields_register() {
	register_setting('cio_fields_optiongroup', 'cio_aim');
	register_setting('cio_fields_optiongroup', 'cio_yim');
	register_setting('cio_fields_optiongroup', 'cio_jabber');
	register_setting('cio_fields_optiongroup', 'cio_twitter');
	register_setting('cio_fields_optiongroup', 'cio_facebook');
	register_setting('cio_fields_optiongroup', 'cio_delicious');
	register_setting('cio_fields_optiongroup', 'cio_citeulike');
	register_setting('cio_fields_optiongroup', 'cio_mendeley');
	register_setting('cio_fields_optiongroup', 'cio_orcid');
	register_setting('cio_fields_optiongroup', 'cio_affiliation');
}

// Admin menu page details --
function cio_fields_menu() {
	add_users_page('Contact Info Options', 'Contact Info Options', 8, 'cio_fields', 'cio_fields_options');
}

// Add actual menu page --
function cio_fields_options() { ?>
	<div class="wrap">
		<div id="icon-users" class="icon32" ><br/></div>
		<h2>Contact Info Options</h2>
		<p>Enable the following contact info in the user settings:</p>
		
		<form method="post" action="options.php">
		<?php settings_fields('cio_fields_optiongroup'); ?>
				
		<table class="form-table">
			<tr valign="top">
				<td>
				  <p>Instant Messaging</p>
				</td>
				<td>
					<p><input type="checkbox" name="cio_aim" value="1" <?php echo (get_option('cio_aim')) ? 'checked="checked"' : ''; ?> id="cio_aim" /> AIM</p>
					<p><input type="checkbox" name="cio_yim" value="1" <?php echo (get_option('cio_yim')) ? 'checked="checked"' : ''; ?> id="cio_yim" /> Yahoo IM</p>
					<p><input type="checkbox" name="cio_jabber" value="1" <?php echo (get_option('cio_jabber')) ? 'checked="checked"' : ''; ?> id="cio_jabber" /> Jabber/Google Talk</p>
				</td>
			</tr>
			<tr valign="top">
				<td>
				  <p>Social Networking</p>
				</td>
				<td>
					<p><input type="checkbox" name="cio_twitter" value="1" <?php echo (get_option('cio_twitter')) ? 'checked="checked"' : ''; ?> id="cio_twitter" /> Twitter</p>
					<p><input type="checkbox" name="cio_facebook" value="1" <?php echo (get_option('cio_facebook')) ? 'checked="checked"' : ''; ?> id="cio_facebook" /> Facebook</p>
				</td>
			</tr>
			<tr valign="top">
				<td>
				  <p>Social Bookmarking</p>
				</td>
				<td>
					<p><input type="checkbox" name="cio_delicious" value="1" <?php echo (get_option('cio_delicious')) ? 'checked="checked"' : ''; ?> id="cio_delicious" /> Delicious</p>
		      <p><input type="checkbox" name="cio_citeulike" value="1" <?php echo (get_option('cio_citeulike')) ? 'checked="checked"' : ''; ?> id="cio_citeulike" /> CiteULike</p>
		      <p><input type="checkbox" name="cio_mendeley" value="1" <?php echo (get_option('cio_mendeley')) ? 'checked="checked"' : ''; ?> id="cio_mendeley" /> Mendeley</p>
				</td>
			</tr>
			<tr valign="top">
				<td>
				  <p>Author Identifiers</p>
				</td>
				<td>
					<p><input type="checkbox" name="cio_orcid" value="1" <?php echo (get_option('cio_orcid')) ? 'checked="checked"' : ''; ?> id="cio_orcid" /> ORCID</p>
				</td>
			</tr>
			<tr valign="top">
				<td>
				  <p>Other Contact Info</p>
				</td>
				<td>
					<p><input type="checkbox" name="cio_affiliation" value="1" <?php echo (get_option('cio_affiliation')) ? 'checked="checked"' : ''; ?> id="cio_affiliation" /> Affiliation</p>
				</td>
			</tr>
		</table>
								
		<p class="submit">
			<input type="submit" class="button-primary" value="Save Changes" />
		</p>
		</form>
	</div>
  <?php 
}

// Update contact methods based on admin settings --
function update_contactmethods( $contactmethods ) {
	
	if (get_option('cio_aim')):
	  $contactmethods['aim'] = 'AIM';
	else: 
	  unset($contactmethods['aim']);
	endif;
	
	if (get_option('cio_yim')):
	  $contactmethods['yim'] = 'Yahoo IM';
	else: 
	  unset($contactmethods['yim']);
	endif;
	
	if (get_option('cio_jabber')):
	  $contactmethods['jabber'] = 'Jabber/Google Talk';
	else: 
	  unset($contactmethods['jabber']);
	endif;

	if (get_option('cio_twitter')):
	  $contactmethods['twitter'] = 'Twitter';
	else: 
	  unset($contactmethods['twitter']);
	endif;
	
	if (get_option('cio_facebook')):
	  $contactmethods['facebook'] = 'Facebook';
	endif;

	if (get_option('cio_delicious')):
	  $contactmethods['delicious'] = 'Delicious';
	else: 
	  unset($contactmethods['delicious']);
	endif;
	
	if (get_option('cio_citeulike')):
	  $contactmethods['citeulike'] = 'CiteULike';
	else: 
	  unset($contactmethods['citeulike']);
  endif;

	if (get_option('cio_mendeley')):
	  $contactmethods['mendeley'] = 'Mendeley';
	else: 
	  unset($contactmethods['mendeley']);
	endif;

	if (get_option('cio_affiliation')):
	  $contactmethods['affiliation'] = 'Affiliation';
	else: 
	  unset($contactmethods['affiliation']);
	endif;

  return $contactmethods;
}

?>