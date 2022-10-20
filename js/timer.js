(function () {
    const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

    //I'm adding this section so I don't have to keep updating this pen every year :-)
    //remove this if you don't need it
    let today = new Date(),
        dd = String(today.getDate()).padStart(2, "0"),
        mm = String(today.getMonth() + 1).padStart(2, "0"),
        yyyy = today.getFullYear(),
        nextYear = yyyy,
        dayMonth = "10/27/",
        birthday = dayMonth + yyyy;

    today = mm + "/" + dd + "/" + yyyy;
    if (today > birthday) {
        birthday = dayMonth + nextYear;
    }
    //end

    const countDown = new Date(new Date(birthday).setHours(12, 0, 0, 0)).getTime(),
        x = setInterval(function() {

            const now = new Date().getTime(),
                distance = countDown - now;

            document.getElementById("days").innerText = Math.floor(distance / (day)),
                document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

            //do something later when date is reached
            if (distance < 0) {
                document.getElementById("headline").innerText = "Join us for the event";
                document.getElementById("countdown").style.display = "none";
                document.getElementById("content").style.display = "block";

                document.getElementById('launchTimerScreen').innerHTML = "<div style=\"height: 90vh; width: 100%;\">\n" +
<<<<<<< HEAD
<<<<<<< HEAD
                    "<iframe width='100%' height='100%' src='https://www.youtube.com/embed/mDdcZOydobw' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>" +
=======
=======
>>>>>>> e4de6ae (stylling changesin admin)
                    "<iframe\n" +
                    "width=\"100%\"\n" +
                    "height=\"100%\"\n" +
                    "src=\"https://www.youtube.com/embed/-PTrfxZ_E6A\"\n" +
                    "title=\"HiLoad Launch | Euler Motors\" frameborder=\"0\"\n" +
                    "allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\"\n" +
                    "allowfullscreen\n" +
                    "></iframe>\n" +
<<<<<<< HEAD
>>>>>>> e4de6ae (stylling changesin admin)
=======
>>>>>>> e4de6ae (stylling changesin admin)
                    "</div>"

                clearInterval(x);
            }
            //seconds
        }, 0)
}());
