<html>

<head>
<script src="jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	//llamado por defecto.
	$.ajax({
                type:'POST',
                url:'get_countries.php',
               
                success:function(html){
                    $('#country').html(html);
                   
                }
            }); 
	
	
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
	
	
	 $('#city').on('change',function(){
        var cityID = $(this).val();
        if(cityID){
            $.ajax({
                type:'POST',
                url:'get_companies.php',
                data:'city_id='+cityID,
                success:function(html){
                    $('#companies').html(html);
                }
            }); 
        }else{
            $('#companies').html('<tr><td>no info to show</td></tr>'); 
        }
    });
});
</script>
</head>

<body> 

<select name="country" id="country">

</select>
     
<select name="state" id="state">
    <option value="">Select country first</option>
</select>

<select name="city" id="city">
    <option value="">Select state first</option>
</select>

<table name = "companies" id="companies" border="1">
  
</table>


</body>

</html>