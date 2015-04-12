   (function(){
        var fHS = $(".form-hari, .form-shift"),
            addMore = $(".add-more"),
            element = "<select class='tai'></select>"

        addMore.on("click", function(){
            console.log("jalan euy");

            fHS.append(element);
        });
    })();