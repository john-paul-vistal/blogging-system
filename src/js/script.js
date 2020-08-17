$(document).ready(function() {
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });

    $('#logout').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be logged out to your accout!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Logout'
        }).then((result) => {
            if (result.value == true) {
                window.location = "logout.php";
            }
        })
    });

    // function openTab(id) {
    //     var i;
    //     var x = document.getElementsByClassName("tabs");
    //     for (i = 0; i < x.length; i++) {
    //         x[i].style.display = "none";
    //     }
    //     document.getElementById(id).style.display = "block";
    // }

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imagePicker").on('change', function() {
        readURL(this);
    });

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#featuredPhoto').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#blog_image").on('change', function() {
        readURL(this);
    });


    $('#searchInput').on('keyup', function() {
        alert("hello")
        var filter, card, author, td0, td1, i, txtValue0, txtValue1, ;
        filter = $("#searchInput:text").val().toUpperCase();
        // table = document.getElementById("blogRecords");
        // tr = table.getElementsByTagName("tr");
        card = $('#blogRecords');
        console.log(card);
        author =

            for (i = 0; i < tr.length; i++) {
                td0 = tr[i].getElementsByClass("td")[0];
                td1 = tr[i].getElementsByTagName("td")[1];

                if (td0 || td1) {
                    txtValue0 = td0.textContent || td0.innerText;
                    txtValue1 = td1.textContent || td1.innerText;
                    if (txtValue0.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else if (txtValue1.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
    });



}); //end code