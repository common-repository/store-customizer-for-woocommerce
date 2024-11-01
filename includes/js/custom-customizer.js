(function ( api ) {
 const pageUrls = Object.entries( OCWGWdata );
        for ( const [page, pageurl] of pageUrls ) {
            api.section( `ocscfw-panel-woocustomizer-${page}`, function( section ) {
                var previousUrl, clearPreviousUrl, previewUrlValue;
                previewUrlValue = api.previewer.previewUrl;
                clearPreviousUrl = function() {
                    previousUrl = null;
                };
                //console.log(pageUrls);
                section.expanded.bind( function( isExpanded ) {
                    var url;
                    if ( isExpanded ) {
                        url = pageurl;
                        previousUrl = previewUrlValue.get();
                        previewUrlValue.set( url );
                        previewUrlValue.bind( clearPreviousUrl );
                    }
                });
            });
        }
    
} ( wp.customize ) );