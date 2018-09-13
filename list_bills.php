<div class="main-content">
    <form class="form-basic" method="post" action="#" id="target">

        <div class="form-title-row">
            <h1>Bills Id</h1>
        </div>

        <div id="form_data">
        </div>

        <div class="form-row">
            <button type="submit">View Bill</button>
        </div>
        <p id='result' style="text-align:left;">
        </p>
    </form>


</div>
<script>


$( document ).ready(function() {
  $.get("<?php echo LIST_BILLS; ?>",
  function(data, status){
    var dropdownItems = "";
    data['Status'].forEach(element => {
        dropdownItems+="<option value="+element['id']+">"+element['id']+"</option>"
    })
    var form = "<div class=\"form-row\">"+
            "<label>"+
              "<span>Choose Item</span>"+
                "<select name=\"dropdown\" id=\"bill_id\">"+
                dropdownItems +
                "</select>"+
            "</label>"+
    "</div>"

    $("#form_data").html(form)
  })
});


$( "#target" ).submit(viewBill);
function viewBill(e){
  e.preventDefault();
  $.get("<?php echo SHOW_BILL; ?>"+ $('#bill_id').val(),
  function(data, status){
      var result = "<h4>Bill :</h4></br><ul>";
      result+= "<li>Base Amount : Rs. "+data['bill']['bill_amount']+"</li>"
      result+= "<li>Service Charge : Rs. "+data['bill']['service_charge']+"</li>"
      result+= "<li>Grand Total : Rs. "+data['bill']['grand_total']+"</li>"
      result+= "<li>Created at : "+data['bill']['create_at']+"</li>"
      result+="</ul>"
      result+="====================================================</br>"
      result+="Item Details </br>"
      result+="==================================================== </br>"
      result+="<ul>"
      data['bill']['items'].forEach(element => {
         result+="<li>"+element['qty']+" X "+element['item_name']+"  Rs."+element['qty']*element['unit_price']+"</li>"
      });
      $("#result").html(result)
  }).fail(function(data, status){
    alert(data['responseJSON']['Status'] )
  });
}
</script>
