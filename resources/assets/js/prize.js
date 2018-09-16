$(function() {
    $( ".get-prize" ).click(function(e) {
        e.preventDefault()
        $.ajax({
            url: '/api/prize',
            beforeSend: function () {
                $(this).addClass('disabled');
            },
            success: function (data) {
                if (data.type=='App\\Models\\BonusPrize')
                {
                    $('.prize-info').html('Ваш выигрыш ' + data.prize.value + ' бонусов');
                }
                else if (data.type=='App\\Models\\MoneyPrize'){
                    $('.prize-info').html('Ваш выигрыш ' + data.prize.value + ' долларов');
                }
                else{
                    $('.prize-info').html('Ваш выигрыш '+ data.prize.name);
                }
            }
        });
    });
});