	function get_http_object()
	{
		var xmlhttp;

		/*@cc_on
		@if (@_jscript_version >= 5)
		try
		{
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
			try
			{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (E)
			{
				xmlhttp = false;
			}
		}
		@else
			xmlhttp = false;
		@end @*/
				
		if (!xmlhttp && typeof XMLHttpRequest != 'undefined')
		{
			try
			{
				xmlhttp = new XMLHttpRequest();
			}
			catch (e)
			{
				xmlhttp = false;
			}
		}
							
		return xmlhttp;
	}

	var ajax_last_select_value = '';
	var ajax_open_name = '';
	var ajax_my_status = 0;
	var ajax_key_code = 0;

	if (document.layers) document.captureEvents(Event.KEYDOWN);
	document.onkeydown = function (evt)
	{
		ajax_key_code = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
	}
	
	function ajax()
	{
		// Set a class wide variable for the http object
		this.my_name = 'Steve';
	}

	/**
 	* Refreshes the data inside the html element identified by id with data from the server
 	*
 	* @param string $url The url that will return the data
 	* @param int $id The id of the html element
 	* @access public
 	* @return void
	*/	
	function _ajax_submit_form(url, id)
	{
		var random = Math.random() * 5;
		url = encodeURI(url + '&random=' + random);

		http = get_http_object();
		
		if (document.getElementById(id))
		{
			http.open("POST", url, true);
	
			http.onreadystatechange = function()
			{
				if (http.readyState == 4)
				{
					// Get the data from the server
					//alert(http.responseText);
					document.getElementById(id).innerHTML = http.responseText;
				}
			}
					
			http.send(null);
		}
	}
		
	/**
 	* Passes a url to the server and sends the response to the function identified by call_back_function. 
 	* call_back_function can be a user defined function or a method within this class.
 	*
 	* @param string $url The url that will be sent to the server
 	* @param string $call_back_function The name of the function that will be called when a response ir received from the server
 	* @param string $params The arguments that will be passed to the function identified by $call_back_function
 	* @access public
 	* @return void
	*/	
	function _ajax_pass_response_to_function(url, call_back_function, params)
	{
		var random = Math.random() * 5;
		url = encodeURI(url + '&random=' + random);

		http = get_http_object();
		
		http.open("GET", url, true);
	
		http.onreadystatechange = function()
		{
			if (http.readyState == 4)
			{
				// Get the data from the server
				var function_to_call = call_back_function + '(http.responseText,' + params + ')';
				eval(function_to_call);
			}
		}
					
		http.send(null);
	}

	/**
 	* Passes a url to the server without expecting and processing a result
 	* Uses include updating x & y coordinates on a page
 	*
 	* @param string $url The url that will be sent to the server
 	* @access public
 	* @return void
	*/	
	function _ajax_send_url(url, call_back_function, params, debug)
	{
		var random = Math.random() * 5;
		url = encodeURI(url + '&random=' + random);
		//alert(url);
		http = get_http_object();
		
		http.open("GET", url, true);
	
		http.onreadystatechange = function()
		{
			if (http.readyState == 4)
			{
				// Do nothing
				if (debug == 1)
				{
					alert(http.responseText);	
				}		

				if(String(call_back_function) != 'undefined')
				{
					var function_to_call = call_back_function + '(http.responseText, ' + params + ')';
					eval(function_to_call);
				}
			}
		}
					
		http.send(null);
	}
	
	function _ajax_send_post_request(url, call_back_function, params, debug)
	{
		var random = Math.random() * 5;		
		http = get_http_object();
		
		http.onreadystatechange = function()
		{
			if (http.readyState == 4)
			{
				// Do nothing
				if (debug == 1)
				{
					alert(http.responseText);	
				}		

				if(String(call_back_function) != 'undefined')
				{
					var function_to_call = call_back_function + '(http.responseText, "' + params + '")';
					eval(function_to_call);
				}
			}
		}
		
		
		http.open('POST', url, true);
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		http.setRequestHeader("Content-length", params.length);
		http.setRequestHeader("Connection", "close");
		http.send(params);

	}

	/**
 	* Refreshes the data inside the html element identified by id
 	*
 	* @param string $url The url that will return the data
 	* @param int $id The id of the html element
 	* @access public
 	* @return void
	*/	
	function _ajax_set_inner_html(data, id)
	{
		if (document.getElementById(id))
		{
			document.getElementById(id).innerHTML = data;
		}
	}

	/**
 	* Refreshes the data inside the html element identified by id with data from the server
 	*
 	* @param string $url The url that will return the data
 	* @param int $id The id of the html element
 	* @access public
 	* @return XMLHttpRequest object used.
	*/	
	function _ajax_set_inner_html_from_url(URL, id, call_back_function, params, abortOnError)
	{
		var random = Math.random() * 5;
		URL = encodeURI(URL + '&random=' + random);
		
		http = get_http_object();
		if (document.getElementById(id))
		{
			http.open("GET", URL, true);
			//alert(URL);
			http.onreadystatechange = function()
			{
				if (http.readyState == 4 && (!abortOnError || http.status != 0))
				{
					// Get the data from the server
					//alert(http.responseText);
					document.getElementById(id).innerHTML = http.responseText;

					if(String(call_back_function) != 'undefined')
					{
						var function_to_call = call_back_function + '(1,' + params + ')';
						eval(function_to_call);
					}
				}
			}
					
			http.send(null);
		}

		// Previously returned nothing. Now returns the XMLHttpRequest request object so the caller can cancel the request if they want.
		return http;
	}

	/**
 	* Refreshes the elements inside a html select list with data from the server
 	*
 	* @param string $url The url that will return the data
 	* @param string $element_name The name of the select list html element
 	* @param string $form_name The name of the form that the select list belongs to
 	* @param int $selected_pos The position of the select list that will be selected. Can be empty.
 	* @param string $call_back_function The name of the function that will be called when a response ir received from the server
 	* @param string $params The arguments that will be passed to the function identified by $call_back_function
 	* @access public
 	* @return void
	*/	
	function _ajax_refresh_select_list_from_url(URL, element_name, form_name, selected_pos, call_back_function, params, selected_index)
	{
		var random = Math.random() * 5;
		URL = encodeURI(URL + '&random=' + random);
		
		http = get_http_object();
		
		http.open("GET", URL, true);

		if (form_name.length == 0 || element_name.length == 0)
		{
			return;
		}
	
		if (document[form_name])
		{
			if (document[form_name][element_name])
			{
				http.onreadystatechange = function()
				{
					if (http.readyState == 4)
					{
						// Get the data from the server
						data = http.responseText;
						//alert(data);
						document[form_name][element_name].length = 0;
						if (data.length > 0)
						{
							var result_array = data.split("|");
							for(i = 0; i < result_array.length; i++)
							{
								var row = result_array[i].split(":");
								document[form_name][element_name][i] = new Option(row[1], row[0], false, false);
							}					
							//document[form_name][element_name][document[form_name][element_name]].selectedIndex = 0;
							if (document[form_name][element_name].options[selected_pos])
							{
								document[form_name][element_name].options[selected_pos].selected = true;
							}
							
							if(String(selected_index) != 'undefined' && selected_index.length > 0)
							{
								for(i = 0; i < document[form_name][element_name].length; i++)
								{
									if (document[form_name][element_name].options[i].value == selected_index)
									{
										document[form_name][element_name].options[i].selected = true;
									}
								}
							}
							
							if(String(call_back_function) != 'undefined' && call_back_function.length > 0)
							{
								var function_to_call = call_back_function + '(1,' + params + ')';
								eval(function_to_call);
							}
						}
						else
						{
							if(String(call_back_function) != 'undefined')
							{
								var function_to_call = call_back_function + '(0,' + params + ')';
								eval(function_to_call);
							}
						}
					}
				}
			}
						
			http.send(null);
		}
	}
				
	/**
 	* Gets the suggestions for the type ahead drop down list from the server
 	*
 	* @param string $input_field The name of the type ahead input field
 	* @param string $input_field_value The value of the type ahead input field
 	* @param string $hidden_field The name of the hidden field that will be updated
 	* @param string $url The url that suggestions will be obtained from
 	* @param string $form_name The name of the form that the select list belongs to
 	* @param string $params[start_pos] The amount of characters in the input box before the type ahead code is activated
 	* @access public
 	* @return void
	*/	
	function _ajax_get_suggestions(input_field, input_field_value, hidden_field, url, form_name, start_pos)
	{
		var random = Math.random() * 5;
		url = encodeURI(url);
		
		// Don't open the list of suggestions when the tab key is pressed
		// This was added to stop the suggestions appearing when tabing through a form that already has values
		if (ajax_key_code == 9)
		{
			return;	
		}
		
		if ((ajax_open_name.length > 0) && (ajax_open_name != hidden_field))
		{
			id = 'auto_' + ajax_open_name;
			document.getElementById(id).style.visibility = 'hidden';				
			ajax_my_status = 0;
			ajax_open_name = '';
		}

		// When the text box is cleared empty the hidden field that has the id
		if (document[form_name][input_field].value.length == 0)
		{
			document[form_name][hidden_field].value = '';
		}

		ajax_open_name = hidden_field;

		id = 'auto_' + hidden_field;
		suggestions_id = 'suggestions_' + hidden_field;
		
		if (!document[form_name])
		{
			return;	
		}

		if (!document[form_name][input_field])
		{
			return;	
		}
						
		if (((parseInt(document[form_name][input_field].value.length) >= parseInt(start_pos)) || (ajax_key_code == 40)) && (ajax_my_status == 0))
		{								
			//alert('I=' + input_field_value);
			// Go to the server and get the content for the new row
			var url = url + input_field_value + '&random=' + random + '&noheaders=1&mime_type=';
			
			http = get_http_object();
			
			http.open("GET", url, true);
			//alert(url);

			http.onreadystatechange = function()
			{
				if (http.readyState == 4)
				{
					// Get the data from the server
					data = http.responseText;
					//alert(data);
		
					document.getElementById(id).innerHTML = data;
					document.getElementById(id).style.visibility = 'visible';
						
					if ((ajax_key_code == 40) && (data))
					{
						if (document[form_name][suggestions_id])
						{
							document[form_name][suggestions_id].focus();					
							// Select the first item in the list
							document[form_name][suggestions_id][0].selected = 'true';
						}
					}					
				}
			}
				
			http.send(null);
		}
		else
		{
			document.getElementById(id).style.visibility = 'hidden';				
			ajax_my_status = 0;
			ajax_open_name = '';
		}
		
	}

	/**
 	* Show / hides and processes the list of suggestions for the type ahead input box
 	*
 	* @param string $input_field The name of the type ahead input field
 	* @param string $hidden_field The name of the hidden field that will be updated
 	* @param string $first_value The value of the first record in the list of suggestions
 	* @param int $exit_status A variable to determine when the list of suggestions should be hidden
 	* @param string $form_name The name of the form that the select list belongs to
 	* @access public
 	* @return void
	*/	
	function _ajax_check_select_status(input_field, hidden_field, first_value, exit_status, form_name)
	{						
		//alert(ajax_key_code);
		
		if (!document[form_name])
		{
			return;	
		}
		if (!document[form_name][input_field])
		{
			return;	
		}
		
		if (document[form_name][suggestions_id].selectedIndex > 0)
		{
			current_value = document[form_name][suggestions_id][document[form_name][suggestions_id].selectedIndex].value;
			check_value = current_value;
		}
		else
		{
			// Get the first value
			if (document[form_name][suggestions_id].selectedIndex == 0)
			{
				current_value = document[form_name][suggestions_id][0].value;				
			}
			else
			{
				current_value = '';
			}
			check_value = document[form_name][suggestions_id][0].value;
		}
						
		// If up arrow and last element in list, go back to the text field
		if ((ajax_key_code == 38) && (ajax_last_select_value == first_value))
		{
			id = 'auto_' + hidden_field;
			document.getElementById(id).style.visibility = 'hidden';
			document[form_name][input_field].focus();					
		}
		else if ((ajax_key_code == 13) || (ajax_key_code == 0) || (ajax_key_code == 9) || (ajax_key_code == 8) || (exit_status == 2))
		{
			// If the Enter key is pressed get the current value
			// exit_status occurs when the mouse is used to select the value
			if (current_value)
			{
				var result = current_value.split("|");
					
				document[form_name][input_field].value = result[1];
				document[form_name][hidden_field].value = result[0];
						
				document.getElementById(id).style.visibility = 'hidden';
				document[form_name][input_field].focus();
				ajax_my_status = 1;
				ajax_open_name = '';
			}
		}
		else if (exit_status == 1)
		{
			// exit_status occurs when the mouse is clicked away from the select list when it is open
			document.getElementById(id).style.visibility = 'hidden';			
		}
		
		ajax_last_select_value = check_value;

	}
	
	// Create a dummy object and use the prototype object to make the functions above into methods
	new ajax();
	ajax.prototype.pass_response_to_function = _ajax_pass_response_to_function;
	ajax.prototype.send_url = _ajax_send_url;
	ajax.prototype.send_post_request = _ajax_send_post_request;
	ajax.prototype.set_inner_html = _ajax_set_inner_html;
	ajax.prototype.set_inner_html_from_url = _ajax_set_inner_html_from_url;
	ajax.prototype.refresh_select_list_from_url = _ajax_refresh_select_list_from_url;
	ajax.prototype.get_suggestions = _ajax_get_suggestions;
	ajax.prototype.check_select_status = _ajax_check_select_status;
	
	var ajax = new ajax();
		
	// Create the HTTP Object
	var http = get_http_object();
	
