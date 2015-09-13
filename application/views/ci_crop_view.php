<html>
<head><title>CodeIgniter Image Upload</title>
<head>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/imgareaselect-default.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.imgareaselect.pack.js"></script>

</head>



<body>
<script type="text/javascript">
function preview(img, selection) {
if (!selection.width || !selection.height)
return;

var scaleX = 100 / selection.width;
var scaleY = 100 / selection.height;

$('#preview img').css({
width: Math.round(scaleX * 300),
height: Math.round(scaleY * 300),
marginLeft: -Math.round(scaleX * selection.x1),
marginTop: -Math.round(scaleY * selection.y1)
});

$('#x1').val(selection.x1);
$('#y1').val(selection.y1);
$('#x2').val(selection.x2);
$('#y2').val(selection.y2);
$('#w').val(selection.width);
$('#h').val(selection.height); 
}

$(function () {
$('#photo').imgAreaSelect({ aspectRatio: '4:3', handles: true,x1: 69, y1: 80, x2: 229, y2:200,
fadeSpeed: 200, onSelectChange: preview });
});
</script>

<script>
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (e) {
$('#photo')
.attr('src', e.target.result)
.width(300)
.height(300);
};
reader.readAsDataURL(input.files[0]);
}
}


</script>






<?php
if(!isset($crop_image)){?>
<div id="img_area" >
<form method="post" enctype="multipart/form-data" action='<?php echo base_url(); ?>index.php/img_con/update_crop_image'>
<img src="<?php echo base_url();?>images/default.png" id="photo" width="300px" height="300px" />
</div>
<div id="img_info">

<a href="#" onclick="document.getElementById('fileID').click(); return false;" /><img src="<?php echo base_url();?>images/browse.png"/></a>


<input type="file" name="userfile" id="fileID" style="visibility: hidden;" onchange="readURL(this);" />

<table style="margin-top: 1em;">
<thead>
<tr>
<th colspan="2" >
Coordinates
</th>
<th colspan="2">
Dimensions
</th>
</tr>
</thead>
<tbody>
<tr>
<td style="width: 10%;"><b>X<sub>1</sub>:</b></td>
<td style="width: 30%;"><input type="text" class="coordinate" name="X1" id="x1" value="69" /></td>
<td style="width: 20%;"><b>Width:</b></td>
<td><input type="text" name="W" class="coordinate" value="160" id="w" /></td>
</tr>
<tr>
<td><b>Y<sub>1</sub>:</b></td>
<td><input type="text" name="Y1" id="y1" class="coordinate" value="80" /></td>
<td><b>Height:</b></td>
<td><input type="text" name="H" id="h" value="120" class="coordinate"/></td>
</tr>
<tr>
<td><b>X<sub>2</sub>:</b></td>
<td><input type="text" name="X2" id="x2" value="230" class="coordinate" /></td>
<td></td>
<td></td>
</tr>
<tr>
<td><b>Y<sub>2</sub>:</b></td>
<td><input type="text" name="Y2" id="y2" value="200" class="coordinate" /></td>
<td></td>
<td></td>
</tr>
</tbody>
</table>
<div id="save_img">
<input type="submit" class="fg-button blue" name = "submit" value="Upload Crop Image" >
</div>

</form>
<?php }else{ ?>

<div id="crop_img"><img src="<?php echo $crop_image;?>"/>

</div>
<div id="crop_back"><a href="<?php echo base_url()?>index.php/img_con/ci_crop_image" class="fg-button blue">Crop Another</a></div>

<?php }
?>
</body>
</html>