<?php
 // Generate a .rdp file that can be used to connect to a remote desktop computer.
 // Reference: https://helpforsure.wordpress.com/2011/01/23/rdp-settings-for-remote-desktop-connection-version-7%E2%80%8F/
 // If client is not Win7 or Win2k8, they can upgrade to the MSTS client that speaks RDP 7.0 here: http://support.microsoft.com/kb/969084
 // If server is not Win7 Ultimate or Win2k8 R2 Enterprise+, "use multimon" has no effect


 //Example:
 //?autoconnect=1&full_address=192.168.0.100&startfullscreen=1&screen_mode_id=2&name=THIS_IS_THE_RESULTING_RDP_FILE_FILENAME


 //A line for copy/paste: if($_REQUEST['']=='') { $var['']=''; } else { $var['']=$_REQUEST['']; }
 if($_REQUEST['startfullscreen']=='') { $var['startfullscreen']='0'; } else { $var['startfullscreen']=$_REQUEST['startfullscreen']; }
 if($_REQUEST['session_bpp']=='') { $var['session_bpp']='32'; } else { $var['session_bpp']=$_REQUEST['session_bpp']; }
 if($_REQUEST['compression']=='') { $var['compression']='1'; } else { $var['compression']=$_REQUEST['compression']; }
 if($_REQUEST['keyboardhook']=='') { $var['keyboardhook']='2'; } else { $var['keyboardhook']=$_REQUEST['keyboardhook']; }
 if($_REQUEST['audiomode']=='') { $var['audiomode']='2'; } else { $var['audiomode']=$_REQUEST['audiomode']; }
 if($_REQUEST['redirectclipboard']=='') { $var['redirectclipboard']='1'; } else { $var['redirectclipboard']=$_REQUEST['redirectclipboard']; }
 if($_REQUEST['redirectdrives']=='') { $var['redirectdrives']='0'; } else { $var['redirectdrives']=$_REQUEST['redirectdrives']; }
 if($_REQUEST['redirectprinters']=='') { $var['redirectprinters']='0'; } else { $var['redirectprinters']=$_REQUEST['redirectprinters']; }
 if($_REQUEST['redirectcomports']=='') { $var['redirectcomports']='0'; } else { $var['redirectcomports']=$_REQUEST['redirectcomports']; }
 if($_REQUEST['redirectsmartcards']=='') { $var['redirectsmartcards']='1'; } else { $var['redirectsmartcards']=$_REQUEST['redirectsmartcards']; }
 if($_REQUEST['displayconnectionbar']=='') { $var['displayconnectionbar']='1'; } else { $var['displayconnectionbar']=$_REQUEST['displayconnectionbar']; }
 if($_REQUEST['autoreconnection_enabled']=='') { $var['autoreconnection_enabled']='1'; } else { $var['autoreconnection_enabled']=$_REQUEST['autoreconnection_enabled']; }
 if($_REQUEST['alternate_shell']=='') { $var['alternate_shell']=''; } else { $var['alternate_shell']=$_REQUEST['alternate_shell']; }
 if($_REQUEST['shell_working_directory']=='') { $var['shell_working_directory']=''; } else { $var['shell_working_directory']=$_REQUEST['shell_working_directory']; }
 if($_REQUEST['disable_wallpaper']=='') { $var['disable_wallpaper']='1'; } else { $var['disable_wallpaper']=$_REQUEST['disable_wallpaper']; }
 if($_REQUEST['disable_full_window_drag']=='') { $var['disable_full_window_drag']='1'; } else { $var['disable_full_window_drag']=$_REQUEST['disable_full_window_drag']; }
 if($_REQUEST['disable_menu_anims']=='') { $var['disable_menu_anims']='1'; } else { $var['disable_menu_anims']=$_REQUEST['disable_menu_anims']; }
 if($_REQUEST['disable_themes']=='') { $var['disable_themes']='1'; } else { $var['disable_themes']=$_REQUEST['disable_themes']; }
 if($_REQUEST['disable_cursor_setting']=='') { $var['disable_cursor_setting']='0'; } else { $var['disable_cursor_setting']=$_REQUEST['disable_cursor_setting']; }
 if($_REQUEST['allow_font_smoothing']=='') { $var['allow_font_smoothing']='1'; } else { $var['allow_font_smoothing']=$_REQUEST['allow_font_smoothing']; }
 if($_REQUEST['allow_desktop_composition']=='') { $var['allow_desktop_composition']='0'; } else { $var['allow_desktop_composition']=$_REQUEST['allow_desktop_composition']; }
 if($_REQUEST['bitmapcachepersistenable']=='') { $var['bitmapcachepersistenable']='1'; } else { $var['bitmapcachepersistenable']=$_REQUEST['bitmapcachepersistenable']; }
 if($_REQUEST['smart_sizing']=='') { $var['smart_sizing']='1'; } else { $var['smart_sizing']=$_REQUEST['smart_sizing']; }
 if($_REQUEST['authentication_level']=='') { $var['authentication_level']='0'; } else { $var['authentication_level']=$_REQUEST['authentication_level']; }
 if($_REQUEST['domain']=='') { $var['domain']=''; } else { $var['domain']=$_REQUEST['domain']; }
 if($_REQUEST['username']=='') { $var['username']=''; } else { $var['username']=$_REQUEST['username']; }
 $var['screen_mode_id']=$_REQUEST['screen_mode_id'];
 $var['use_multimon']=$_REQUEST['use_multimon'];
 // Uncomment if you find the following logic helpful... (Multi-mon should take precedence over 'span monitors')
 /*
 if($var['use_multimon']=='') // User is not using multi-monitor mode
 {
  $var['span_monitors']=$_REQUEST['span_monitors'];
  if($var['span_monitors']=='') // User is not using the 'cheap man's multi-monitor mode' aka 'span monitors'
  {                             // ... so desktop height and width need to be set
   $var['desktopwidth']=$_REQUEST['desktopwidth'];
   $var['desktopheight']=$_REQUEST['desktopheight'];
  }
 }
 */

 //Build the RDP File and offer it for Download:
  header("Content-type: application/rdp");
  header("Content-disposition: attachment; filename=".$_REQUEST['name'].".rdp");

 ?>
compression:i:<?php echo $var['compression']."\r\n"; ?>
keyboardhook:i:<?php echo $var['keyboardhook']."\r\n"; ?>
audiomode:i:<?php echo $var['audiomode']."\r\n"; ?>
redirectdrives:i:<?php echo $var['redirectdrives']."\r\n"; ?>
redirectprinters:i:<?php echo $var['redirectprinters']."\r\n"; ?>
redirectcomports:i:<?php echo $var['redirectcomports']."\r\n"; ?>
redirectsmartcards:i:<?php echo $var['redirectsmartcards']."\r\n"; ?>
displayconnectionbar:i:<?php echo $var['displayconnectionbar']."\r\n"; ?>
autoreconnection enabled:i:<?php echo $var['autoreconnection_enabled']."\r\n"; ?>
alternate shell:s:<?php echo $var['alternate_shell']."\r\n"; ?>
shell working directory:s:<?php echo $var['shell_working_directory']."\r\n"; ?>
disable wallpaper:i:<?php echo $var['disable_wallpaper']."\r\n"; ?>
disable full window drag:i:<?php echo $var['disable_full_window_drag']."\r\n"; ?>
disable menu anims:i:<?php echo $var['disable_menu_anims']."\r\n"; ?>
disable themes:i:<?php echo $var['disable_themes']."\r\n"; ?>
disable cursor setting:i:<?php echo $var['disable_cursor_setting']."\r\n"; ?>
bitmapcachepersistenable:i:<?php echo $var['bitmapcachepersistenable']."\r\n"; ?>
session bpp:i:<?php echo $var['session_bpp']."\r\n"; ?>
screen mode id:i:<?php echo $var['screen_mode_id']."\r\n"; ?>
startfullscreen:i:<?php echo $var['startfullscreen']."\r\n"; ?>
desktopwidth:i:<?php echo $_REQUEST['desktopwidth']."\r\n"; ?>
desktopheight:i:<?php echo $_REQUEST['desktopheight']."\r\n"; ?>
smart sizing:i:<?php echo $var['smart_sizing']."\r\n"; ?>
use multimon:i:<?php echo $var['use_multimon']."\r\n"; ?>
span monitors:i:<?php echo $_REQUEST['span_monitors']."\r\n"; ?>
full address:s:<?php echo $_REQUEST['full_address']."\r\n"; ?>
<?php if($_REQUEST['alternate_full_address']!=''){ echo "alternate full address:s:{$_REQUEST['alternate_full_address']}\r\n"; } ?>
username:s:<?php echo $_REQUEST['username']."\r\n"; ?>
<?php if($_REQUEST['password_51']!=''){ echo "password 51:s:{$_REQUEST['password_51']}\r\n"; } ?>
domain:s:<?php echo $_REQUEST['domain']."\r\n"; ?>
authentication level:i:<?php echo $var['authentication_level']; ?><?php
?>
