$(document).ready(function() { 
    // Get the modal


    $('.modal-close').click(function() {
        $('#modal').css('display', 'none');
    });

    $('.modal-btn').click(function() {
        $('#modal').css('display', 'flex');
        $('#modal .modal-content label').remove();
        let tickets = $(this).data('tickects');
        console.log(tickets);
        for(var code in tickets)
        {
            let ticket = tickets[code];
            ticket.code = code;
            let value = JSON.stringify(ticket);
            let checkbox = `<label>
                <div>
                    <input type="checkbox" name="tickets[]" value='${value}' checked />
                </div>
                <div>
                    ${tickets[code].date} ${tickets[code].label}
                </div>
            </label>`;
            $('.modal-content').prepend(checkbox);
        }
    });
});