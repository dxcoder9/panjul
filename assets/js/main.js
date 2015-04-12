(function(){

    var formHari = $(".form-hari"),
    selectEl = "<select><option>1</option></select>";

    $(".add-more").on("click", function(e){
        e.preventDefault();

        formHari.append(selectEl);
    });

})();

