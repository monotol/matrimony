<script type="text/javascript">
     $(document).ready(function() {
        $("#country_of_residence").on("change", function(event) {
            $("#state_of_residence").hide();
            $("#town_of_residence").hide();
            $.get('render', {country: $(event.target).val(), '_token': $('input[name=_token]').val()}, 
                function(data, status){ 
                    //$("#country_of_residence").append(data);
                    document.getElementById("states").innerHTML = data;
                    $("#state_label").show();
                    $("#states").show();
                    $("#state_of_residence").show();
                } 
                );
        
        });
     })     
       
 </script>


<script type="text/javascript">
     $(document).ready(function() {
        
        $("#states").on("change", function(event) {
            //$("#state_of_residence").hide();
            $("#town_of_residence").hide();
            $.get('render/town', {state: $(event.target).val(), '_token': $('input[name=_token]').val()}, 
                function(data, status){ 
                    //$("#country_of_residence").append(data);
                    document.getElementById("town_of_residence").innerHTML = data;
                    $("#town_of_residence").show();
                } 
                );
        
        });
     })     
       
 </script>
        
  