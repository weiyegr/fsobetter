$(function()
{

// remove target _blank off any link and replace with class="external".
        $('a[target^=_blank]')
                .addClass('external')
                .removeAttr('target', '_blank');

		// remove rel external off any link and replace with  class="external".
		$('a[rel^=external]')
                .addClass('external')
                .removeAttr('rel', 'external');
                

        // any links with rel="external" open in a new window
        $('a[class*="external"]').click(function()
        {
                $('a[class*="external"]').attr('target', '_blank');

                                        // also track outbound links and send info to google analytics.
                        var linkHTML = $(this).html();
                        pageTracker._trackEvent('Link', 'Outgoing',  '' + $(this).attr('href') + '');
                        });
});                        