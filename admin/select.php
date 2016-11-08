<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<form>
  <!-- <input type="checkbox" id="pizza" name="pizza" value="yes"> -->
  <select name="test" id="test">
  <option value="0" selected="selected">-</option>
  <option value="1">NO</option>
  <option value="2">YES</option>
  </select>
  <label for="pizza">I would like to order a</label>
  <select id="pizza_kind" name="pizza_kind">
    <option value="margaritha">Margaritha</option>
    <option value="hawai">Hawai</option>
  </select>
  pizza.
</form>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
$('#test').on('change', function(){
if($(this).val()==='1'){
    $('#pizza_kind').attr('disabled', false);
}else{
    $('#pizza_kind').attr('disabled', 'disabled');
}
});
</script>
</html>

