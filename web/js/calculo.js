$(document).ready(function(){
  //alert("cargo");
  $('input[name*="his_valor"]').change(function () {
    var sum = 0;
    //alert(sum);
    $('input[name*="his_valor"]').each(function() {
        sum += Number($(this).val());
    });
    //alert(sum);
    $('#resumen_res_valor').val(sum);
    // here, you have your sum
  });
});