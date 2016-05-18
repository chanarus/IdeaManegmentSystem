var timer;

function up(token) {
    timer = setTimeout(function () {
        var keywords = $('#search-input').val();
        if (keywords.length > 0) {

            var sendData = JSON.stringify({
                keywords: keywords,
                _token: token
            });

            $.ajax({
                url: "search/executeSearch",
                dataType: "json",
                contentType: "application/json; charset=utf-8",
                type: "POST",
                data: sendData,
                success: function (result) {

                    console.log(result);

                    var tempHtml= "Result Count " + result.length + "<br><br><table class='table table-hover'>" +
                        "<tr> <th width='400px'>"+"Idea Title"+"</th>"+
                        "<th width='800px'>"+"Idea Category"+"</th>"+
                        "<th width='600px'>"+"Idea"+"</th>";

                    for(i = 0; i< result.length; i++){
                        tempHtml += "<tr href='#'><td>" + result[i].title + "</td>";
                        tempHtml += "<td>" + result[i].category + "</td>";
                        tempHtml += "<td>" + result[i].body + "</td></tr>";
                    }


                    $("#search-result").html(tempHtml+ "</table>");



                }, error: function (request, status, error) {
                    alert(request.responseJSON.Message);


                }
            });

        }
    }, 500);
}

function down() {
    clearTimeout(timer);
}