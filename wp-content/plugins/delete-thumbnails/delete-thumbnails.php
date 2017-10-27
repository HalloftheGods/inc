<?php
/*
Plugin Name:    Delete Thumbnails & Resized Images
Plugin URI:     https://davidsword.ca/wordpress-plugins/
Description:    Find and delete thumbnails & resized images from your Media Library
Version:        2.2
Author:         davidsword
Author URI:     https://davidsword.ca/
License:        GPLv3
License URI:    https://www.gnu.org/licenses/quick-guide-gplv3.en.html
Text Domain:    dlthumbs
*/

// Huston ..we have lift off.
add_action( 'init', 'dlthumbs' );
function dlthumbs() {
	global $dlthumbs;
	if (is_admin()) // admin only
		$dlthumbs = new dlthumbs();
}

class dlthumbs {
	public $menu_id;
	
	/**
	 * Plugin initialization
	 *
	 * @since 2.0
	 */
	public function __construct() {
		
		// Load up the localization file if we're using WordPress in a different language
		load_plugin_textdomain( 'dlthumbs' );

		// menu
		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'dlthumbs_admin_scripts' ) );
		
		$dir = wp_upload_dir();
		$this->dir = $dir['basedir'];
		$this->url = $dir['baseurl'];
		
		// get the media library for comparison
		$library = array();
		$args = array(		
		    'post_type' => 'attachment',
		    'post_mime_type' => 'image',
		    'numberposts' => -1,
		    'post_status' => null,
		    'post_parent' => null, // any parent
		);
		$attachments = get_posts($args);
	    foreach ($attachments as $post) {
	        $library[] = $this->fixslash(wp_get_attachment_url($post->ID));
	    }
	    
	    $this->library = $library;

	}

	/**
	 * Add Menu Page
	 *
	 * @since 2.0
	 */
	public function add_admin_menu() {
		$this->menu_id = add_management_page( __( 'Delete Thumbnails', 'dlthumbs' ), __( 'Delete Thumbnails', 'dlthumbs' ), 'administrator', 'dlthumbs', array($this, 'dlthumbs_interface') );
	}
	
	/**
	 * Add Resources
	 *
	 * @since 2.0
	 */
	function dlthumbs_admin_scripts() {
		if (get_current_screen()->base == 'tools_page_dlthumbs') {
	        wp_register_style( 'dlthumbs_css', plugins_url('style.css', __FILE__), false, '2.0' );
	        wp_enqueue_style( 'dlthumbs_css' );

	        wp_register_script( 'dlthumbs_js', plugins_url('dltumbs.js', __FILE__), array('jquery'), '2.0', true );
	        wp_enqueue_script( 'dlthumbs_js' );
	    }
	}

	/**
	 * HTML Page
	 *
	 * @since 2.0
	 */
	function dlthumbs_interface() {		
		?>
		<div class='wrap' id='dlthumbs'> 
			<h2><?php _e('Delete Resized Images','dlthumbs') ?></h2>
			
	        <?php 		        
	        // load files in media upload dir
	        $this->files = $this->get_files_from_folder(array(),$this->dir);
	        $this->numberOfFiles = count($this->files);
	        
	        // check the dir for permissions
	        $chmod = substr(sprintf('%o', fileperms($this->dir)), -4);
			if ($chmod < 755) : ?>
			<div class="notice notice-error"><p>
				<?php _e("This plugin requires Your upload directory CHMOD to be at least <code>755</code> so PHP can edit it. The deletion of files will most likely not work. Please contact your host or website provider for assistance. Mention your CHMOD is currently set to:",'dlthumbs') ?> <code><?php echo $chmod ?></code>
				
			</p></div>
			<?php endif;

	        
	        // Form submit, run deletion
	        $this->dltthumbs_form_submit();
	        
	        // show thumbnails
	        $this->dltthumbs_list_form();
	        ?>
	      </div>    
	      <?php
	}
	
	/**
	 * Form Submit Actions
	 *
	 * @since 2.0
	 */
	function dltthumbs_form_submit() {
        if ( isset($_POST['dlthumbs_list']) && !empty($_POST['dlthumbs_list']) && $_POST['dlthumbs_list'] != '[]' ) {
	        
	        if (check_admin_referer( 'dlthumbs_submit')) {
		        $deleted = $notDeleted = array();
		        $filestodelete = json_decode(str_replace('\"','"',$_POST['dlthumbs_list']));
		        foreach ($filestodelete as $deleteme) {
					if (unlink($this->dir.$deleteme))
						$deleted[] = $this->dir.$deleteme;
					else
						$notDeleted[] = $deleteme;
		        }
		        
		        if (count($deleted) > 0) {
			        ?>
				<div class="notice notice-success is-dismissible"><p>
					<?php echo count($deleted) ?> <?php _e('files successfully deleted.','dlthumbs') ?>
				</p></div>
			        <?php
		        }
		        if (count($notDeleted) > 0) {
			        ?>
				<div class="notice notice-error"><p>
					<?php _e('Yikes.','dlthumbs') ?> 
					<?php echo count($notDeleted) ?>  
					<?php _e('files were marked to-delete but PHP was unable to delete them.','dlthumbs') ?>
					<?php
					echo implode('<br /> - ', $notDeleted);
					?>
				</p></div>
			        <?php
		        }
		        
	        } else {
		        ?>
				<div class="notice notice-error"><p>
					<?php _e('Something went wrong with the','dlthumbs') ?> 
					<code>wp_nonce_field()</code>.
				</p></div>
		        <?php
	        }
	        
        }
	}
	 
	/**
	 * List all files from uploads directory
	 *
	 * @since 2.0
	 */
	function dltthumbs_list_form() {
		?>
		<div class="notice notice-<?php echo ($this->numberOfFiles == 0) ? 'error' : 'info' ?>"><p>
		<?php _e('Browsing','dlthumbs') ?>: <code>/<?php echo str_replace(get_home_path(),'',$this->dir) ?>/</code> 
		<?php echo $this->numberOfFiles ?> <?php _e('files were found','dlthumbs') ?> <?php if ($this->numberOfFiles > 0) { 
			?>, <span class='total_thumbnail_count'></span> <?php _e('images detected as resized images','dlthumbs') ?>.
		<?php } ?>
		</p></div>
		
		<table class='widefat'>
			<thead>
				<tr>
					<th>
						<input type='checkbox' name='selectall' title='Select All' />
					</th>
					<th>
						<?php _e('Preview','dlthumbs') ?>
					</th>
					<th>
						<?php _e('File','dlthumbs') ?>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$id = 0;
					foreach ($this->files as $afile) {
						$isThumb = $this->dlthumbs_is_thumbnail($afile); //($afile[1]) ? true : false;
						$file = $afile;//$afile[0];
						if (!$isThumb) continue;
						$id++;
						?>
						<tr>
							<td>
								&nbsp;<input id='input-<?php echo $id ?>' type='checkbox' value='<?php echo str_replace($this->dir,'',$file) ?>' /> 
							</td>
							<td>
								<a target='_Blank' href='<?php echo $this->fixslash(str_replace($this->dir,$this->url,$file)) ?>'>View »</a> 
							</td>
							<td>
								<label for='input-<?php echo $id ?>'>
									<?php echo str_replace($this->dir,'',$file) ?>
								</label>
							</td>
						</tr>
						<?php
					}
					if ($id == 0 || $this->numberOfFiles == 0) {
						?>
						<tr>
							<td colspan=3>
								<p id='wtfnofiles'><?php _e('No resized images found in','dlthumbs') ?>:<br />
								<code><?php echo $this->dir ?></code>
								</p>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>	
		
		<br />

		<form action="" method="POST">
			<?php
			// security
			wp_nonce_field( 'dlthumbs_submit');
			if ($id != 0 && $this->numberOfFiles != 0) {
			?>
			
			<!-- the magic -->
			<textarea name='dlthumbs_list'></textarea>
			<p>
				<label>
					<input class='nag' value='' type='checkbox' name='nag1' /> 
					<?php _e('I understand that pressing the button below will delete the above selected files','dlthumbs') ?>.
				</label>
				<br />
				<label>
					<input class='nag' value='' type='checkbox' name='nag2' /> 
					<?php _e('I have backed up the uploads directory before doing this','dlthumbs') ?> (<code>/<?php echo str_replace(get_home_path(),'',$this->dir) ?>/</code>).
				</label>
				<br />
				<label>
					<input class='nag' value='' type='checkbox' name='nag3' /> 
					<?php _e('I understand this action can not be undone','dlthumbs') ?>.</label><br />
			</p>
	        <input type='submit' class='button-primary button-large button' value='<?php _e('DELETE RESIZED IMAGES','dlthumbs') ?> &raquo;' disabled>
	        <?php } ?>
		</form>
		
		<p id='streetcred'><?php _e('Plugin By','dlthumbs') ?> <a href='https://davidsword.ca/' target='_Blank'>David Sword</a></p>
        <?php
	}
	
	/**
	 * function for indexing directory
	 *
	 * using itself from within to get sub-folder's indexed
	 * also used to delete thumbnails as indexing when instructed to
	 *
	 * @since 2.0
	 */ 
	function get_files_from_folder($files = '',$folder,$godeep = true) {		
		if (empty($files)) $files = array();
		
		// start read
		if (is_dir($folder)) {
			$dh  = opendir($folder);
			while (false !== ($filename = readdir($dh))) {
				if (!in_array($filename, array('.DS_Store','.','..',''))) {
	
					// it's a dir, index contents w/ current function
					if ($this->dlthumbs_check_if_dir($filename)) {
						// repeat same function, find files within folders,
						$subfiles = $this->get_files_from_folder(array(),$this->fixslash($folder.'/'.$filename.'/'),false);
						foreach ($subfiles as $subfile)
							$files[] = $subfile;

					// it's a file
					} else {
						$files[] = $this->fixslash($folder.'/'.$filename);
					}
				}
			}
		}
		return $files;
	}
	
	/**
	 * Determine if a file is a thumbnail or not
	 *
	 * @since 2.0
	 */ 
	function dlthumbs_is_thumbnail($file) {
		// if it's in the media library as a main file, it's defnitantly not a thumbnail
		// it could of been mistaken as one if it's source was a downloaded thumbnail from 
		// another Wordpress blog
		if (in_array(str_replace(get_home_path(),'',$file), $this->library)) {
			return false;
		}
		
		// if it has the thumbnail suffix, lets concider it
		preg_match('"-([0-9]*x[0-9]*)."', $file, $matches);
		if (count($matches) > 0) {
			return true;
			/*
			// wordpress thumbnails will generate with `quality = 82` in comments
			// if it has that, it's for sure a thumbnail
			$headers = @exif_read_data($file);
			$comment = (is_array($headers) && isset($headers['COMMENT'])) ? $headers['COMMENT'][0] : false;
			if ($comment) {
				$pos = strpos($comment, 'quality = 82');
				return ($pos === false) ? false : true;
			}
			*/
		}
		
		// not sure what it is, just send it back as not a thumbnail
		return false;
	}
		
	/**
	 * check if item is a dir or file
	 *
	 * find out if the current item in dir is another dir a hidden file, or an actual file
	 *
	 * @since 2.0
	 */ 
	function dlthumbs_check_if_dir($filename) {
		$pos = strpos($filename, '.');
		if ($pos === false) {
		    return true;
		} else {
		    return false;
		}
	}

	/**
	 * helper, replace double slash
	 *
	 * @since 2.0
	 */ 
	function fixslash($str) {
		return str_replace('//','/',$str);
	}
	
}
?>