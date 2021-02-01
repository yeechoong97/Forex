//sort the table accordingly
function sortTable(element) {
    var list = ["created_at", "units", "pair", "type", "profit", "cost"];

    for (var item in list) {
        if (list[item] == element) {
            if (document.getElementById("span-" + list[item]).classList.contains('fa-caret-up')) {
                document.getElementById("span-" + list[item]).classList.remove('fa-caret-up');
                document.getElementById("span-" + list[item]).classList.add('fa-caret-down');
                document.getElementById("hidden_order").value = "desc";
            } else {
                document.getElementById("span-" + list[item]).classList.remove('fa-caret-down');
                document.getElementById("span-" + list[item]).classList.add('fa-caret-up');
                document.getElementById("hidden_order").value = "asc";
            }
            document.getElementById("hidden_sort").value = element;
        } else {
            if (document.getElementById("span-" + list[item]).classList.contains('fa-caret-up')) {
                document.getElementById("span-" + list[item]).classList.remove('fa-caret-up');
                document.getElementById("span-" + list[item]).classList.add('fa-caret-down');
            }
        }
    }
    filterDate();
}

//Save the previous value of both date for input validation purpose;
function savePrevious() {
    var start = document.getElementById("start-date").value;
    var end = document.getElementById("end-date").value;
    document.getElementById('hidden_prev_start').value = start;
    document.getElementById('hidden_prev_end').value = end;

}

//Prevent the page from refreshing when paginate
$(document).on('click', '.pagination a', function(event) {
    event.preventDefault();
    page = $(this).attr('href').split('page=')[1];
    $('#hidden_page').val(page);

    $('li').removeClass('active');
    $(this).parent().addClass('active');
    filterDate();
});

function filterDate() {
    var token = $('meta[name="csrf-token"]').attr('content');
    var start = document.getElementById('start-date').value;
    var end = document.getElementById('end-date').value;
    var sort = document.getElementById('hidden_sort').value;
    var order = document.getElementById('hidden_order').value;
    var page = document.getElementById('hidden_page').value;
    var previous_start_date = document.getElementById('hidden_prev_start').value;
    var previous_end_date = document.getElementById('hidden_prev_end').value;

    switch (sort) {
        case "pair":
            sort = "orders." + sort;
            break;
        case "type":
            sort = "orders." + sort;
            break;
        default:
            sort = "trades." + sort;
            break;
    }

    if (start > end) {
        alert("Please select a valid range of date");
        document.getElementById('start-date').value = temp_start;
        document.getElementById('end-date').value = temp_end;
    } else {
        if (previous_start_date != start || previous_end_date != end) {
            page = 1;
            document.getElementById('hidden_prev_start').value = start;
            document.getElementById('hidden_prev_end').value = end;
            document.getElementById('hidden_page').value = page;
        }

        $.ajax({
            type: 'GET',
            url: '/order/fetch',
            data: {
                _token: token,
                start: start,
                end: end,
                sort: sort,
                order: order,
                page: page,
            },
            success: function(data) {
                $('tbody').html('');
                $('tbody').html(data);
            },
            error: function(data) {
                console.log(JSON.stringify(data));
            }
        });
    }
}

function displayMessage() {
    document.getElementById('alert-box').innerHTML = "No result was found";
}

function toggleOrderLightbox() {

    var check = document.getElementById('order-history-lightbox').style.display;
    if (check == "" || check == "none") {
        // document.getElementById('order-history-lightbox').style.display = "block";
        $('#order-history-lightbox').fadeIn(300);
    } else {
        //document.getElementById('order-history-lightbox').style.display = "none";
        $('#order-history-lightbox').fadeOut(300);
    }
}


window.onclick = function(event) {
    var lightbox = document.getElementById('order-history-lightbox');
    if (event.target == lightbox) {
        //lightbox.style.display = "none";
        $('#order-history-lightbox').fadeOut(300);
    }
}