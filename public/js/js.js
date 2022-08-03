$(function () {
    /* Changed category review */
    $("#categoryBox").selectbox({
        onChange: () => {
            let id = $('#categoryBox').val();
            console.log(id);

            /* Getting the number of selected category and placing it */
            $.post("index/category", {
                categoryId: id
            }, function (data) {
                let response = JSON.parse(data);
                if (response['status'] === 200) {
                    let categoryNum = response['data'][0]['number'];
                    $('.num').val(categoryNum);
                }
            });
        }
    });
});
$(document).ready(function () {
    /* Creating an event to detect increase or decrease of number */
    $('button').click(function (e) {
        let button_classes, value = +$('.num').val();
        button_classes = $(e.currentTarget).prop('class');
        if (button_classes.indexOf('increase') !== -1) {
            value = (value) + 1;
        } else {
            value = (value) - 1;
        }
        value = value < 0 ? 0 : value;
        $('.num').val(value);
        let id = $('#categoryBox').val();
        /* Update the selected category using post method */
        $.post("index/update_category", {
            categoryId: id, new_number: value
        }, function (data) {
            let response = JSON.parse(data);
            console.log(response)
        });
    });
    /*  Update the selected category using post method when the user manually changes the number */
    $('.num').change(function () {
        $(this).focus().select();
        console.log('ok');
        let value = $('.num').val();
        let id = $('#categoryBox').val();
        $.post("index/update_category", {
            categoryId: id, new_number: value
        }, function (data) {
            let response = JSON.parse(data);
            console.log(response)
        });
    });
});