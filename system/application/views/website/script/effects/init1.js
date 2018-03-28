function layer_media_init_func(layerid){
	var $curlayer=$('#'+layerid);
	$('#wp-media-image_'+layerid).mouseover(function (event) {
		var effect=$curlayer.data('wopop_imgeffects');
		var $this=$(this);
		var running=$this.data('run');
		if(effect && running!=1){
			$curlayer.setimgEffects(true,effect,1);
			var effectrole = effect['effectrole'];
			var dset = effect['dset']; 
			if(effectrole !='dantu' && typeof(dset)!="undefined"){
				var temp_effect = {};
				temp_effect['type'] = effect['type'];
				temp_effect['effectrole'] = 'dantu';
				temp_effect['effect'] = effect['dset']['effect'];
				temp_effect['duration'] =  effect['dset']['duration'];
				$curlayer.setimgEffects(true,temp_effect,1);
			}
		}
	});

	var imgover=$('#wp-media-image_'+layerid).closest('.img_over');
	imgover.children('.imgloading').width(imgover.width()).height(imgover.height());
	imgover.css('position','relative');
	$('#'+layerid).layer_ready(function(){
		layer_img_lzld(layerid);
	});
}