<div class="main-content">
    <form class="form-basic" method="post" action="#" id="target">

        <div class="form-title-row">
            <h1>Create Bills</h1>
        </div>

        <div id="formdata">
        </div>

        <div class="form-row">
            <button id="add_more" type="button">Add Items</button>
        </div>

        <div class="form-row">
            <button type="submit">Create Bill</button>
        </div>

        <p id='result'>
        </p>
    </form>


</div>
<script>
var count = 0
var dropdownItems = ""
$( document ).ready(function() {
  $.get("http://localhost:3000/items",
  function(data, status){
    data['Status'].forEach(element => {
      dropdownItems+="<option value="+element['id']+">"+element['name']+"</option>"
    })
    //$("#item").html(dropdownItems);
  })
});

var form_data="";

$("#add_more").click(function(){
    count++;
    form_data += "<div class=\"form-row\">"+
            "<label>"+
              "<span>Choose Item</span>"+
                "<select name=\"dropdown"+count+"\" id=\"item"+count+"\">"+
                dropdownItems+
                "</select>"+
            "</label>"+
    "</div>"+

    "<div class=\"form-row\">"+
        "<label>"+
            "<span>Quantity</span>"+
            "<input type=\"number\" name=\"qty"+count+"\"  >"+
        "</label>"+
    "</div>"

    $("#formdata").html(form_data)
})

$( "#target" ).submit(createBill);
function createBill(e){
  e.preventDefault();
  var items_arr = new Array()
  for(i=1;i<=count;i++)
  {
    var obj={
      "item_id": parseInt($('#item'+i+'').val()),
      "qty": parseInt($('input[name=qty'+i+']').val()),
    }
    items_arr.push(obj)
  }
  var obj1 = new Object();
  obj1["items"] = items_arr
  console.log('object1------', JSON.stringify(obj1));
  $.post("http://localhost:3000/bills/add",obj1,
  function(data, status){
      alert("Data: " + data['Message'] + "\nStatus: " + status);
  }).fail(function(data, status){
    alert(data['responseJSON']['Message'])
  });
}
</script>
