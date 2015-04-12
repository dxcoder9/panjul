<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('nyobo/upload');?>

<input type="file" name="foto" size="20" />

<br /><br /><input type="text"> 

<input type="submit" value="upload" />

</form>
<?php echo base_url();?>
</body>
</html>