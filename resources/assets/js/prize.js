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
    $(document).on('click', '.prize-apply', function (e) {
        $.ajax({
            url: '/api/subjectApply',
            beforeSend: function () {
                $(this).addClass('disabled');
            },
            data: {id: $('#subject').data('prize-id')},
            success: function (data) {
                prizeInfo.html('Принят приз');
                prizeActionBar.hide();
            }
        });
    });

    $(document).on('click', '.prize-reject', function (e) {
        prizeInfo.addClass('hidden');
        prizeActionBar.html('');
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
                    prizeActionBar.html('<button class="btn btn-success transfer-bonus">Перечислить на счет лояльности</button>' +
                        ' <button class="btn btn-success convert-bonus-to-money">Конвертировать в деньги</button>')
                }
                else if (data.type=='App\\Models\\MoneyPrize'){
                    if (data.prize.value!==0)
                    {
                        prizeInfo.html(`Ваш выигрыш <span id="money">${data.prize.value}</span> долларов`);
                        prizeActionBar.html('<button class="btn btn-success transfer-money">Перечислить на счет в банке</button>')
                    }
                    else{
                        prizeInfo.html('Денежный выигрыш, но денег недостаточно в банке');
                        prizeActionBar.html('')
                    }
                }
                else{
                    prizeInfo.html(`Ваш выигрыш <span id="subject" data-prize-id="${data.prize.id}">${data.prize.name}</span>`);
                    prizeActionBar.html('<button type="button" class="btn btn-success prize-apply">Принять</button>')
                }
                prizeActionBar.append(' <button type="button" class="btn btn-warning prize-reject">Отказаться</button>')
                prizeActionBar.show();
                prizeInfo.removeClass('hidden');
            }
        });
    });
});