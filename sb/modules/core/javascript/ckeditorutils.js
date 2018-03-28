var ckeditorutils = (function () {

	var initTagFormatRules = function()
	{
		// http://docs.cksource.com/CKEditor_3.x/Developers_Guide/Output_Formatting
		var formatOptions = { indent: false, breakBeforeOpen: false, breakAfterOpen: false, breakBeforeClose: false, breakAfterClose: true };
		var tags          = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'li'];

		CKEDITOR.on ( 'instanceReady', function( ev ) {
			for ( var index = 0; index < tags.length; index++ )
				ev.editor.dataProcessor.writer.setRules ( tags[ index ], formatOptions );
		} );


		initInnerTemplateTags();
	};

	var initInnerTemplateTags = function ()
	{
		createCustomTag( 'tpl' );
		createCustomTag( 'tplnot' );

		var htmlElements = [ '$block', '$inline', 'body', 'tpl', 'tplnot' ];
		allowCustomTagInElements( 'tpl', htmlElements );
		allowCustomTagInElements( 'tplnot', htmlElements );

		var allowedElementsInCustomTag = [ '$block', '$inline' ];
		allowElementsInCustomTag( 'tpl', allowedElementsInCustomTag );
		allowElementsInCustomTag( 'tplnot', allowedElementsInCustomTag );

	};

	var createCustomTag = function ( tagName )
	{
		if( ! CKEDITOR.dtd.hasOwnProperty( tagName ) )
		{
			CKEDITOR.dtd[tagName] = {};
		}
	};

	var allowCustomTagInElements = function ( tagName, htmlElements )
	{
		for ( var i=0; i < htmlElements.length; i++ )
		{
			CKEDITOR.dtd[htmlElements[i]][tagName] = 1;
		}

	};

	var allowElementsInCustomTag = function ( tagName, htmlElements )
	{
		for ( var i=0; i < htmlElements.length; i++ )
		{
			if ( CKEDITOR.dtd[htmlElements[i]] != null )
			{
				if ( typeof CKEDITOR.dtd[htmlElements[i]] === 'object' )
				{
					for( var property in CKEDITOR.dtd[htmlElements[i]])
					{
						CKEDITOR.dtd[tagName][property] = 1;
					}
				}
				else
				{
					CKEDITOR.dtd[tagName][htmlElements[i]] = 1;
				}
			}
		}
	};

	var styleAttributeRegex = function( name, valueRegex )
	{
		return new RegExp( "(?:^|\\s|;)" + name + "\\s*:\\s*" + valueRegex + ";?", "i" );
	};

	var numericAttributeRegex = function( name )
	{
		return styleAttributeRegex( name, "(\\d+)(em|ex|ch|rem|vw|vh|vmin|vmax|cm|mm|in|pt|pc|px)" );
	};

	var stringAttributeRegex = function( name )
	{
		return styleAttributeRegex( name, "([\\w\|-]+)" );
	};

	var styleAttributeValue = function( regex, style )
	{
		var match = regex.exec( style );

		return match && match[ 1 ];
	};

	var numericAttributeValue = function( style, name )
	{
		return styleAttributeValue( numericAttributeRegex( name ), style );
	};

	var stringAttributeValue = function( style, name )
	{
		return styleAttributeValue( stringAttributeRegex( name ), style );
	};

	var replaceNumericAttribute = function( element, name, value )
	{
		element.attributes.style = element.attributes.style.replace( numericAttributeRegex( name ), value );
	};

	var replaceStringAttribute = function( element, name, value )
	{
		element.attributes.style = element.attributes.style.replace( stringAttributeRegex( name ), value );
	};

	initTagFormatRules();

	return {

		initialiseEditor : function( id, config, onBlur )
		{
			var editor = CKEDITOR.instances[ id ];
			if ( editor )
			{
				// The destroy() function doesn't seem to be working as of CKEditor version 4.0.2 in Chrome and Firefox
				// So we catch the error and manually remove the CKEditor instance (which doesn't work in IE)
				try
				{
					editor.destroy();
				}
				catch ( e )
				{
					$( 'div.' + editor.id ).remove();
					delete CKEDITOR.instances[ id ];
				}
			}

			CKEDITOR.replace( document.getElementById( id ), config );

			if ( onBlur && onBlur.length > 0 )
				CKEDITOR.instances[ id ].on( 'blur', function ( event ) { eval( onBlur ); } );
		},

		onDialogDefinition : function( event )
		{
			var name       = event.data.name;
			var definition = event.data.definition;

			if ( name == "table" )
			{
				var tab = definition.getContents( 'info' );
				tab.get( 'txtCellPad' )['default']   = 0;
				tab.get( 'txtCellSpace' )['default'] = 0;
				tab.get( 'txtWidth' )['default']     = '100%';
				tab.get( 'txtBorder' )['default']    = 0;
			}
		},

		filterHtml : function( event )
		{
			var editor    = event.editor;
			var processor = editor.dataProcessor;
			var filter    = processor && processor.htmlFilter;

			filter.addRules( {
					elements: {
						$: function( element )
						{
							var style = element.attributes.style;

							// Output dimensions of images as width and height
							if ( element.name == 'img' )
							{
								if ( style )
								{
									var width = numericAttributeValue( style, 'width' );
									if ( width )
									{
										replaceNumericAttribute( element, 'width', '' );
										element.attributes.width = width;
									}

									var height = numericAttributeValue( style, 'height' );
									if ( height )
									{
										replaceNumericAttribute( element, 'height', '' );
										element.attributes.height = height;
									}

									var display = stringAttributeValue( style, 'display' );
									if ( display && display != 'inline-block' )
									{
										replaceStringAttribute( element, 'display', 'display:inline-block;' );
									}
									else if ( !display )
									{
										element.attributes.style = 'display:inline-block;' + element.attributes.style;
									}
								}
								else
								{
									element.attributes.style = 'display:inline-block;';
								}
							}

							if ( !element.attributes.style )
								delete element.attributes.style;

							return element;
						}
					}
				}
			);
		}
	}

})();
