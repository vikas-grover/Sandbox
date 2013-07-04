<?php
/*
Plugin Name: tutorlogin
Plugin URI:http://cis.bentley.edu/sandbox/wp-content/plugins
Description: Plugin to show logged in tutors
Author: Vikas Grover
Version: 1.0
Author URI: mail:vikas.grover@yahoo.com
*/
add_action('wp_footer', 'boj_example_footer_message', 100 );
add_action("widgets_init", array('VikasFirstWidget', 'register'));
//add_action("widgets_init", array('VikasFirstWidget', 'accessDB'));
class VikasFirstWidget {
  function control(){
    echo 'I am a control panel';
  }
  function widget($args){
    echo $args['before_widget'];
    echo $args['before_title'] . 'Tutors currently available in sandbox' . $args['after_title'];
	//accessDB();
	//function accessDB(){
  	$dbc = mysqli_connect('localhost', 'sandboxlogin', 'smith234', 'sandboxlogin') or die('Error connecting to MySQL server.');
  //header( "refresh:5;");
  // Display all the countries
  $query = "SELECT StudentID,StudentName,StudentDescription,StudentCourse,SignedInFlag FROM tutorsloggedin Order by StudentName";
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)){
	if($row['SignedInFlag']==1)
	{	
	echo '<table>';
	echo '<col width="175">';
	echo '<col width="175">';
	echo '<tr>';
	echo '<td>';
	echo $row['StudentName'].',<br/>'.$row['StudentCourse'];
	echo '</td>';
	echo '<td>';
	echo '<'.'img src="Tutors.php?id='.$row['StudentID'].'">';
	echo '</td>';
	echo '</tr>';
	echo '</table>';
	echo '<table>';
	echo '<col width="350">';
	echo '<tr>';
	echo '<td>';
	echo $row['StudentDescription'];
	echo '</td>';
	echo '</tr>';
	echo '</table>';
	echo '<br />';
	}
  }
  mysqli_close($dbc);
	//echo 'Tutors logged in';
  //}
    echo $args['after_widget'];
  }
  function register(){
    register_sidebar_widget('VikasFirstWidget', array('VikasFirstWidget', 'widget'));
    register_widget_control('VikasFirstWidget', array('VikasFirstWidget', 'control'));
  }
}
function boj_example_footer_message() {
echo 'This site is built using <a href="http://wordpress.org" title="WordPress publishing platform" > WordPress </a> .';
}
 /* $dbc = mysqli_connect('localhost', 'sandboxlogin', 'smith234', 'sandboxlogin')
    or die('Error connecting to MySQL server.');
  header( "refresh:5;" );
  // Display all the countries
  $query = "SELECT StudentID,StudentName,StudentDescription,StudentCourse,SignedInFlag FROM tutorsloggedin Order by StudentName";
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
	if($row['SignedInFlag']==1)
	{	
	echo '<table>';
	echo '<col width="175">';
	echo '<col width="175">';
	echo '<tr>';
	echo '<td>';
	echo $row['StudentName'].',<br/>'.$row['StudentCourse'];
	echo '</td>';
	echo '<td>';
	echo '<'.'img src="Tutors.php?id='.$row['StudentID'].'">';
	echo '</td>';
	echo '</tr>';
	echo '</table>';
	echo '<table>';
	echo '<col width="350">';
	echo '<tr>';
	echo '<td>';
	echo $row['StudentDescription'];
	echo '</td>';
	echo '</tr>';
	echo '</table>';
	echo '<br />';
	}
  }
  mysqli_close($dbc); */
?>