$(function() {

    $("#inputSelect").on('change', function() {
  
      var selectValue = $(this).val();
      switch (selectValue) {
  
        case "1":
          $("#div1").show();
          $("#div2").hide();
          $("#div3").hide();
          break;
  
        case "2":
          $("#div1").hide();
          $("#div2").show();
          $("#div3").hide();
          break;
  
        case "3":
          $("#div1").hide();
          $("#div2").hide();
          $("#div3").show();
          break;

      }
  
    }).change();
  
  });