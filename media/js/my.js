$(function(){
	$('.buy').bind('click', function(q) {
		q.preventDefault();
		var data1=$(this).attr('data');
		var colvo=$('#colvo-'+data1).val();
		
		$.ajax({
			type:'get',
			url:'ajax/buy',
			data:'id='+data1+'&colvo='+colvo,
			success:function(data) {
				$('#data-'+data1).text('Добавлено: '+colvo+' шт.');
				$('.cart-window').css('display','block').html(data);
			},
			error:function(msg){
				console.log(msg);
			}
		})
	});
	var fx={
		'initModal':function(){
			if($('.modal-window').length==0){
				$('<div>').attr('id','jquery-overlay').click(function(){
					$(modal).fadeOut('slow',function(){ //убираем модальное и задник при клике
						$(this).remove();
					})
					$('#jquery-overlay').fadeOut('slow',function(){
						$(this).remove();
					})
				}).fadeIn().appendTo('body'); 	//добавление задника jquery-overlay перед закрытием body
				return $('<div>').addClass('modal-window').appendTo('body');	//добавление модального перед закрытием body
			} else {
				return $('.modal-window');
			}
		}
	}
	$('.tovar a').bind('click',function(e){
		e.preventDefault();	//удаление стандартных свойств ( в данном случае удаление свойств ссылки)
		var data=$(this).attr('data'); //получение ID товара из ссылки data=id
		modal=fx.initModal();
		$('<a>').attr('href','#').addClass('modal-close').html('&times').click(function(event) {//&times- крестик
			event.preventDefault();
			$(modal).fadeOut('slow',function(){
				$(this).remove();
			})
			$('#jquery-overlay').fadeOut('slow',function(){
				$(this).remove();
			})
		}).appendTo(modal);
		$.ajax({
			type:'get',
			url:'ajax',
			data:'id='+data,
			success:function(data) {
				modal.append(data);
			},
			error:function(msg){
				modal.append(msg);
			}
			
		});
	});
});