<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <body>



    <script>
    const settings = {
	"async": true,
	"crossDomain": true,
	"url": "https://zyanyatech1-license-plate-recognition-v1.p.rapidapi.com/recognize_url?image_url=https://www.cartoq.com/wp-content/uploads/2021/02/tata-safari-range-rover-featured.jpg",
	"method": "POST",
	"headers": {
		"x-rapidapi-host": "zyanyatech1-license-plate-recognition-v1.p.rapidapi.com",
		"x-rapidapi-key": "3ff132e84emsh864792ab1fe230bp1c267cjsn5ce5deee99c6"
	}
    };

    $.ajax(settings).done(function (response) {
        console.log(response);
    });
    </script>
    </body>
</html>