
	         $(function() {
	        
	                /* @custom validation method (smartCaptcha) 
	                ------------------------------------------------------------------ */
	                    
	                $.validator.methods.smartCaptcha = function(value, element, param) {
	                        return value == param;
	                };
	                       
	                $( "#login" ).validate({
	                    
                        /* @validation states + elements 
                        ------------------------------------------- */
                        
                        errorClass: "state-error",
                        validClass: "state-success",
                        errorElement: "em",
                        
                        /* @validation rules 
                        ------------------------------------------ */
                            
                        rules: {
                        	email: {
                         		required: true,
                         		email: true
                 			},
                 			password: {
                                required: true
                         	}
                 			
                        },
                        
                        /* @validation error messages 
                        ---------------------------------------------- */
                        messages:{
                     		email: {
                         		required: 'Enter email address',
                         		email: 'Enter a valid email address'
                 			},
                 			password: {
                                required: 'Enter password'
                        	}
                 		  
                        },

                        /* @validation highlighting + error placement  
                        ---------------------------------------------------- */ 
                        
                        highlight: function(element, errorClass, validClass) {
                                $(element).closest('.field').addClass(errorClass).removeClass(validClass);
                        },
                        unhighlight: function(element, errorClass, validClass) {
                                $(element).closest('.field').removeClass(errorClass).addClass(validClass);
                        },
                        errorPlacement: function(error, element) {
                           if (element.is(":radio") || element.is(":checkbox")) {
                                    element.closest('.option-group').after(error);
                           } else {
                                    error.insertAfter(element.parent());
                           }
                        }        
                }); 
	                
	                
	                
	                $( "#useradd" ).validate({
		                
                        /* @validation states + elements 
                        ------------------------------------------- */
                        
                        errorClass: "state-error",
                        validClass: "state-success",
                        errorElement: "em",
                        
                        /* @validation rules 
                        ------------------------------------------ */
                            
                        rules: {
                        	name: {
                                required: true
                         	},
                         	password: {
                                required: true
                         	},
                     		email: {
                         		required: true,
                         		email: true
                 			},
                 			address: {
                                required: true
                            }
                        },
                        
                        /* @validation error messages 
                        ---------------------------------------------- */
                        messages:{
                        	name: {
                                 required: 'Enter name'
                         	},
                         	password: {
                                 required: 'Enter password'
                         	},
                         	email: {
                         		required: 'Enter email address',
                         		email: 'Enter a valid email address'
                 			},
                 			phone: {
                             	required: 'Enter phone number'
                     		}
                        },

                        /* @validation highlighting + error placement  
                        ---------------------------------------------------- */ 
                        
                        highlight: function(element, errorClass, validClass) {
                                $(element).closest('.field').addClass(errorClass).removeClass(validClass);
                        },
                        unhighlight: function(element, errorClass, validClass) {
                                $(element).closest('.field').removeClass(errorClass).addClass(validClass);
                        },
                        errorPlacement: function(error, element) {
                           if (element.is(":radio") || element.is(":checkbox")) {
                                    element.closest('.option-group').after(error);
                           } else {
                                    error.insertAfter(element.parent());
                           }
                        }        
                });     

	                
	                
	                $( "#bidadd" ).validate({
	                    
                        /* @validation states + elements 
                        ------------------------------------------- */
                        
                        errorClass: "state-error",
                        validClass: "state-success",
                        errorElement: "em",
                        
                        /* @validation rules 
                        ------------------------------------------ */
                            
                        rules: {
                        	bid: {
                         		required: true
                 			}
                 			
                        },
                        
                        /* @validation error messages 
                        ---------------------------------------------- */
                        messages:{
                        	bid: {
                         		required: 'Enter bid amount'
                 			}
                 		  
                        },

                        /* @validation highlighting + error placement  
                        ---------------------------------------------------- */ 
                        
                        highlight: function(element, errorClass, validClass) {
                                $(element).closest('.field').addClass(errorClass).removeClass(validClass);
                        },
                        unhighlight: function(element, errorClass, validClass) {
                                $(element).closest('.field').removeClass(errorClass).addClass(validClass);
                        },
                        errorPlacement: function(error, element) {
                           if (element.is(":radio") || element.is(":checkbox")) {
                                    element.closest('.option-group').after(error);
                           } else {
                                    error.insertAfter(element.parent());
                           }
                        }        
                }); 

	                
	        });
	
	         function isNumber(evt) {
	        	 evt = (evt) ? evt : window.event;
	        	 var charCode = (evt.which) ? evt.which : evt.keyCode;
	        	 if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	        	 return false;
	        	 }
	        	 return true;
	        	 }
	        
	         