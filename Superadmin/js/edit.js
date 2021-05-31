$(document).ready(function() {
    $('.editbtn').on('click', function(x) {

        $('#popup-edit-department').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#collegeid').val(data[0]);
        $('#collegecode').val(data[1]);
        $('#collegename').val(data[2]);
        $('#collegeseal').val(data[3]);

    });
});

$(document).ready(function() {
    $('.editcoursebtn').on('click', function(x) {

        $('#editcoursemodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#courseid').val(data[0]);
        $('#coursecode').val(data[1]);
        $('#coursename').val(data[2]);
         $('#college').val(data[3]);

    });
});
//edit admin
$(document).ready(function() {
    $('.editadminbtn').on('click', function(x) {

        $('#editadminmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();

        console.log(data);
        
        $('#adminid').val(data[0]);
        $('#fname').val(data[1]);
        $('#lname').val(data[2]);
        $('#emailadd').val(data[3]);
        $('#Password').val(data[4]);
        $('#contact').val(data[5]);
        $('#select-college').val(data[5]);
        

    });
});