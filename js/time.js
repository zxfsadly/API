setInterval(function() {
         var dd = new Date();
         var h = dd.getHours();
         var mi = dd.getMinutes();
         if(mi<10)
            mi = "0" + mi;
         var str = h + ":" + mi;
         var hello;
         if (h > 0 && h < 12)
             hello = "Good morning,Guy";
         else if (h < 18)
             hello = "Good Afternoon,Guy";
         else
             hello = "Good Evening,Guy";
         document.getElementById("sp_time").innerHTML = str;
         document.getElementById("sp_hello").innerHTML = hello;
     }, 1000); 