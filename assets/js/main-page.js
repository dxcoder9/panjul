      (function(){
        var fH = $(".form-hari"),
            fS = $(".form-shift"),
            addMore = $(".add-more"),
            elementH = "Hari<select class='' name='hari[]'><option value=''>- Pilih Hari -</option><option value='1'>Senin</option><option value='2'>Selasa</option><option value='3'>Rabu</option><option value='4'>Kamis</option><option value='5'>Jumat</option><option value='6'>Sabtu</option></select>",
            elementS = "Shift<select class='' name='shift[]'><option value=''>- Pilih Shift -</option><option value='1'>Shift 1</option><option value='2'>Shift 2</option><option value='3'>Shift 3</option><option value='4'>Shift 4</option></select>"

            addMore.on("click", function(){
             fH.append(elementH);
             fS.append(elementS);
            });

    })();
    