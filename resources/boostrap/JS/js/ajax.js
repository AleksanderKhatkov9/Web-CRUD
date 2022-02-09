$(function () {

    // alert("hello");

    $.ajax({
        url: 'https://www.nbrb.by/api/exrates/currencies/298',         //RUB
        method: 'get',
        dataType: 'json',
        data: {text: 'Текст'},

        success: function (data) {
            console.log(data);
            var json = JSON.stringify(data);
            var result = json;
            console.log("AJAX " + result);
            var parsjson = JSON.parse(result);

            // console.log("PARS " + parsjson["Cur_DateStart"]);
            // console.log("PARS " + parsjson["Cur_DateEnd"]);
            // var x = parsjson["Cur_ID"];
            // var y = parsjson["Cur_ParentID"];

            }
        });

});