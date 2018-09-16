$(function() {
    var prizeInfo = $('.prize-info');
    var prizeActionBar = $('.prize-action-bar');

    $(document).on('click', '.transfer-money', function (e) {
        $.ajax({
            url: '/api/transferToBankAccount',
            beforeSend: function () {
                $(this).addClass('disabled');
            },
            data: {value: $('#money').text()},
            success: function (data) {
                prizeInfo.html('Деньги перечислены на счет в банке');
            }
        });
    });
    $(document).on('click', '.transfer-bonus', function (e) {
        $.ajax({
            url: '/api/transferBonus',
            beforeSend: function () {
                $(this).addClass('disabled');
            },
            data: {value: $('#bonus').text()},
            success: function (data) {
                prizeInfo.html('Деньги перечислены на счет лояльности');
                window.location.reload();
            }
        });
    });
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
                    prizeInfo.html(`Ваш выигрыш  <span id="bonus">${data.prize.value}</span> бонусов`);
                    prizeActionBar.html('<p><button class="btn btn-primary transfer-bonus">Перечислить на счет лояльности</button>' +
                        ' <button class="btn btn-primary convert-bonus-to-money">Конвертировать в деньги</button></p>')
                }
                else if (data.type=='App\\Models\\MoneyPrize'){
                    prizeInfo.html(`Ваш выигрыш <span id="money">${data.prize.value}</span> долларов`);
                    prizeActionBar.html('<button class="btn btn-primary transfer-money">Перечислить на счет в банке</button>')
                }
                else{
                    prizeInfo.html(`Ваш выигрыш ${data.prize.name}`);
                    prizeActionBar.html('<button type="button" class="btn btn-success subject-apply ">Принять</button>' +
                        ' <button type="button" class="btn btn-warning subject-reject">Отказаться</button>')
                }
                prizeInfo.removeClass('hidden');
            }
        });
    });
});