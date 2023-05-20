<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

	<aside class="col-xs-4">

	<?php Navigation();?>
			
	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

<?php  

/* 	Step1: Make an if Statement with elseif and else to finally display string saying, I love PHP
	Step 2: Make a forloop  that displays 10 numbers
	Step 3 : Make a switch Statement that test againts one condition with 5 cases
*/

echo "holas";

//1
$staring_number = 0;
$ending_number = 10;
for ($i=$staring_number; $i < $ending_number; $i++) { 
	echo $i; 
}

	
?>






</article><!--MAIN CONTENT-->
	
<?php include "includes/footer.php"; ?>