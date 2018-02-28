	
	var Share = {
			
	        vkontakte: function (purl) {
	            url = 'https://vk.com/share.php?';
	            url += 'url=' + encodeURIComponent(purl);
	            
	            var trackerName = ga.getAll()[0].get('name');
		    	ga(trackerName + '.send', 'event', { eventCategory: 'share', eventAction: purl, eventLabel: 'vkontakte'});
	            
	            Share.popup(url);
	        },
	        odnoklassniki: function (purl) {
	            url = 'https://connect.ok.ru/offer?';
	            url += 'url=' + encodeURIComponent(purl);
	            var trackerName = ga.getAll()[0].get('name');
	            ga(trackerName + '.send', 'event', { eventCategory: 'share', eventAction: purl, eventLabel: 'odnoklassniki'});
	            Share.popup(url);
	        },
	        facebook: function (purl) {
	            url = 'https://www.facebook.com/dialog/share?app_id=145634995501895&display=popup';
	            url += '&href=' + encodeURIComponent(purl);
	            var trackerName = ga.getAll()[0].get('name');
	            ga(trackerName + '.send', 'event', { eventCategory: 'share', eventAction: purl, eventLabel: 'facebook'});
	            Share.popup(url);
	        },

	        popup: function (url) {
	            window.open(url,'','toolbar=0,status=0,width=626,height=436');
	        }
	    };