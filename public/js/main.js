$(document).ready(function () {
    $('#hall_id').change(function (e) {
        e.preventDefault();
        $('#section_id').empty().append('<option value="">انتخاب بخش</option>');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/admin/add/seat/ajax',
            data: {
                hall_id: $('#hall_id').val()
            },
            dataType: 'json',
            success: function (data) {
                $.each(data, function(i, item) {
                    $('#section_id').append('<option value="' + item.id + '">' + item.name + '</option>');
                });
            }
        });
    });

    $('.seatActive').click(function (e) {
        e.preventDefault();
        $(this).toggleClass('seatSelect');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
           type: 'POST',
           url: '/admin/seat/selected',
           data: {
               seat_id: $(this).attr('id')
           },
            dataType: 'json',
            success: function (data) {
                console.log(data);
            }
        });

    })

    
});