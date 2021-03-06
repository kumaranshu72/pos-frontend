<?php
   require('header.php');
?>

	<div class="content slide">     <!--	Add "slideRight" class to items that move right when viewing Nav Drawer  -->
		<ul class="responsive">
			<!--
			<li class="header-section">
				<p class="placefiller">HEADER</p>
			</li>-->
			<li class="body-section">
				<div class="main-content">
				    <form class="form-basic" method="post" action="#" id="target">

				        <div class="form-title-row">
				            <h1>Create Items</h1>
				        </div>

				        <div class="form-row">
				            <label>
				                <span>Item Name</span>
				                <input type="text" name="name" id="name" required>
				            </label>
				        </div>

				        <div class="form-row">
				            <label>
				                <span>Item Price</span>
				                <input type="text" name="price" required>
				            </label>
				        </div>

				        <div class="form-row">
				            <label>
				                <span>Hash Tags(comma seprated)</span>
				                <input type="text" name="tags" >
				            </label>
				        </div>

				        <div class="form-row">
				            <button type="submit">Create</button>
				        </div>

				    </form>

				</div>
				<script>
				$( "#target" ).submit(createItem);
				function createItem(e){
				  e.preventDefault();
				  var tags = $('input[name=tags]').val().split(",")
				  var obj={
				    name: $('input[name=name]').val(),
				    price: $('input[name=price]').val(),
				    hashtag: tags
				  }
				  $.post("<?php echo CREATE_ITEM; ?>",obj,
				  function(data, status){
				      alert("Data: " + data['Status'] + "\nStatus: " + status);
				  }).fail(function(data, status){
				    alert(data['responseJSON']['Status'] )
				  });
				}
				</script>
			</li>
			<!--
			<li class="footer-section">
				<p class="placefiller">FOOTER</p>
			</li>
		-->
		</ul>
	</div>

	<?php
	   require('footer.php');
	?>
