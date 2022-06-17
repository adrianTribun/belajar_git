<!DOCTYPE html>
<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      var username = "dev";
      var password = "dev123";
      $.ajax({
        type: "GET",
        url: "https://dev-api.tribunjualbeli.com/category/list/1",
        dataType: 'json',
        headers: {
          "Api-Key": "5N6P8R9SAUCVDWFYGZH3K4M5P7"
        },
        beforeSend: function(xhr) {
          xhr.setRequestHeader("Authorization", "Basic " + btoa(username + ":" + password));
        },
        success: function(result) {
          console.log(result)
        }
      });
    });
  </script>
</head>

<body>
  <h2>Test API - Dev Tribun Jual beli</h2>
</body>

</html>