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
                <input type="text" name="tags" required>
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
  $.post("http://localhost:3000/items/add",obj,
  function(data, status){
      alert("Data: " + data + "\nStatus: " + status);
  }).fail(function(data, status){
    alert(data['responseJSON']['Status'] )
  });
}
</script>
