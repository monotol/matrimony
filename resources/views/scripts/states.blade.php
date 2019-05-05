<script type="text/javascript">
 $(document).ready(function() {
  if($("#states").length == 0)
  {
      return alert("No matching elements found");
  }
  $("#states").on("error", function(event) {alert(event.result);}).on("change", function(event) {
             // document.getElementById("#states").onchange = function(event) {
               $("#town_of_residence").hide();
               $.get('render/town', {state: $(event.target).val(), '_token': $('input[name=_token]').val()}, 
                   function(data, status) { 
                       document.getElementById("town_of_residence").innerHTML = data;
                       
                       $("town_of_residence").show();
                   
               }
            )
        })
          
        
     })
     
</script>