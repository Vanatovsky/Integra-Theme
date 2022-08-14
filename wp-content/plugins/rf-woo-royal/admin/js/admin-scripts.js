jQuery(function($) {
    
    //Отправка формы открепления категории
    $(document).on('submit', '.rf_form_unpin_category', function (e) {
		const form = $('.rf_form_unpin_category');
        
        const formData = form.serialize();

		$.ajax({
			type: 'POST',
			url: ajaxurl,
			data: formData,
			beforeSend: function () {
				form.addClass('is-sending');
			},
			error: function (request, txtstatus, errorThrown) {
				console.log(request);
				console.log(txtstatus);
				console.log(errorThrown);
                Swal.fire({
                    title: 'Ошибка на сервере',
                    text: 'Разработчикам: можете взглянуть на ошибки в консоли браузера',
                    icon: 'error',
                    confirmButtonText: 'Ну ок'
                  });
			},
			success: function (data) {
				form.removeClass('is-sending').addClass('is-sending-complete');
                const j_data = $.parseJSON(data);
                if(j_data.count_goods > 0){
                    Swal.fire({
                        title: 'Товары нашли',
                        text: j_data.message,
                        icon: 'info',
                        confirmButtonText: 'Да, давай',
                        cancelButtonText: 'Нет, не нужно',
                        showCancelButton: true,
                      }).then((result) => {
                        if (result.isConfirmed) {
                            
                            //сформируем дату которую передадим
                            let request_data = {
                                ids_products: j_data.ids,
                                action: 'rf_product_cat_unpin_action',
                                remove_category: j_data.cat_slug_for_remove
                            };
                            form.addClass('is-sending');
                            $.post(
                                ajaxurl,
                                request_data,
                                function (res) {
                                    form.removeClass('is-sending');
                                    Swal.fire({
                                        title: 'Готово!',
                                        text: res.message,
                                        icon: 'success',
                                        confirmButtonText: 'Ну ок',
                                      });
                                }
                            );
                        } 
                      });
                } else {
                    Swal.fire({
                        title: 'Товаров не найдено',
                        text: 'По заданным пераметрам товаров не найдено',
                        icon: 'error',
                        confirmButtonText: 'Ну ок',
                      });
                }
               
			}
		});

		e.preventDefault();

	});


    $(document).on('submit', '.rf_diller_edit_tax', function (e) {
        const form = $(this);
        const formData = form.serialize();
        console.log(formData);
        $.ajax({
			type: 'POST',
			url: ajaxurl,
			data: formData,
			beforeSend: function () {
				form.addClass('is-sending');
			},
			error: function (request, txtstatus, errorThrown) {
				console.log(request);
				console.log(txtstatus);
				console.log(errorThrown);
                Swal.fire({
                    title: 'Ошибка на сервере',
                    text: 'Разработчикам: можете взглянуть на ошибки в консоли браузера',
                    icon: 'error',
                    confirmButtonText: 'Ну ок'
                  });
			},
			success: function (data) {
				form.removeClass('is-sending');
                const j_data = $.parseJSON(data);
                console.log(j_data);
                Swal.fire({
                    title: 'Готово',
                    text: j_data.message,
                    icon: 'success',
                    confirmButtonText: 'Ну ок'
                  });
			}
		});

		e.preventDefault();


    });
    

    
});