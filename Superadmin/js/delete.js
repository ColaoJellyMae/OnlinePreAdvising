//delete college
$(document).ready(function() {
    $('.deletecollegebtn').on('click', function() {
        $('#deletecollegemodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#deletecollegeid').val(data[0]);
    });
});

//delete course
$(document).ready(function() {
    $('.deletecoursebtn').on('click', function() {
        $('#deletecoursemodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#deletecourseid').val(data[0]);
    });
});

//delete admin
$(document).ready(function() {
    $('.deleteadminbtn').on('click', function() {
        $('#deleteadminmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#deleteadminid').val(data[0]);
    });
});

