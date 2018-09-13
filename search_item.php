<div class="main-content">
    <form class="form-basic" method="post" action="#" id="target">

        <div class="form-title-row">
            <h1>Search Items</h1>
        </div>

        <div class="form-row">
            <label>
                <span>Hash Tag</span>
                <input type="text" name="name" id="name" required>
            </label>
        </div>


        <div class="form-row">
            <button type="submit">Search</button>
        </div>

        <p id='result'>
        </p>
    </form>


</div>
<script>
$( "#target" ).submit(searchItem);
function searchItem(e){
  e.preventDefault();
  $.get("http://localhost:3000/search?key="+ $('input[name=name]').val(),
  function(data, status){
      var result="<h4>Result :</h4></br><ul>";
      data['Status'].forEach(element => {
         result += "<li> Item Id : "+element['id']+"</li><li> Item Name : "+element['name']+"</li><li>Item Price : "+element['price']+"</li></br></br>"
      });
      result+="</ul>"
      $("#result").html(
        result
      );
  }).fail(function(data, status){
    alert(data['responseJSON']['Status'] )
  });
}
</script>