<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reverse Location - Google Map</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <!-- The Modal Start-->
    <div class="modal" id="showResponse">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">LOCATION</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body" id="address">
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
  <!-- The Modal End -->


<!-- Main Page Start -->
    <div id="form-main-wrapper">
        <div class="form-container">
            <div class="admin-avtar">
                <h1>REVERSE LOCATION</h1>
            </div>
            <div class="form-wrapper">
                <div class="form-con form">
                    <form>
                        <div class="field-con">
                            <label for="email">LATITUDE: </label>
                            <input type="text" id="lat" name="lat" required />
                        </div>
                        <div class="field-con">
                            <label for="passkey">LONGITUDE: </label>
                            <input type="text" id="long" name="long" required/>
                        </div>

                        <div class="flex form-btn-con">
                            <div class="sub-btn-wrap">
                                <input type="submit" id="submit" class="form-submit" onclick="fetchLocation()" value="SUBMIT" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Main Page Start -->

</body>
<script>
$("#submit").on('click',(e)=>{
    e.preventDefault();
});
    function fetchLocation() {
        var lat = $("#lat").val();
        var long = $("#long").val();
        var key = 'ADD YOUR GOOGLE GEOCODING API KEY';
        var url = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${long}&key=${key}`;

        $.get(url, (data, status) => {
            if(data.status =='OK'){
                $("#address").text(data.formatted_address);
            }else{
                $("#address").text('You bill is due');
            }

            $('#showResponse').modal('toggle');
        });
    }
</script>

</html>